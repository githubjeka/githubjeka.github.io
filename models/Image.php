<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Image is the model
 */
class Image extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Добавить картинку'
        ];
    }
}
