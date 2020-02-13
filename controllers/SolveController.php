<?php

namespace app\controllers;

use app\components\Tools;
use app\models\Counter;
use app\models\FlightGroup;
use app\models\FlightGroupZone;
use app\models\forms\SolveForm;
use app\models\Requirement;
use app\models\Zone;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SolveController extends Controller
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
        $model = new SolveForm();
        $loaded = $model->load(\Yii::$app->request->post());
        $datesToSolve = Requirement::find()->select('date(date_start) as date_start')->distinct('date(date_start)')->all();
        $image = null;
        $output = null;
        if ($loaded) {
            $counter = Counter::find()->active()->asArray()->all();
            $zone = Zone::find()->active()->asArray()->all();
            $preferences = FlightGroupZone::find()->active()->asArray()->all();
            $requirements = Requirement::find()->active()->onDate($model->date)->asArray()->all();
            $flightGroups = FlightGroup::find()->active()->asArray()->all();

            $allData = [
                'counter' => $counter,
                'zone' => $zone,
                'preferences' => $preferences,
                'requirements' => $requirements,
                'flightGroups' => $flightGroups,
            ];
            $asJson = json_encode($allData);
            $inputPath = 'input.json';
            $batPath = 'fgplanner.bat';
            $image = 'gantt.png';
            file_put_contents($inputPath, $asJson);
            $output = shell_exec($batPath . ' ' . $inputPath);
            $output = explode("\n", $output);
            $result = end($output);
            while ($result == "") $result = prev($output);
            $result = json_decode($result, true);
            $this->updateTables($result);
        }
        return $this->render('index', ['model' => $model, 'image' => $image, 'datesToSolve' => $datesToSolve, 'output' => $output]);
    }

    public function updateTables($result)
    {

    }


}
