<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Yii::$app->params['productName'] ?> | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="navbar-fixed">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<i class="glyphicon glyphicon-book"></i> '. Yii::$app->params['productName'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
        'innerContainerOptions' => [
            'class' => 'container-fluid',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
              'label' => 'Settings',
              'url' => ['/site/settings'],
              'visible' => !Yii::$app->user->isGuest,
              'items' => [
                ['label' => 'COA', 'url' => ['/account/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Currencies', 'url' => ['/currency/index'], 'visible' => !Yii::$app->user->isGuest],
                '<li class="divider"></li>',
                ['label' => 'Departments', 'url' => ['/department/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Projects', 'url' => ['/project/index'], 'visible' => !Yii::$app->user->isGuest],
              ],
            ],
            [
              'label' => 'Transactions',
              'url' => ['/journal/index'],
              'visible' => !Yii::$app->user->isGuest,
              'items' => [
                ['label' => 'General Journals', 'url' => ['/journal/index'], 'visible' => !Yii::$app->user->isGuest],
                '<li class="divider"></li>',
                ['label' => 'Revenues', 'url' => ['/receive/index'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Expenses', 'url' => ['/payment/index'], 'visible' => !Yii::$app->user->isGuest],
              ],
            ],
            [
              'label' => 'Reports',
              'url' => ['/report/index'],
              'visible' => !Yii::$app->user->isGuest,
              'items' => [
                ['label' => 'General Ledger', 'url' => ['/report/ledger'], 'visible' => !Yii::$app->user->isGuest],
                '<li class="divider"></li>',
                ['label' => 'Trial Balance', 'url' => ['/report/balance-trial'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Balance Sheet', 'url' => ['/report/balance-sheet'], 'visible' => !Yii::$app->user->isGuest],
                ['label' => 'Income Statement', 'url' => ['/report/income-statement'], 'visible' => !Yii::$app->user->isGuest],
              ],
            ],
            ['label' => 'About', 'url' => ['/site/about']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <p class="pull-left">&copy; <?= date('Y') ?>, <?= Yii::$app->params['companyName'] ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
