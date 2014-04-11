<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Url;

$this->title = 'My Yii Application';
$post = new \app\models\Post();
?>
<div class="grid row height100">

    <section class="bg5 grid5 text-center col-sm-4 col-sm-push-4 col-md-push-0 col-md-4 col-lg-2 ">

        <small class="hidden-sm">Частное унитарное предприятие по оказанию услуг</small>
        <h1>Студия "СПЭС"</h1>

        <img src="<?= Yii::getAlias('@web/images/logo.png'); ?>" class="img-responsive center-block logo">

        <h3>Наши контакты:</h3>

        <p>
            г. Витебск, парк им. Фрунзе,1 Конц. зал "Витебск", каб. 003-004
        </p>

        <div class="text-danger">
            <div class="row">
                <div class="col-sm-6 col-lg-12">
                    <h4>+375-295-190-190 <img src="<?= Yii::getAlias('@web/images/mts.png'); ?>" class="hidden-sm"></h4>
                </div>
                <div class="col-sm-6 col-lg-12">
                    <h4>
                        +375-296-229-565 <img src="<?= Yii::getAlias('@web/images/velcom.png'); ?>" class="hidden-sm">
                    </h4>
                </div>

            </div>

        </div>

        <small class="hidden-sm">2014 - SPAS</small>

    </section>

    <section class="bg1 grid1 col-sm-4 col-sm-pull-4 col-md-pull-0 col-md-8 col-lg-2">
        <a href="<?= Url::toRoute(['view', 'id' => 1]) ?>" class="link">
            <?= $post->sectors[1] ?>
        </a>
    </section>

    <section class="bg2 grid2 col-sm-4 col-md-8 col-lg-2">
        <a href="<?= Url::toRoute(['view', 'id' => 2]) ?>">
            <?= $post->sectors[2] ?>
        </a>
    </section>

    <section class="bg3 grid3 col-sm-4 col-md-8 col-lg-2">
        <a href="<?= Url::toRoute(['view', 'id' => 3]) ?>">
            <?= $post->sectors[3] ?>
        </a></section>

    <section class="bg4 grid4 col-sm-4 col-md-8 col-lg-2">
        <a href="<?= Url::toRoute(['view', 'id' => 4]) ?>">
            <?= $post->sectors[4] ?>
        </a></section>

    <section class="bg6 grid6 col-sm-4 col-md-8 col-lg-2">
        <a href="<?= Url::toRoute(['view', 'id' => 5]) ?>">
            <?= $post->sectors[5] ?>
        </a>
    </section>

</div>

