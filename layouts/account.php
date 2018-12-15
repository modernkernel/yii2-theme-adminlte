<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\SideMenu;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use powerkernel\fontawesome\Icon;
use powerkernel\themeadminlte\AdminlteAsset;
use powerkernel\jsonld\JsonLDHelper;

AdminlteAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$url = \common\Core::getStorageUrl();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
<body class="hold-transition <?= empty(Yii::$app->getView()->theme->skin) ? 'skin-blue' : Yii::$app->getView()->theme->skin ?> sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="logo" target="_blank">
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
            <a href="#" class="sidebar-toggle no-content-before" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <?= Icon::widget(['name' => 'bars']) ?>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?= Yii::$app->urlManager->createUrl(['/account/index']) ?>" target="">
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
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <?= SideMenu::widget([
                ]) ?>
            </ul>
        </section>
    </aside>

    <div class="content-wrapper">
        <div class="no-container">
            <section class="content padding">
                <?= Alert::widget() ?>

                <?= $content ?>

            </section>
        </div>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <span class="server-time" data-timestamp="<?= time() ?>"></span>
        </div>
        <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <?= Yii::$app->name ?>
            .</strong> <?= Yii::t('app', 'All rights reserved.') ?>
    </footer>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>

