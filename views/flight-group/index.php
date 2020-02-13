<?php

/** @var $this yii\web\View */

/** @var $provider \app\components\extensions\AppDataProvider */

use app\components\GridViewBuilder;
use app\components\ModalForm;
use app\models\providers\UserDataProvider;
use app\models\User;
use kartik\grid\GridView;
use yii\bootstrap\Html;

echo ModalForm::widget(['formPath' => '@app/views/flight-group/_form', 'title' => 'Flight Group']);

?>
<?= GridViewBuilder::render($provider, 'Flight Group'); ?>
