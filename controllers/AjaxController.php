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
use app\models\group_user;

class AjaxController extends Controller
{
  
    public function actionEvent()
    {
        //$id = $_GET['id'];
        //if ($id == '#event'){
            $id_event = $_GET['data'];
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
            $id_user = $_GET['data'];
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
            $id_group = $_GET['data'];
            $query = groups::find()
                ->where(['id' => $id_group])
                ->with('users')
                ->asArray()->one();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionFinduser()
    {
            // print_r($_GET);
            $uname = $_GET['data'];
            $query = users::find()
                 ->where(['or',
                            ['like', 'middlename', $uname],
                            ['like', 'uname', $uname],
                            ['like', 'lastname', $uname],
                        ])
                ->limit(10)
                ->orderBy(['middlename' => SORT_ASC, 'uname' => SORT_ASC, 'lastname' => SORT_ASC])
                ->asArray()->all();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionUsersadd()
    {
            // print_r($_GET);
            // $uname = $_GET['data'];
            $query = users::find()
                 // ->where(['or',
                 //            ['like', 'middlename', $uname],
                 //            ['like', 'uname', $uname],
                 //            ['like', 'lastname', $uname],
                 //        ])
                ->limit(10)
                ->orderBy(['middlename' => SORT_ASC, 'uname' => SORT_ASC, 'lastname' => SORT_ASC])
                ->asArray()->all();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionUsersadd2()
    {
        $users = $_GET['data'];
        $group_id = $_GET['id'];
        $dels = $_GET['del'];
        // print_r($users);
        if($users){
            foreach ($users as $user){
                $group_user = new group_user();
                $group_user->id_group = $group_id;
                $group_user->id_user = $user;
                $group_user->save();
            }
        }
        if($dels){
            foreach ($dels as $del){
                $query = group_user::find()
                    ->where(['and', 
                                ['id_group' => $group_id],
                                ['id_user' => $del],
                            ])
                    ->one()
                    ->delete();
            }
        }
    }


        public function actionGroupremove()
    {
        // $users = $_GET['data'];
        $group_id = $_GET['id'];
        // $dels = $_GET['del'];
        // print_r($users);
        if($group_id){
            // foreach ($users as $user){
                $group = groups::find()->where(['id' => $group_id])->one();
                // $group_user->id_group = $group_id;
                // $group_user->id_user = $user;
                $group->delete();
                group_user::deleteAll(['id_group' => $group_id]);
            // }
        }
        // if($dels){
        //     foreach ($dels as $del){
        //         $query = group_user::find()
        //             ->where(['and', 
        //                         ['id_group' => $group_id],
        //                         ['id_user' => $del],
        //                     ])
        //             ->one()
        //             ->delete();
        //     }
        // }
         // Yii::$app->response->format = Response::FORMAT_JSON;
         //    return array("query" => $users);
    }
}
