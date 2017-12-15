<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\SideMenu;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use powerkernel\fontawesome\Icon;
use powerkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;

AdminlteAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$url = \common\Core::getStorageUrl();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
    <body class="hold-transition <?= empty(Yii::$app->getView()->theme->skin)?'skin-blue':Yii::$app->getView()->theme->skin ?> sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <a href="<?= Yii::$app->urlManager->createUrl(['/site/index']) ?>" class="logo" target="_blank">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                <img src="<?= $url ?>/images/logo-mini.svg" class="img-responsive"
                     style="height: 30px; width: 30px; margin: 10px;" alt="<?= Yii::$app->name ?>"/>
            </span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg text-center">
                <img src="<?= $url ?>/images/logo-lg.svg" class="img-responsive"
                     style="max-height: 20px; max-width: 200px; margin: 15px auto;" alt="<?= Yii::$app->name ?>"/>
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
                            <a href="<?= Yii::$app->urlManager->createUrl(['/account/index']) ?>" target="">
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
            <strong><?= Yii::t('app', 'Copyright') ?> &copy; <?= date('Y') ?> <?= Yii::$app->name ?>.</strong> <?= Yii::t('app', 'All rights reserved.') ?>
        </footer>
    </div>
    <?php $this->endBody() ?>
    </body>
<?php $this->endContent() ?>