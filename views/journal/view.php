
<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use app\models\Currencies;
use app\models\Sources;
use app\models\Accounts;
use app\models\JournalTypes;

/* @var $this yii\web\View */
/* @var $model app\models\Journals */

$this->title = $model->journal_num;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="journals-view">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
      'class' => 'btn btn-danger',
      'data' => [
        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
        'method' => 'post',
      ],
    ]) ?>
    <?= Html::a(Yii::t('app', 'Create New'), ['create'], ['class' => 'btn btn-warning', 'title'=>Yii::t('app', 'Create New')]) ?>
    <?= Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-success']) ?>
  </p>

  <?= DetailView::widget([
    'model' => $model,
    'bordered' => true,
    'striped' => true,
    'condensed' => false,
    'responsive' => true,
    'hover' => true,
    'mode' => DetailView::MODE_VIEW,
    'hAlign' => DetailView::ALIGN_RIGHT,
    'vAlign' => DetailView::ALIGN_MIDDLE,
    'panel' => [
      'type' => DetailView::TYPE_INFO, 
      'heading' => '<i class="fa fa-book"></i> <strong>'.Yii::t('app', 'Department Information').'</strong>',
    ],
    'buttons1' => '',
    'buttons2' => '',
    'attributes' => [
      [
        'group' => true,
        'label' => Yii::t('app', 'Journal Header'),
        'rowOptions' => ['class'=>'table-primary']
      ],
      [
        'columns' => [
          [
            'attribute'=>'posted',
            'format'=>'raw',
            'value' => $model->posted 
              ? '<span class="label label-success">Yes</span>' 
              : '<span class="label label-danger">No</span>',
            'value' => JournalTypes::findOne($model->type_id)->name,
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute'=>'closing',
            'format'=>'raw',
            'value' => $model->closing 
              ? '<span class="label label-success">Yes</span>' 
              : '<span class="label label-danger">No</span>',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'journal_num',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute' => 'journal_date',
            'format' => [ 'date', 'php: d-M-Y' ],
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'currency_id',
            'value' => Currencies::findOne($model->currency_id)->name,
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute' => 'currency_rate1',
            'format' => ['decimal', 2],
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'journal_value',
            'format' => ['decimal', 2],
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'label' => 'Journal Value Real',
            'attribute' => 'journal_value_real',
            'format' => ['decimal', 2],
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'type_id',
            'value' => JournalTypes::findOne($model->type_id)->name,
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute' => 'account_id',
            'format' => 'raw',
            'value' => !isset($model->account_id) 
              ? '<span class="not-set">(not set)</span>' 
              : Accounts::findOne($model->account_id)->name,
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'remarks',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:80%' ],
          ],
        ],
      ],
      [
        'group' => true,
        'label' => Yii::t('app', 'Audit Information'),
        'rowOptions' => ['class'=>'table-primary']
      ],
      [
        'columns' => [
          [
            'attribute' => 'created_by',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute' => 'created_on',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
      [
        'columns' => [
          [
            'attribute' => 'modified_by',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
          [
            'attribute' => 'modified_on',
            'labelColOptions' => [ 'style'=>'width:20%;text-align:right;' ],
            'valueColOptions' => [ 'style'=>'width:30%' ],
          ],
        ],
      ],
    ],
  ]) ?>

  <div class="row">
    <div class="col-sm-12 col-md-12">
      <?= GridView::widget([
        'dataProvider' => $details,
        'showPageSummary' => true,
        'condensed' => true,
        'panel' => [
          'type' => GridView::TYPE_PRIMARY,
          'heading' => '<i class="glyphicon glyphicon-book"></i>  <strong>Journal Details</strong>',
        ],
        'columns' => [
          ['class' => 'kartik\grid\SerialColumn'],
          [
            'attribute' => 'account_id',
            'value' => 'account.name',
          ],
          [
            'attribute' => 'debet',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => ['decimal', 2],
            'pageSummary' => true
          ],
          [
            'attribute' => 'debet_real',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => ['decimal', 2],
            'pageSummary' => true,
            'visible' => $model->currency_rate1!=1,
          ],
          [
            'attribute' => 'credit',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => ['decimal', 2],
            'pageSummary' => true
          ],
          [
            'attribute' => 'credit_real',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'format' => ['decimal', 2],
            'pageSummary' => true,
            'visible' => $model->currency_rate1!=1,
          ],
          [
            'header' => 'Dept.',
            'attribute' => 'department_id',
            'value' => 'department.name',
          ],
          [
            'header' => 'Project',
            'attribute' => 'project_id',
            'value' => 'project.name',
          ],
          'remarks',
          // 'currency_rate1',
          // 'currency_rate2',
          // 'department_id',
          // 'project_id',
          // 'reference_id',
          // 'reference_num',
          // 'reference_date',
          // 'created_by',
          // 'created_on',
          // 'modified_by',
          // 'modified_on',
        ],
      ]); ?>
    </div>
  </div>

</div>
