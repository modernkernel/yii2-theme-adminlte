<?php

/* @var $this \yii\web\View */
/* @var $content string */


use backend\assets\AppAsset;
use common\widgets\SideMenu;
use common\plugins\moment\MomentAsset;
use common\widgets\Alert;
use powerkernel\fontawesome\Icon;
use powerkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);
MomentAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$js = file_get_contents(__DIR__ . '/admin.min.js');
$this->registerJs($js);
$collapse=!empty(Yii::$app->session['sidebar-collapse'])?'sidebar-collapse':'';

$baseUrl = Yii::$app->request->baseUrl;
$iconImageUrl = Yii::$app->params['iconImageUrl'];
$url = empty($iconImageUrl) ? $baseUrl : $iconImageUrl;

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?> <?= $collapse ?>" data-toggle-url="<?= Yii::$app->urlManager->createUrl(['/site/toggle-sidebar']) ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <header class="main-header">
        <a href="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl(['site/index']) ?>" class="logo" target="_blank">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">
                <img src="<?= $url ?>/images/logo-mini.svg" class="img-responsive" style="height: 30px; width: 30px; margin: 10px;" alt="<?= Yii::$app->name ?>" />
            </span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg text-center">
                <img src="<?= $url ?>/images/logo-lg.svg" class="img-responsive" style="max-height: 20px; max-width: 200px; margin: 15px auto;"  alt="<?= Yii::$app->name ?>" />
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
                    <?php if(!Yii::$app->user->isGuest):?>
                    <li>
                        <a href="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl(['/account']) ?>" target="_blank">
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
                    <?php endif;?>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">
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