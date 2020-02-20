<?php

namespace app\controllers;

use app\components\Tools;
use app\models\Belt;
use app\models\Conjunction;
use app\models\Counter;
use app\models\FlightGroup;
use app\models\FlightGroupZone;
use app\models\forms\ReportForm;
use app\models\forms\SolveForm;
use app\models\providers\PlanningReportDataProvider;
use app\models\Range;
use app\models\Requirement;
use app\models\Terminal;
use app\models\Zone;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class ReportController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ]
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ReportForm();
        $loaded = $model->load(\Yii::$app->request->post());
        $datesToReport = Requirement::find()->select('date(date_start) as date_start')->distinct('date(date_start)')->all();
        $dataProvider = null;
        if ($loaded) {
            $dataProvider = new PlanningReportDataProvider(['dateReport' => $model->date]);
        }
        return $this->render('index', [
            'model' => $model, 'provider' => $dataProvider,
            'datesToReport' => $datesToReport,
        ]);
    }

    public function updateTables($result)
    {
        $requirements = $result['requirements'];
        foreach ($requirements as $requirement) {
            $model = Requirement::findOne($requirement['id']);
            $model->counter_id = $requirement['counter_id'];
            $model->save();
        }
    }


}
