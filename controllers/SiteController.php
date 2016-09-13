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
        $model = new SearchUser();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $query = users::find()
            ->select('users.*')
            ->rightJoin('department', '`users`.`id_department` = `department`.`id`')
            ->where(['and',
                        ['like', 'department.uname', $model->department],
                        ['like', 'course', $model->course],
                        ['or',
                            ['like', 'users.uname', $model->uname], 
                            ['like', 'middlename', $model->uname],
                            ['like', 'lastname', $model->uname]
                        ]
                    ]
                );
            // ->with('department')
            // ->where(['and',
            //     ['like', 'course', $model->course],
            //     ['or',
            //         ['like', 'uname', $model->uname], 
            //         ['like', 'middlename', $model->uname],
            //         ['like', 'lastname', $model->uname]
            //     ]//,
            //     //['or',
            //     //    ['like', 'department.uname', $model->department], 
            //     //    ['like', 'middlename', $model->uname],
            //     //    ['like', 'lastname', $model->uname]
            //     //]
            //     //$model->department
            // ])
            // ->innerJoinWith([
            //     'department' => function ($query1) {
            //         $query1->where(['like', 'department.uname', $model->department]);
            //     }
            // ]);
        } else {
            $query = users::find();
            //->with('');
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
        $query = event::find();
        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $events = $query->orderBy('startdate desc')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('event', [
            'events' => $events,
            'pagination' => $pagination
        ]);
        
    }
    public function actionGroups()
    {
        $query = groups::find();
        
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
            'pagination' => $pagination
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
