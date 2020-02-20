<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 5/16/2018
 * Time: 3:34 AM
 */

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class ReportForm extends Model
{
    public $date;

    public function rules()
    {
        return [
            ['date', 'required'],
            ['date', 'date'],
        ];
    }

}