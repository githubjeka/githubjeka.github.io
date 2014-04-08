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

    <section class="col-lg-4 bg2 grid2"><h1><?= $post->sectors[2] ?></h1></section>

    <section class="col-lg-4 bg3 grid3"><h1><?= $post->sectors[3] ?></h1></section>

    <section class="col-lg-4 bg4 grid4"><h1><?= $post->sectors[4] ?></h1></section>

    <section class="col-lg-4 bg5 grid5">
        <small>Частное унитарное предприятие по оказанию услуг</small>
        <h1>Студия "СПЭС"</h1>
        <hr>
        <img
            src="http://image.spreadshirt.net/image-server/v1/designs/14787655,width%3D178,height%3D178/60-year-diamond-jubilee-queen-elizabeth-logo.png">
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

