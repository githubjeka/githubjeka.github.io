<?php
namespace app\controllers;

use Dropbox\Client;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Post;
use app\models\Image;
use yii\web\HttpException;
use yii\web\UploadedFile;

class PostController extends Controller
{
    public function actionCreate($id)
    {
        $image = new Image();
        $post = new Post();

        if (isset($post->sectors[$id])) {
            $post->sector = $id;
            $post->content = $post->getContentDBX();
        } else {
            throw new HttpException(404);
        }

        if (Yii::$app->request->isPost) {

            if ($post->load(Yii::$app->request->post())) {
                $handle = fopen($post->getPathContent(), 'w');
                fwrite($handle,$post->content);
                fclose($handle);
                $post->saveContentDBX();
            }

            $image->file = UploadedFile::getInstance($image, 'file');

            if ($image->validate('file')) {
                if ($image->file->saveAs($post->getPathImage() . $image->file->name)) {
                    $post->saveImageDBX($image->file->name);
                };
            }
        }

        return $this->render('create', ['model' => $image, 'post' => $post]);
    }

    public function actionDeleteImage()
    {
        if (isset($_POST['path'])) {
            if (unlink($_POST['path'])) {
                $this->redirect(Url::previous());
            }
        }
        throw new HttpException(404);
    }
}