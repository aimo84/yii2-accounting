<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Projects;
use kartik\widgets\Select2;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Projects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projects-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-info">
        <div class="panel-heading">
            <h4><i class="glyphicon glyphicon-book"></i> 
                <?= $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update') ?>
                Project Details
            </h4>
        </div>

        <div class="panel-body">
            <?= $form->field($model, 'active')->checkBox() ?>
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'value')->widget(NumberControl::classname()) ?>
            <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'parent_id')
                ->widget(Select2::classname(), [
                    'data' => ArrayHelper::map(Projects::find()->all(), 'id', 'name'),
                    'options' => [
                        'placeholder' => 'Select Project ...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
            ]); ?>
        </div>

        <div class="panel-footer">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), [
                    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
                ]) ?>
                <?= Html::a(Yii::t('app', 'Back to List'), ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>
    </div>


    <?php /*
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contract_num')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'contact_phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'date_start_est')->textInput() ?>
    <?= $form->field($model, 'date_finish_est')->textInput() ?>
    <?= $form->field($model, 'date_start_actual')->textInput() ?>
    <?= $form->field($model, 'date_finish_actual')->textInput() ?>
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'progress_pct')->textInput(['maxlength' => true]) ?>
    */ ?>

    <?php ActiveForm::end(); ?>

</div>
