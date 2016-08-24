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
            $query = event::findOne($id_event);
        
            $query_user = $query->users;

            
            $pagination = new Pagination([
                'defaultPageSize' => 5,
                'totalCount' => $query_user->count(),
            ]);

            $users = $query_user->orderBy('id')
                ->offset($pagination->offset)
                ->set_time_limit($pagination->limit)
                ->all();
            $temp = array("event" => $query, "users" => $users);
            // return $this->render('rating', [
            //     'users' => $users,
            //     'pagination' => $pagination

            // ]);
            //$str = '({"name":"Valik","age":"20","country":"Moldova"})';
            Yii::$app->response->format = Response::FORMAT_JSON;
            return array("event" => $temp); //array('the_event' => '$query', 'users' => '$users');
        }
        // if (Yii::$app->request->isAjax) {
        //     $data = Yii::$app->request->post();
        //     $searchname= explode(":", $data['searchname']);
        //     $searchby= explode(":", $data['searchby']);
        //     $searchname= $searchname[0];
        //     $searchby= $searchby[0];
        //     $search = 'hi';
        //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //     return [
        //         'search' => $search,
        //         'code' => 100,
        //     ];
        // }
        //return "hi";
        // if (Yii::$app->request->isAjax) {
        //     $flag = 777;
        //     // .....
        //    \Yii::$app->response->format = Response::FORMAT_JSON;
        //     //return ['flag' => $flag];
        // }
        //return $_GET['id_event'];
    }

}
