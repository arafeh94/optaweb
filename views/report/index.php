<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 2/10/2020
 * Time: 11:49 PM
 */

use app\models\forms\SolveForm;
use kartik\form\ActiveForm;
use yii\bootstrap\Html;

/**
 * @var $model \app\models\forms\ReportForm
 * @var $datesToReport []
 * @var $provider []
 */


?>


<?php $form = ActiveForm::begin([]) ?>
<?= $form->field($model, 'date')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map($datesToReport, 'date_start', 'date_start'),
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>
<div class="button-container">
    <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-refresh spin hidden']) . ' submit', [
        'class' => 'btn btn-success',
        'id' => 'modal-form-submit',
        'onclick' => "$('#modal-form-submit').text('Solving...')"
    ]) ?>
</div>
<?php ActiveForm::end(); ?>


<?= $provider ? \app\components\GridViewBuilder::render($provider, 'Planning Report') : ''; ?>
