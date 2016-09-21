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
use app\models\AddGroup;

class AjaxController extends Controller
{
  
    public function actionEvent()
    {
        //$id = $_GET['id'];
        //if ($id == '#event'){
            $id_event = $_GET['id'];
            $query = event::find()
                ->where(['id' => $id_event])
                ->with('eventlevel')
                ->with('iCoordinator')
                ->with('registrator')
                ->with('roles')
                ->with('eventtype')
                ->with('activity')
                ->with('comp')
                ->asArray()->one();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query); //array('the_event' => '$query', 'users' => '$users');
            //return array("query" => $id_event);
        //}
    }
    public function actionActivist()
    {
            $id_user = $_GET['id'];
            //print_r('dfg dfgg dfg dfg dsfg dfg dfg dsfg id_user');
            $query = users::find()
                ->where(['id' => $id_user])
                ->with('department')
                ->with('groups')
                ->with('events')
                //->orderBy(['id' => SORT_ASC])
                ->asArray()->one();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionGroup()
    {
            $id_group = $_GET['id'];
            $query = groups::find()
                ->where(['id' => $id_group])
                ->with('users')
                ->asArray()->one();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionGroupsadd()
    {
            // $uname = $_GET['uname'];
            // $user = new groups();
            // $user->uname = $uname;
            // $user->save();
            // print_r($_POST);
            // $model = new AddGroup();

            // if($model->load(Yii::$app->request->post()) && $model->validate()){
            //     $user = new groups();
            //     $user->uname = $model->uname;
            //     $user->save();
            //     print_r($model);
            // }
            
            // // $query = groups::find()
            //     // ->where(['id' => $id_group])
            //     // ->with('users')
            //     // ->asArray()->one();
        
            // Yii::$app->response->format = Response::FORMAT_JSON;
            return 'SDFDSF';//array("query" => '$temp');
        // $id_group = $_GET['id'];
        //     $query = groups::find()
        //         ->where(['id' => $id_group])
        //         ->with('users')
        //         ->asArray()->one();
        
        //     Yii::$app->response->format = Response::FORMAT_JSON;
        //     return array("query" => $query);
    }
}
