<?php

namespace frontend\controllers;

use Yii;
use backend\models\Blog;
use yii\web\Controller;

class BlogController extends Controller
{

    public function actionIndex()
    {
        $posts = Blog::find()
			->asArray()
			->all();
		
        return $this->render('index',array('posts' => $posts));
    }
}
