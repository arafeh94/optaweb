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
 * @var $error String
 * @var $kpi []
 * @var $datesToSolve []
 * @var $data []
 */

$kpiContent = <<<html
    <div id="kpi" s>
        <p class="card score hard">Hard:  <b>$kpi[hard1]</b> </p>
        <p class="card score soft">Unplanned (Soft1):  <b>$kpi[soft1]</b> </p>
        <p class="card score soft">Preferences (Soft2):  <b>$kpi[soft2]</b> </p>
        <p class="card score soft">Zone Congestion (Soft3):  <b>$kpi[soft3]</b> </p>
        <p class="card score soft">Conjunction Congestion (Soft4):  <b>$kpi[soft4]</b> </p>
        <p class="card score info">Unplanned Nb.:  <b>$kpi[unplanned]</b> </p>
        <p class="card score info">Planned Nb.:  <b>$kpi[planned]</b> </p>
        <p class="card score info">Time Spent:  <b>$kpi[time]ms</b> </p>
    </div>
html;


?>

<style>
    .score {
        padding: 8px;
        display: inline-table;
        margin: 10px;
        max-width: 300px;
    }

    .hard {
        background-color: crimson;
        color: white;
    }

    .soft {
        background-color: cadetblue;
        color: white;
    }

    .info {
        color: white;
        background-color: gray;
    }

    .panel-title {
        color: whitesmoke;
    }
    #chart_div text {
        fill: black !important;
        font-weight: bold;
        background-color: white;
    }
</style>

<?= $error ? \kartik\alert\Alert::widget(['id' => 'form-state-alert', 'body' => $error, 'options' => ['class' => 'alert-danger']]) : '' ?>


<?php $form = ActiveForm::begin([]) ?>
<?= $form->field($model, 'date')->widget(\kartik\select2\Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map($datesToSolve, 'date_start', 'date_start'),
    'options' => ['placeholder' => ''],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

<?= $form->field($model, 'includeUnplanned')->widget(\kartik\select2\Select2::classname(), [
    'data' => [1 => 'Show', 0 => 'Hide'],
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


<?php if ($data): ?>
    <div id="chart_div" style="margin-top: 12px"></div>
<?php endif; ?>


<script>
    chartData = <?=$data ? json_encode($data) : '[]'?>;
    window.addEventListener('load', function () {
        $('#solveform-includeunplanned').val(<?=$model->includeUnplanned ?: 0?>).trigger('change');
        loadChart();
    });

    function loadChart() {
        google.charts.load('current', {'packages': ['gantt']});
        google.charts.setOnLoadCallback(drawChart);
    }

    function gant_row(title, task, category, start, end, completion, previous) {
        return [title, task, category, start, end, null, completion, previous];
    }

    function drawChart() {
        let data = new google.visualization.DataTable();
        let rows = [];
        let id = 0;
        data.addColumn('string', 'Task ID');
        data.addColumn('string', 'Task Name');
        data.addColumn('string', 'Resource');
        data.addColumn('date', 'Start Date');
        data.addColumn('date', 'End Date');
        data.addColumn('number', 'Duration');
        data.addColumn('number', 'Percent Complete');
        data.addColumn('string', 'Dependencies');

        chartData.taskSeriesCollection.forEach(flightGroup => {
            let title = flightGroup.title;
            let tasks = flightGroup.tasks;
            tasks.forEach(requirement => {
                rows.push(gant_row(String(id++), requirement.title, title, new Date(requirement.start), new Date(requirement.end), 0, null));
            });
        });

        data.addRows(rows);
        console.log(rows);
        let options = {
            width: '100%',
            height: '800',
            gantt: {
                innerGridTrack: {fill: '#e7e5e5'},
                innerGridDarkTrack: {fill: '#cccaca'},
            },
        };
        let chart = new google.visualization.Gantt(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>