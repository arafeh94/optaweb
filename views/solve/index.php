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
 * @var $image String
 * @var $output String
 * @var $model SolveForm
 * @var $datesToSolve []
 */


?>



<?php $form = ActiveForm::begin([]) ?>
<?= $form->field($model, 'date')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map($datesToSolve, 'date_start', 'date_start'),
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>
<?= $output ? \yii\bootstrap\Collapse::widget([
    'items' => [
        [
            'label' => 'Output Log',
            'content' => $output,
            'contentOptions' => ['class' => 'out'],
        ],
    ]
]) : ''; ?>
<div class="button-container">
    <?= Html::submitButton(Html::tag('i', '', ['class' => 'glyphicon glyphicon-refresh spin hidden']) . ' submit', [
        'class' => 'btn btn-success',
        'id' => 'modal-form-submit',
        'onclick' => "$('#modal-form-submit').text('Solving...')"
    ]) ?>
</div>
<?php ActiveForm::end(); ?>

<div style="width: 100%;display: flex">
    <?= $image ? Html::img('@web/gantt.png?' . date('Y:m:d H:i:s'), ['style' => 'margin: auto;']) : '' ?>
</div>
