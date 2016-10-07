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
use app\models\role;
use app\models\AddGroup;
use app\models\group_user;
use app\models\event_user_status_role;

class AjaxController extends Controller
{
  
    public function actionEvent()
    {
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
            return array("query" => $query);
    }
    public function actionActivist()
    {
            $id_user = $_GET['data'];
            $query = users::find()
                ->where(['id' => $id_user])
                ->with('department')
                ->with('groups')
                ->with('events')
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
            $uname = $_GET['data'];
            if(count($uname)==0){$argwhere = '';
            } else if(count($uname)==1){
                $argwhere = ['or',
                                ['like', 'middlename', $uname[0]],
                                ['like', 'uname', $uname[0]],
                                ['like', 'lastname', $uname[0]],
                            ];
            } else {
                $argwhere = ['and'];
                for($i=0; $i<count($uname);$i++){
                    array_push($argwhere,   ['or',
                                                ['like', 'middlename', $uname[$i]],
                                                ['like', 'uname', $uname[$i]],
                                                ['like', 'lastname', $uname[$i]],
                                            ]); 
                }
            }
            $query = users::find()
                ->where($argwhere)
                ->limit(10)
                ->orderBy(['middlename' => SORT_ASC, 'uname' => SORT_ASC, 'lastname' => SORT_ASC])
                ->asArray()->all();
        
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("query" => $query);
    }
    public function actionUsersadd()
    {
            $query = users::find()
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

    public function actionRegadd()
    {
        $users = $_GET['data'];
        $event_id = $_GET['id'];
        $dels = $_GET['del'];
        if($users){
            foreach ($users as $user){
                $event_user_status_role = new event_user_status_role();
                $event_user_status_role->id_event = $event_id;
                $event_user_status_role->id_user = $user;
                $event_user_status_role->id_status = 1;
                $event_user_status_role->id_role = 0;
                $event_user_status_role->save();
            }
        }
        if($dels){
            foreach ($dels as $del){
                $query = event_user_status_role::find()
                    ->where(['and', 
                                ['id_event' => $event_id],
                                ['id_user' => $del],
                                ['id_status' => 1],
                                ['id_role' => 0],
                            ])
                    ->one()
                    ->delete();
            }
        }
    }

    public function actionActiveadd()
    {
        $users = $_GET['data'];
        $event_id = $_GET['id'];
        $dels = $_GET['del'];
        $roles = $_GET['role'];
        if($users){
            for($i=0;$i<count($users); $i++){
                $event_user_status_role = new event_user_status_role();
                $event_user_status_role->id_event = $event_id;
                $event_user_status_role->id_user = $users[$i];
                $event_user_status_role->id_status = 0;
                $event_user_status_role->id_role = $roles[$i];
                $event_user_status_role->save();
                $rate = role::find()
                    ->where(['id' => $roles[$i]])
                    ->one();
                $mark = $rate->mark;
                $users_temp = users::find()
                    ->where(['id' => $users[$i]])
                    ->one();
                $rate = $users_temp->rate;
                $summ = $rate + $mark;
                $users_temp->rate = $summ;
                $users_temp->save();
            }
        }
        if($dels){
            foreach ($dels as $del){
                $query = event_user_status_role::find()
                    ->where(['and', 
                                ['id_event' => $event_id],
                                ['id_user' => $del],
                                ['id_status' => 0],
                            ])
                    ->one();
                $role = $query->id_role;
                $query->delete();
                $rate = role::find()
                    ->where(['id' => $role])
                    ->one();
                $mark = $rate->mark;
                $users_temp = users::find()
                    ->where(['id' => $del])
                    ->one();
                $rate2 = $users_temp->rate;
                $summ = $rate2 - $mark;
                $users_temp->rate = $summ;//$users_temp->rate + $rate->mark;
                $users_temp->save();
            }
        }
    }

    public function actionGroupremove()
    {
        $group_id = $_GET['id'];
        if($group_id){
                $group = groups::find()->where(['id' => $group_id])->one();
                $group->delete();
                group_user::deleteAll(['id_group' => $group_id]);
        }
    }
    public function actionEventremove()
    {
        $event_id = $_GET['id'];
        print_r('$event_id');
        if($event_id){
                $role = role::find()->all();
                $event_users = event_user_status_role::find()->where(['id_event' => $event_id])->all();
                foreach ($event_users as $event_user){
                    $user = users::find()->where(['id' => $event_user->id_user])->one();
                    $mark = $role[$event_user->id_role]->mark;
                    $user->rate = $user->rate - $mark;
                    $user->save();
                }
                event_user_status_role::deleteAll(['id_event' => $event_id]);
                $event = event::find()->where(['id' => $event_id])->one();
                $event->delete();
        }
    }
}
