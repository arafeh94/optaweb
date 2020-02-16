<?php

/** @var $this yii\web\View */

/** @var $provider UserDataProvider */

use app\components\GridViewBuilder;
use app\components\ModalForm;
use app\models\providers\UserDataProvider;

echo ModalForm::widget(['formPath' => '@app/views/belt/_form', 'title' => 'Belts']);

?>
<?= GridViewBuilder::render($provider, 'Belts'); ?>
