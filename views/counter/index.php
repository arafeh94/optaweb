<?php

/** @var $this yii\web\View */

/** @var $provider UserDataProvider */

use app\components\GridViewBuilder;
use app\components\ModalForm;
use app\models\providers\UserDataProvider;
use app\models\User;
use kartik\grid\GridView;
use yii\bootstrap\Html;

echo ModalForm::widget(['formPath' => '@app/views/counter/_form', 'title' => 'Counter']);

?>
<?= GridViewBuilder::render($provider, 'Counter'); ?>
