<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Journals */

$this->title = Yii::t('app', 'Create Expense');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'details' => $details,
    ]) ?>

</div>
