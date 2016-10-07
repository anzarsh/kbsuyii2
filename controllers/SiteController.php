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
use app\models\SearchUser;
use app\models\SearchEvent;
use app\models\SearchGroup;
use app\models\addGroup;
use app\models\addEvent;
use app\models\event_user_status_role;
use app\models\event_activity;
use app\models\event_eventtype;
use app\models\UploadForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // print_r($_POST);
        $model = new SearchUser();
        // print_r($model);
        if($model->load(Yii::$app->request->post()) && $model->validate()){

            $query = users::find()
            ->select('users.*')
            ->rightJoin('department', '`users`.`id_department` = `department`.`id`')
            ->rightJoin('unit', '`department`.`id_unit` = `unit`.`id`')
            ->where(['and',
                        ['or',
                            ['like', 'department.uname', $model->department],
                            ['like', 'department.shortname', $model->department],
                            ['like', 'unit.uname', $model->department],
                            ['like', 'unit.shortname', $model->department],
                        ],
                        ['like', 'course', $model->course],
                        ['or',
                            ['like', 'users.uname', $model->uname], 
                            ['like', 'middlename', $model->uname],
                            ['like', 'lastname', $model->uname]
                        ]
                    ]
                );
        } else {
            $query = users::find();
        }
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy(['rate' => SORT_DESC, 'middlename' => SORT_ASC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
       
        return $this->render('rating', [
            'users' => $users,
            'pagination' => $pagination,
            'model' => $model,
            'href' => '#menu-rating'
        ]);
    }

    
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */

    public function actionEvent()
    {   
        $model = new SearchEvent();
        $model2 = new AddEvent();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $query = event::find()
            ->select('event.*')
            ->rightJoin('eventlevel', '`event`.`id_eventlevel` = `eventlevel`.`id`')
            ->rightJoin('event_user_status_role', '`event`.`id` = `event_user_status_role`.`id_event`')
            ->rightJoin('users', '`event_user_status_role`.`id_user` = `users`.`id`')
            ->rightJoin('event_activity', '`event`.`id` = `event_activity`.`id_event`')
            ->rightJoin('event_eventtype', '`event`.`id` = `event_eventtype`.`id_event`')
            ->where(
                    ['and',
                        ['or',
                            ['like', 'users.middlename', $model->coordinator],
                            ['like', 'users.uname', $model->coordinator],
                            ['like', 'users.lastname', $model->coordinator],
                        ],
                        ['like', 'eventlevel.uname', $model->level],
                        ['like', 'event.uname', $model->uname], 
                        ['event_user_status_role.id_status' => 2],
                        ['and',
                            ['>=', 'event.finishdate',
                                ($model->startdate == '')?
                                date('1981-01-01'):
                                date('Y-m-d', strtotime($model->startdate))
                            ],
                            ['<=', 'event.startdate',
                                ($model->finishdate == '')?
                                date('Y-m-d', strtotime('+1year +1month')):
                                date('Y-m-d', strtotime($model->finishdate))
                            ],
                        ],
                        ['event_activity.id_activity' => 
                        (!$model->id_activity0 && !$model->id_activity1 && !$model->id_activity2 && !$model->id_activity3)?
                        [0,1,2,3]:
                        [$model->id_activity0, $model->id_activity1, $model->id_activity2, $model->id_activity3]],
                        ['event_eventtype.id_eventtype' => 
                        (!$model->id_eventtype0 && !$model->id_eventtype1 && !$model->id_eventtype2 && !$model->id_eventtype3 && !$model->id_eventtype4 && !$model->id_eventtype5 && !$model->id_eventtype6 && !$model->id_eventtype7 && !$model->id_eventtype8)?
                        [0,1,2,3,4,5,6,7,8]:
                        [$model->id_eventtype0, $model->id_eventtype1, $model->id_eventtype2, $model->id_eventtype3, $model->id_eventtype4, $model->id_eventtype5, $model->id_eventtype6, $model->id_eventtype7, $model->id_eventtype8]]
                    ]
                )->groupBy('id');
        } else {
            $query = event::find();
        }

        if($model2->load(Yii::$app->request->post()) && $model2->validate()){
            if($model2->id == -1){
                $event = new event();
                $event->uname = $model2->uname;
                $event->location = $model2->location;
                $event->startdate = date('Y-m-d', strtotime($model2->startdate));
                $event->finishdate = date('Y-m-d', strtotime($model2->finishdate));
                $event->comment = $model2->comment;
                $event->id_eventlevel = $model2->id_eventlevel;
                $event->id_eventcomp = $model2->id_eventcomp == 1 ? 1: 0;
                $event->save();
                $event_user_status_role = new event_user_status_role();
                $event_user_status_role->id_event = $event->id;
                $event_user_status_role->id_user = $model2->id_coordinator;
                $event_user_status_role->id_status = 2;
                $event_user_status_role->id_role = 0;
                $event_user_status_role->save();
                if($model2->id_activity0 == '0'){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 0;
                    $event_activity->save();
                }
                if($model2->id_activity1 == 1){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 1;
                    $event_activity->save();
                }
                if($model2->id_activity2 == 2){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 2;
                    $event_activity->save();
                }
                if($model2->id_activity3 == 3){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 3;
                    $event_activity->save();
                }
                if($model2->id_eventtype0 == '0'){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 0;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype1 == 1){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 1;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype2 == 2){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 2;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype3 == 3){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 3;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype4 == 4){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 4;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype5 == 5){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 5;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype6 == 6){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 6;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype7 == 7){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 7;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype8 == 8){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 8;
                    $event_eventtype->save();
                }
            } else {
                $event = event::find()->where(['id' => $model2->id])->one();
                $event->uname = $model2->uname;
                $event->location = $model2->location;
                $event->startdate = date('Y-m-d', strtotime($model2->startdate));
                $event->finishdate = date('Y-m-d', strtotime($model2->finishdate));
                $event->comment = $model2->comment;
                $event->id_eventlevel = $model2->id_eventlevel;
                $event->id_eventcomp = $model2->id_eventcomp == 1 ? 1: 0;
                $event->save();
                $event_user_status_role = event_user_status_role::find()->where(['and',['id_event' => $model2->id], ['id_status' => 2], ['id_role' => 0]])->one();
                $event_user_status_role->id_user = $model2->id_coordinator;
                $event_user_status_role->save();
                event_activity::deleteAll(['id_event' => $model2->id]);
                if($model2->id_activity0 == '0'){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 0;
                    $event_activity->save();
                }
                if($model2->id_activity1 == 1){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 1;
                    $event_activity->save();
                }
                if($model2->id_activity2 == 2){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 2;
                    $event_activity->save();
                }
                if($model2->id_activity3 == 3){
                    $event_activity = new event_activity();
                    $event_activity->id_event = $event->id;
                    $event_activity->id_activity = 3;
                    $event_activity->save();
                }
                event_eventtype::deleteAll(['id_event' => $model2->id]);
                if($model2->id_eventtype0 == '0'){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 0;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype1 == 1){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 1;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype2 == 2){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 2;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype3 == 3){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 3;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype4 == 4){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 4;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype5 == 5){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 5;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype6 == 6){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 6;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype7 == 7){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 7;
                    $event_eventtype->save();
                }
                if($model2->id_eventtype8 == 8){
                    $event_eventtype = new event_eventtype();
                    $event_eventtype->id_event = $event->id;
                    $event_eventtype->id_eventtype = 8;
                    $event_eventtype->save();
                }
            }
        }


        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $events = $query->orderBy(['startdate' => SORT_DESC, 'finishdate' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        //echo $events[0]->startdate;
        return $this->render('event', [
            'events' => $events,
            'pagination' => $pagination,
            'model' => $model,
            'href' => '#menu-event'
        ]);
        
    }
    public function actionGroups()
    {
        $model1 = new SearchGroup();
        $model2 = new AddGroup();
        if($model1->load(Yii::$app->request->post()) && $model1->validate()){
            $query = groups::find()
            ->where(['like', 'uname', $model1->uname]);
        } else {
            $query = groups::find();
        }
        if($model2->load(Yii::$app->request->post())){
            if($model2->id == -1){
                $model2->imageFile = UploadedFile::getInstance($model2, 'imageFile');
                if ($model2->validate()) {
                    $user = new groups();
                    $user->uname = $model2->uname;
                    $user->save();
                    if($model2->imageFile){
                        $urltemp = 'views/grouplogo/' . $user->id . '.' . $model2->imageFile->extension;
                        $model2->imageFile->saveAs($urltemp);
                        $user->url = $urltemp;
                    }
                    $user->save();
                }
            } else {
                $model2->imageFile = UploadedFile::getInstance($model2, 'imageFile');
                if ($model2->validate()) {
                    $user = groups::find()->where(['id' => $model2->id])->one();
                    if($model2->uname){
                        $user->uname = $model2->uname;
                    }
                    if($model2->imageFile){
                        $urltemp = 'views/grouplogo/' . $model2->id . '.' . $model2->imageFile->extension;
                        $model2->imageFile->saveAs($urltemp);
                        $user->url = $urltemp;
                    }
                    $user->save();
                }
            }
        }
        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $groups = $query->orderBy('id desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('groups', [
            'groups' => $groups,
            'pagination' => $pagination,
            'model' => $model1,
            'href' => '#menu-groups'
        ]);

    }
    

    public function actionMemo()
    {
        return $this->render('memo');
    }
    public function actionSettings()
    {
        return $this->render('settings');
    }
    public function actionKbsu($message = "Hiii")
    {
        $kbsu = users::findOne(1);
        $message = $kbsu->uname;
        return $this->render('kbsu', ['message' => $message]);
    }

    public function actionEntry()
    {

        $model = new EntryForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            return $this->render('login2', ['model' => $model]);

        } else {
            
            return $this->render('login', ['model' => $model]);

        }

    }
}
