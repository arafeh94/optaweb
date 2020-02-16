<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 5/16/2018
 * Time: 3:38 PM
 */

/** @var $model User */

use app\models\User;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\bootstrap\Html;

if (!isset($model)) $model = new \app\models\Counter();
?>


<?php if (isset($saved) && $saved): ?>
    <?= Alert::widget(['id' => 'form-state-alert', 'body' => 'saved', 'options' => ['class' => 'alert-info']]) ?>
    <script>if (window.gridControl) window.gridControl.shouldRefresh = true</script>
    <script>if (window.modalControl) window.modalControl.close()</script>
<?php endif; ?>

<?php $form = ActiveForm::begin([
    'id' => 'model-form',
    'action' => ['counter/update'],
    'options' => ['data-pjax' => '']
]) ?>
<?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
<?= $form->field($model, 'range_id')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Range::find()->all(), 'id', 'id'),
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'addon' => \app\components\Extensions::select2Add(['range/index'], 'Add Range')
]); ?>
<?= $form->field($model, 'belt_id')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(\app\models\Belt::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
    'addon' => \app\components\Extensions::select2Add(['belt/index'], 'Add Belt')
]); ?>
<?= $form->field($model, 'ratio_passenger_per_timeunit')->textInput() ?>
<?= $form->field($model, 'total_passengers')->textInput() ?>
<?= $form->field($model, 'proximity')->textInput() ?>
<?= $form->field($model, 'unavailabilityPeriodStartTime')->widget(\kartik\time\TimePicker::className(), \app\components\Extensions::picker_time()) ?>
<?= $form->field($model, 'unavailabilityPeriodEndTime')->widget(\kartik\time\TimePicker::className(), \app\components\Extensions::picker_time()) ?>
<div class="button-container">
    <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-refresh spin hidden']) . ' submit', ['class' => 'btn btn-success', 'id' => 'modal-form-submit']) ?>
    <?= Html::button('close', ['data-dismiss' => "modal", 'class' => 'btn btn-danger']) ?>
</div>
<?php ActiveForm::end(); ?>
