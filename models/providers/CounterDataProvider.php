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
use app\models\Counter;
use app\models\User;
use kartik\grid\DataColumn;
use Mpdf\Tag\U;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class CounterDataProvider extends AppDataProvider
{

    /**
     * @return void
     */
    function query()
    {
        $this->query = Counter::find();
    }

    /**
     * @return array
     */
    function columns()
    {
        return [
            ['attribute' => 'id'],
            ['attribute' => 'range.zone.name', 'label' => 'Zone'],
            ['attribute' => 'range.id', 'label' => 'Range'],
            ['attribute' => 'belt.name', 'label' => 'Belt'],
            ['attribute' => 'unavailabilityPeriodStartTime'],
            ['attribute' => 'unavailabilityPeriodEndTime'],
            ['attribute' => 'ratio_passenger_per_timeunit'],
            ['attribute' => 'proximity'],
            ['attribute' => 'total_passengers'],
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