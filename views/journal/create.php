<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Journals */

$this->title = Yii::t('app', 'Create Journal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Journals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php /*
    <?php if (count($model->errors)>0): ?>
    	<div class="alert alert-danger" role="alert">
    		<pre><?= Html::encode(print_r($model->errors,true)) ?></pre>
    	</div>
    <?php endif; ?>
    */ ?>

    <?= $this->render('_form', [
        'model' => $model,
        'details' => $details,
        'accounts' => $accounts,
    ]) ?>

</div>

<?php /*
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <pre><?php print_r($post); ?></pre>
    </div>
</div>
*/ ?>
