<?php

namespace app\controllers;

use app\components\AppController;
use app\components\Tools;
use app\models\Course;
use app\models\forms\LoginForm;
use app\models\Instructor;
use app\models\InstructorEvaluationEmail;
use app\models\OfferedCourse;
use app\models\Semester;
use app\models\Student;
use app\models\StudentCourseEnrollment;
use app\models\StudentCourseEvaluation;
use app\models\StudentSemesterEnrollment;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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
        return $this->redirect(['flight-group/index']);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest && false) {
            return $this->goHome();
        } else {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->login();
                    return $this->goHome();
                }
            }
            return $this->render('login', ['model' => $model]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
