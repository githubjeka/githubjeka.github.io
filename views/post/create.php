<?php
/** @var $post app\models\Post */

use yii\helpers\Url;
use yii\widgets\ActiveForm;

Url::remember();
?>

<div class="row">

    <div class="col-xs-3">
        <div class="well well-sm">
            <?php
            $items = [];
            foreach ($post->sectors as $id => $name)
                $items[] = ['label' => $name, 'url' => ['/post/create', 'id' => $id], 'active' => ($id == $post->sector)];
            echo \yii\bootstrap\Nav::widget(['items' => $items]);
            ?>
        </div>
    </div>

    <div class="col-xs-9">

        <div id="owl-simple">
            <?php
            foreach ($post->images as $image) {
                    ?>
                    <div class="item thumbnail">
                        <img class="lazyOwl img-responsive" data-src="<?= $post->getUrlImages() . $image ?>" alt="spas">

                        <div class="caption">
                            <form action="<?= Url::to(['/post/delete-image']) ?>" method="post">
                                <input type="hidden" value="<?= Yii::$app->request->csrfToken ?>" name="_csrf">
                                <input type="hidden" value="<?= $post->getUrlImages() . $image ?>" name="path">
                                <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                <?php
            }
            ?>
        </div>

        <?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'file')->fileInput() ?>

        <?= $form->field($post, 'content')->textarea(['rows' => 15]) ?>

        <button class="btn btn-success">Сохранить</button>

        <?php ActiveForm::end(); ?>
    </div>

</div>
