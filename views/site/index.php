<?php
/**
 * @var yii\web\View $this
 */
use yii\helpers\Url;

$this->title = 'My Yii Application';
$post = new \app\models\Post();
?>
<div class="grid row height100">

    <section class="col-lg-4 bg1 grid1">
        <a href="<?= Url::toRoute(['view', 'id' => 1]) ?>">
            <h1><?= $post->sectors[1] ?></h1>
        </a>
    </section>

    <section class="col-lg-4 bg2 grid2">
        <a href="<?= Url::toRoute(['view', 'id' => 2]) ?>">
            <h1><?= $post->sectors[2] ?></h1>
        </a>
    </section>

    <section class="col-lg-4 bg3 grid3">
        <a href="<?= Url::toRoute(['view', 'id' => 3]) ?>">
            <h1><?= $post->sectors[3] ?></h1>
        </a></section>

    <section class="col-lg-4 bg4 grid4">
        <a href="<?= Url::toRoute(['view', 'id' => 4]) ?>">
            <h1><?= $post->sectors[4] ?></h1>
        </a></section>

    <section class="col-lg-4 bg5 grid5">
        <small>Частное унитарное предприятие по оказанию услуг</small>
        <h1>Студия "СПЭС"</h1>
        <hr>
        <img src="<?= Yii::getAlias('@web/studiospas/logo.png'); ?>">
        <footer>
            <p>2014 - spas</p>

            <p data-app-version></p>
        </footer>
    </section>

    <section class="col-lg-4 bg6 grid6">
        <a href="<?= Url::toRoute(['view', 'id' => 5]) ?>">
            <h1><?= $post->sectors[5] ?></h1>
        </a>
    </section>

</div>

