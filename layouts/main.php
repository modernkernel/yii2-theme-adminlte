<?php

/* @var $this \yii\web\View */
/* @var $content string */


use common\widgets\Alert;
use modernkernel\fontawesome\Icon;
use modernkernel\themeadminlte\AdminlteAsset;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);



?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand"><?= Yii::$app->name ?></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                        <?= Icon::widget(['icon'=>'bars']) ?>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= Yii::$app->homeUrl ?>">Home<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/about']) ?>">About</a></li>
                        <li><a href="<?= Yii::$app->urlManager->createUrl(['/site/contact']) ?>">Contact</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->

                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>

    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <h1>
                    <?= Html::encode($this->title) ?>
                    <?php if (!empty($this->params['subtitle'])): ?>
                        <small><?= Html::encode($this->params['subtitle']) ?></small>
                    <?php endif; ?>
                </h1>
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'homeLink' => [
                        'label' => Yii::t('app', 'AdminCP'),
                        'url' => Yii::$app->homeUrl
                    ]
                ]) ?>
            </section>

            <section class="no-content">
                <?= Alert::widget() ?>
                <?= $content ?>
            </section>
        </div>

    </div>
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.6
            </div>
            <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <?= Yii::$app->name ?>.</strong> <?= Yii::t('app', 'All rights reserved.') ?>
        </div>
        <!-- /.container -->
    </footer>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>