<?php

namespace app\controllers;

use app\components\Tools;
use app\models\Belt;
use app\models\Conjunction;
use app\models\Counter;
use app\models\FlightGroup;
use app\models\FlightGroupZone;
use app\models\forms\SolveForm;
use app\models\Range;
use app\models\Requirement;
use app\models\Terminal;
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
        $output = null;
        $kpi = null;
        $error = null;
        $data = null;
        if ($loaded) {
            $counter = Counter::find()->active()->asArray()->all();
            $zone = Zone::find()->active()->asArray()->all();
            $preferences = FlightGroupZone::find()->active()->asArray()->all();
            $requirements = Requirement::find()->active()->onDate($model->date)->asArray()->all();
            $flightGroups = FlightGroup::find()->active()->asArray()->all();
            $terminals = Terminal::find()->active()->asArray()->all();
            $range = Range::find()->active()->asArray()->all();
            $belts = Belt::find()->active()->asArray()->all();
            $conjunctions = Conjunction::find()->active()->asArray()->all();

            //law l net mni7 3indi w 3indek kenna kaffayna, bass 3am tektbe ma 3am ywsalne la shi 5 sec ben kel 7aref
            //tayib, ra7 kaffe ana , iza mna22as shi deghre oulile oulile wp


            $allData = [
                'counters' => $counter,
                'zones' => $zone,
                'preferences' => $preferences,
                'requirements' => $requirements,
                'flightGroups' => $flightGroups,
                'terminals' => $terminals,
                'ranges' => $range,
                'belts' => $belts,
                'conjunctions' => $conjunctions,
                'includeUnplanned' => $model->includeUnplanned,
            ];
            $asJson = json_encode($allData);
            $inputPath = 'input.json';
            $batPath = 'fgplanner.bat';
            file_put_contents($inputPath, $asJson);
            $command = $batPath . ' ' . $inputPath;
            $output = shell_exec($command);
            if ($output != "") {
                $output = explode("\n", $output);
                $result = end($output);
                while ($result == "") $result = prev($output);
                $result = json_decode($result, true);
                $kpi = $result['score'];
                $data = $result['data'];
                $this->updateTables($result);
            } else {
                $error = 'Error while executing command, please try again';
            }
        }
        return $this->render('index', [
            'model' => $model, 'data' => $data,
            'datesToSolve' => $datesToSolve, 'output' => $output,
            'kpi' => $kpi, 'error' => $error,
        ]);
    }

    public function updateTables($result)
    {
//        $requirements = $result['requirements'];
//        foreach ($requirements as $requirement) {
//            $model = Requirement::findOne($requirement['id']);
//            $model->counter_id = $requirement['counter_id'];
//            $model->save();
//        }
    }


}
