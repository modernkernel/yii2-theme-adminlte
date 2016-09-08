<?php

/* @var $this \yii\web\View */
/* @var $content string */


use backend\assets\AppAsset;
use backend\widgets\SideMenu;
use common\plugins\moment\MomentAsset;
use common\widgets\Alert;
use modernkernel\fontawesome\Icon;
use modernkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);
MomentAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$js = file_get_contents(__DIR__ . '/admin.min.js');
$this->registerJs($js);

?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <a href="<?= Yii::$app->urlManagerFrontend->createUrl(['/site/index']) ?>" class="logo" target="_blank">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                <img src="/images/logo-mini.svg" class="img-responsive" style="height: 40px; margin: 5px;" alt="<?= Yii::$app->name ?>" />
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <img src="/images/logo-lg.svg" class="img-responsive" style="height: 40px; margin-top: 5px;"  alt="<?= Yii::$app->name ?>" />
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= Yii::$app->urlManagerFrontend->createUrl(['/account']) ?>" target="_blank">
                            <?= Icon::widget(['icon' => 'user']) ?>
                            <span><?= Yii::$app->user->identity->fullname ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/site/logout']) ?>">
                            <span><?= Yii::t('app', 'Logout') ?></span>
                            <?= Icon::widget(['icon' => 'sign-out']) ?>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
                <?= SideMenu::widget() ?>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?= Html::encode($this->title) ?>
                <?php if(!empty($this->params['subtitle'])):?>
                <small><?= Html::encode($this->params['subtitle']) ?></small>
                <?php endif;?>
            </h1>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink'=>[
                    'label'=>Yii::t('app', 'AdminCP'),
                    'url'=>Yii::$app->homeUrl
                ]
            ]) ?>
        </section>

        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>

    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <span class="server-time" data-timestamp="<?= time() ?>"></span>
        </div>
        <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <?= Yii::$app->name ?>.</strong> <?= Yii::t('app', 'All rights reserved.') ?>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>