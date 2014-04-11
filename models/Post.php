<?php
namespace app\models;

use Dropbox\Client;
use Dropbox\WriteMode;
use yii\base\Model;
use Yii;

/**
 * Post is the model.
 */
class Post extends Model
{
    public $sectors = [
        1 => 'Пошив одежды по индивидуальным заказам',
        2 => 'Сценические костюмы',
        3 => 'Разработка и пошив вечерних и свадебных нарядов',
        4 => 'Разработка фирменного стиля и форменной одежды',
        5 => 'Оформление интерьера'
    ];

    public $content;
    public $sector;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'content' => 'Текст раздела'
        ];
    }

    public function getContentDBX()
    {
        $dbxClient = new Client(Yii::$app->params['dbxAccessToken'], "PHP-Example/1.0");

        $handle = fopen($this->getPathContent(), "w+b");

        $dbxClient->getFile($this->getPathContent(true), $handle);

        fclose($handle);

        return file_get_contents($this->getPathContent());
    }

    public function getImages()
    {
        $dbxClient = new Client(Yii::$app->params['dbxAccessToken'], "PHP-Example/1.0");
        $folderMetadata = $dbxClient->getMetadataWithChildren('/studiospas/images/' . $this->sector);

        if ($folderMetadata['hash'] !== Yii::$app->cache->get('images_hash' . $this->sector)) {

            Yii::$app->cache->set('images_hash' . $this->sector, $folderMetadata['hash']);

            if (is_array($folderMetadata['contents'])) {
                foreach ($folderMetadata['contents'] as $_imageArray) {
                    if (!is_file($_imageArray['path'])) {
                        $handle = fopen(Yii::getAlias('@app/web') . $_imageArray['path'], "w+b");
                        $dbxClient->getFile($_imageArray['path'], $handle);
                        fclose($handle);
                    }
                }
            }

            $images = scandir($this->getPathImage(false));
            $_toCache = [];
            foreach ($images as $image) {
                if ($image !== '.' && $image !== '..' && $image !== '.gitignore') {
                    $_toCache[] = $image;
                }
            }

            Yii::$app->cache->set('images_array' . $this->sector, $_toCache);
        }

        return Yii::$app->cache->get('images_array' . $this->sector);
    }

    public function saveContentDBX()
    {
        $handle = fopen($this->getPathContent(), 'rb');

        $dbxClient = new Client(Yii::$app->params['dbxAccessToken'], "PHP-Example/1.0");
        $dbxClient->uploadFile($this->getPathContent(true), WriteMode::force(), $handle);

        fclose($handle);
    }

    public function saveImageDBX($imageName)
    {
        $handle = fopen($this->getPathImage() . $imageName, 'rb');

        $dbxClient = new Client(Yii::$app->params['dbxAccessToken'], "PHP-Example/1.0");
        $dbxClient->uploadFile($this->getPathImage(true) . $imageName, WriteMode::force(), $handle);

        fclose($handle);
    }

    public function deleteImage($path)
    {
        $dbxClient = new Client(Yii::$app->params['dbxAccessToken'], "PHP-Example/1.0");
        $dbxClient->delete($path);
    }

    public function getPathContent($forDBX = false)
    {
        return ($forDBX ? '/studiospas/content/' : Yii::getAlias('@app/studiospas/content/')) . $this->sector . '/content.txt';
    }

    public function getPathImage($forDBX = false)
    {
        return ($forDBX ? '/studiospas/images/' : Yii::getAlias('@app/web/studiospas/images/')) . $this->sector . '/';
    }

    public function getUrlImages()
    {
        return Yii::getAlias('@web/studiospas/images/') . $this->sector . '/';
    }
}
