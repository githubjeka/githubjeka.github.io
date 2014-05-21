<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Post;
use app\models\Image;
use yii\web\HttpException;
use yii\web\UploadedFile;
use yii\imagine\Image as Imagine;

class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

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
                fwrite($handle, $post->content);
                fclose($handle);
                $post->saveContentDBX();
            }

            $image->file = UploadedFile::getInstance($image, 'file');

            if ($image->validate('file') && $image->file !== null) {
                Imagine::thumbnail($image->file->tempName, 500, 500)
                    ->save($post->getPathImage() . $image->file->name, ['quality' => 75]);
                $post->saveImageDBX($image->file->name);
            }
        }

        return $this->render('create', ['model' => $image, 'post' => $post]);
    }

    public function actionDeleteImage()
    {
        if (isset($_POST['path'])) {
            if (unlink(Yii::getAlias('@app/web/') . $_POST['path'])) {
                (new Post)->deleteImage($_POST['path']);
                $this->redirect(Url::previous());
            }
        }
        throw new HttpException(404);
    }
}