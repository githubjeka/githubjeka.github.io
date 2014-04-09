<?php
use yii\helpers\Url;

?>
<div class="row height100">

    <aside class="bg2 col-sm-12 col-md-8 col-lg-8 text-center">

        <div id="owl-row" class="hidden-xs">
            <?php
            foreach ($post->images as $image) {
                ?>
                <div class="item">
                    <img class="lazyOwl img-responsive img-thumbnail" data-src="<?= $post->getUrlImages() . $image ?>"
                         alt="spas">
                </div>
            <?php } ?>
        </div>

        <div id="owl-one">
            <?php
            foreach ($post->images as $image) {
                ?>
                <div class="item">
                    <img class="lazyOwl img-responsive img-thumbnail" data-src="<?= $post->getUrlImages() . $image ?>"
                         alt="spas">
                </div>
            <?php
            }
            ?>
        </div>

    </aside>

    <article class="bg5 col-sm-12 col-md-4 col-lg-4">
        <div class="text-right">
            <a href="<?= Url::to('/') ?>" title="Вернутся на главную">
                <span class="fa fa-home fa-3x"></span>
            </a>
        </div>

        <h1><?= $post->sectors[$post->sector] ?></h1>

        <div class="content">
            <?= $post->content ?>
        </div>

    </article>

</div>


