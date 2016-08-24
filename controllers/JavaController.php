<?php

namespace app\controllers;

use yii\data\Pagination;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\entryForm;
use app\models\users;
use app\models\event;
use app\models\groups;

class AjaxController extends Controller
{
  
    public function actionEvent()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $searchname= explode(":", $data['searchname']);
            $searchby= explode(":", $data['searchby']);
            $searchname= $searchname[0];
            $searchby= $searchby[0];
            $search = 'hi';
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'search' => '$search',
                'code' => 100,
            ];
        }

    }
}
