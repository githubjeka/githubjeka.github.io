<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * UploadForm is the model behind the upload form.
 */
class PostForm extends Model
{
    public $sectors = [
        1 => 'Пошив одежды по индивидуальным заказам',
        2 => 'Сценические костюмы',
        3 => 'Разработка и пошив вечерних и свадебных нарядов',
        4 => 'Разработка фирменного стиля и форменной одежды',
        5 => 'Оформление интерьера'
    ];
    public $sector;
    public $content;

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

    public function getPathContent()
    {
        return Yii::getAlias('@app/storage/content/') . $this->sector . '/content.txt';
    }

    public function getPathImage($absolute = true)
    {
        if ($absolute)
            return Yii::getAlias('@web/storage/image/') . $this->sector . '/';
        else
            return Yii::getAlias('@app/web/storage/image/') . $this->sector . '/';
    }
}
