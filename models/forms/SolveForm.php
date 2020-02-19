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

class SolveForm extends Model
{
    public $date;
    public $includeUnplanned;

    public function rules()
    {
        return [
            ['date', 'required'],
            ['date', 'date'],
            ['includeUnplanned', 'boolean'],
        ];
    }

}