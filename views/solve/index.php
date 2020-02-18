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
 * @var $kpi []
 * @var $datesToSolve []
 */


$kpiContent = <<<html
    <div id="kpi" s>
        <p class="card score hard">Hard:  <b>$kpi[hard1]</b> </p>
        <p class="card score soft">Unplanned (Soft1):  <b>$kpi[soft1]</b> </p>
        <p class="card score soft">Preferences (Soft2):  <b>$kpi[soft2]</b> </p>
        <p class="card score soft">Zone Congestion (Soft3):  <b>$kpi[soft3]</b> </p>
        <p class="card score soft">Conjunction Congestion (Soft4):  <b>$kpi[soft4]</b> </p>
    </div>
html;


?>

<style>
    .score {
        padding: 8px;
        display: inline;
        margin: 10px;
        max-width: 80px;
    }

    .hard {
        background-color: crimson;
        color: white;
    }

    .soft {
        background-color: cadetblue;
        color: white;
    }

    .panel-title {
        color: whitesmoke;
    }
</style>


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
]) : ''; ?><?= $output ? \yii\bootstrap\Collapse::widget([
    'items' => [
        [
            'label' => 'KPI',
            'content' => $kpiContent,
            'contentOptions' => ['class' => 'in'],
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
