<?php
namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\PostForm;
use app\models\ImageForm;
use yii\web\HttpException;
use yii\web\UploadedFile;

class PostController extends Controller
{
    public function actionCreate($id)
    {
        $model = new ImageForm();
        $post = new PostForm();

        if (isset($post->sectors[$id])) {
            $post->sector = $id;
            $post->content = file_get_contents($post->getPathContent());
        } else {
            throw new HttpException(404);
        }

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($post->load(Yii::$app->request->post())) {
                $handle = fopen($post->getPathContent(), 'w');
                fwrite($handle, $post->content);
                fclose($handle);
            }


            if ($model->validate()) {
                $model->file->saveAs($post->getPathImage(false) . $model->file->baseName . '.' . $model->file->extension);
            }
        }

        return $this->render('create', ['model' => $model, 'post' => $post]);
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