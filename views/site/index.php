<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Url;

$this->title = 'My Yii Application';
$post = new \app\models\Post();
?>
<div class="grid row height100">

    <section class="bg5 grid5 text-center col-sm-4 col-sm-push-4 col-md-push-0 col-md-4 col-lg-2">

        <small>Частное унитарное предприятие по оказанию услуг</small>
        <h1>Студия "СПЭС"</h1>

        <img src="<?= Yii::getAlias('@web/studiospas/logo.png'); ?>" class="img-responsive center-block logo">

        <small>2014 - Витебск - SPAS</small>

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

