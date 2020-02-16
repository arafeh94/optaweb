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
use app\models\User;
use kartik\grid\DataColumn;
use Mpdf\Tag\U;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class BeltDataProvider extends AppDataProvider
{

    /**
     * @return void
     */
    function query()
    {
        $this->query = Belt::find();
    }

    /**
     * @return array
     */
    function columns()
    {
        return [
            ['attribute' => 'id'],
            ['attribute' => 'name'],
            ['attribute' => 'ratio_bag_per_timeunit'],
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