<?php

namespace frontend\controllers;

use Yii;
use common\models\Post;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Module;

class PostController extends Controller
{
    public $author_id ;

    function __construct($id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);
        $isGuest = Yii::$app->user->isGuest;
        if ($isGuest) {
            return Yii::$app->response->redirect(array('site/login'));
        }
        $this->author_id = Yii::$app->user->id;

    }


    /**
     * Displays post page.
     *
     * @return mixed
     */

    public function actionIndex()
    {

        $post = new Post();
        $data = $post->findByAuthorId($this->author_id);
        return $this->render('index', array(
            'data' => $data, 'title' => 'Posts'
        ));
    }


    /**
     * @return $this|string
     * created new post
     */
    public function actionCreate()
    {
        $model = new Post;
        if (isset($_POST['Post'])) {
            $model->author_id = $this->author_id;
            $model->title = $_POST['Post']['title'];
            $model->content = $_POST['Post']['content'];

            if ($model->save())
                return Yii::$app->response->redirect(array('post/read', 'id' => $model->id));
        }

        return $this->render('create', array(
            'model' => $model, 'title' => 'Create Post'
        ));
    }

    /**
     * @param null $id
     * @return $this|string
     * @throws \HttpException
     * updated post
     */
    public function actionUpdate($id = NULL)
    {
        if ($id === NULL)
            throw new \HttpException(404, 'Not Found');

        $model = Post::findIdentity($id);

        if ($model === NULL)
            throw new \HttpException(404, 'Document Does Not Exist');

        if (isset($_POST['Post'])) {
            $model->title = $_POST['Post']['title'];
            $model->content = $_POST['Post']['content'];

            if ($model->save())
                return Yii::$app->response->redirect(array('post/read', 'id' => $model->id));
        }


        return $this->render('create', array(
            'model' => $model, 'title' => 'Edit Post'
        ));
    }

    /**
     * @param null $id
     * deleted post
     */
    public function actionDelete($id = NULL)
    {
        if ($id === NULL) {
            Yii::$app->session->setFlash('PostDeletedError');
            Yii::$app->getResponse()->redirect(array('post/index'));
        }

        $post = Post::findIdentity($id);


        if ($post === NULL) {
            Yii::$app->session->setFlash('PostDeletedError');
            Yii::$app->getResponse()->redirect(array('post/index'));
        }

        $post->delete();

        Yii::$app->session->setFlash('PostDeleted');
        Yii::$app->getResponse()->redirect(array('post/index'));
    }

    /**
     * @param null $id
     * @return string
     * @throws \HttpException
     */
    public function actionRead($id = NULL)
    {
        if ($id === NULL)
            throw new \HttpException(404, 'Not Found');

        $post = Post::findIdentity($id);

        if ($post === NULL)
            throw new \HttpException(404, 'Document Does Not Exist');

        return $this->render('read', array(
            'post' => $post, 'title' => 'Post'
        ));
    }
}