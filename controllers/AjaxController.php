<?php

namespace app\controllers;

use yii\web\Response;
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
        $id = $_GET['id'];
        if ($id == '#event'){
            $id_event = $_GET['id_event'];
            $query = event::find($id_event)
                ->with('eventlevel')
                ->with('iCoordinator')
                ->with('users')
                ->with('eventtype')
                ->with('activity')
                ->with('comp')
                ->asArray()->one();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query); //array('the_event' => '$query', 'users' => '$users');
        }
    }

}
