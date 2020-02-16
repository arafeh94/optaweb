<?php

namespace app\controllers;

use app\components\extensions\AppController;
use app\models\providers\UserDataProvider;
use app\models\User;
use yii\filters\AccessControl;
use yii\helpers\Json;

class TerminalController extends AppController
{
    protected $model = 'Terminal';
}
