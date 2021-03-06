<?php

/* @var $this \yii\web\View */
/* @var $content string */


use backend\assets\AppAsset;
use common\widgets\SideMenu;
use common\plugins\moment\MomentAsset;
use common\widgets\Alert;
use powerkernel\fontawesome\Icon;
use powerkernel\themeadminlte\AdminlteAsset;
use powerkernel\jsonld\JsonLDHelper;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);
MomentAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$js = file_get_contents(__DIR__ . '/admin.min.js');
$this->registerJs($js);
$collapse=!empty(Yii::$app->session['sidebar-collapse'])?'sidebar-collapse':'';

$url = \common\Core::getStorageUrl();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?> <?= $collapse ?>" data-toggle-url="<?= Yii::$app->urlManager->createUrl(['/site/toggle-sidebar']) ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <a href="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/index']) ?>" class="logo" target="_blank">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini text-center">
                <?= \common\models\Setting::getValue('logoXs') ?>
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg text-center">
                <?= \common\models\Setting::getValue('logoLg') ?>
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <?= Icon::widget(['name' => 'bars']) ?>
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <?php if(!Yii::$app->user->isGuest):?>
                    <li>
                        <a href="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/account']) ?>" target="_blank">
                            <?= Icon::widget(['name' => 'user']) ?>
                            <span><?= Yii::$app->user->identity->fullname ?></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/site/logout']) ?>">
                            <span><?= Yii::t('app', 'Logout') ?></span>
                            <?= Icon::widget(['name' => 'sign-out']) ?>
                        </a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <?= SideMenu::widget([
                    'homeTitle'=>Yii::t('app', 'Admin CP'),
                    'homeUrl'=>Yii::$app->homeUrl,
                ]) ?>
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
        <div class="pull-right hidden-xs no-print">
            <span class="server-time" data-timestamp="<?= time() ?>"></span>
        </div>
        <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <?= Yii::$app->name ?>.</strong> <?= Yii::t('app', 'All rights reserved.') ?>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>
