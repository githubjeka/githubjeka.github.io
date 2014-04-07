<?php
use yii\helpers\Url;

$images = scandir($post->getPathImage(false));

?>
<div class="row height100">

    <aside class="height100 bg2 col-xs-6">

        <div id="owl-sync">
            <?php
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..' && $image !== '.gitignore') {
                    ?>
                    <div class="item thumbnail">
                        <img class="lazyOwl img-responsive" data-src="<?= $post->getPathImage() . $image ?>"
                             alt="spas">
                    </div>
                <?php
                }
            }
            ?>
        </div>

        <div id="owl-gallery">
            <?php
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..' && $image !== '.gitignore') {
                    ?>
                    <div class="item thumbnail">
                        <img class="lazyOwl img-responsive" data-src="<?= $post->getPathImage() . $image ?>"
                             alt="spas">
                    </div>
                <?php
                }
            }
            ?>
        </div>

    </aside>

    <article class="height100 bg5 col-xs-6">
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

