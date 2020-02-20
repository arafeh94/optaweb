<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 5/16/2018
 * Time: 2:57 PM
 */

namespace app\models\providers;


use app\components\extensions\AppDataProvider;
use app\components\GridConfig;
use app\models\Belt;
use app\models\Counter;
use app\models\Requirement;
use app\models\User;
use kartik\grid\DataColumn;
use Mpdf\Tag\U;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class PlanningReportDataProvider extends AppDataProvider
{

    public $dateReport;

    /**
     * @return void
     */
    function query()
    {
        $this->query = Requirement::find()
            ->innerJoinWith('counter')
            ->innerJoinWith('flightGroup')
            ->innerJoinWith('counter.range')
            ->innerJoinWith('counter.range.zone');
        if ($this->dateReport) {
            $this->query->andWhere(['=', 'date(requirement.date_start)', $this->dateReport]);
        }
    }

    /**
     * @return array
     */
    function columns()
    {
        return [
            ['attribute' => 'id'],
            ['attribute' => 'flightGroup.name'],
            ['attribute' => 'counter.id', 'label' => 'Counter'],
            ['attribute' => 'counter.position_in_range'],
            ['attribute' => 'counter.range.zone.name', 'label' => 'Zone'],
            ['attribute' => 'date_start'],
            ['attribute' => 'date_end'],
        ];
    }

    /**
     * ['course.Name','Letter']
     * @return array
     */
    function searchFields()
    {
        return [];
    }
}