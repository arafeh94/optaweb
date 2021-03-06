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
use app\components\Tools;
use app\models\User;
use app\models\Zone;
use kartik\grid\DataColumn;
use Mpdf\Tag\U;
use yii\base\Model;
use yii\bootstrap\Html;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class ZoneDataProvider extends AppDataProvider
{

    /**
     * @return void
     */
    function query()
    {
        $this->query = Zone::find()->active()->joinWith('terminal');
    }

    //wen bta3rfe hyda l class lashu ?
    //no
    //men ismu
    //bye3te data lal table lli betshufe bel website
    //inti bihemmek l columns
    //lawhen ray7a, 3am y2zellek fi ghalat\
    //llon l asfar ya3ne fi ghalat hyda awwal lon ? abel abel
    //eh hone kaffe
    //zidi 3laion max passenger kermel ne2dar nshufon bass na3mol new zone

    /**
     * @return array
     */
    function columns()
    {
        return [
            ['attribute' => 'name'],
            ['attribute' => 'terminal.name', 'label' => 'Terminal'],
            ['attribute' => 'max_passenger', 'label' => 'Max Passenger Number'],
        ];
    }

    /**
     * ['course.Name','Letter']
     * @return array
     */
    function searchFields()
    {
        return ['terminal.name'];
    }
}