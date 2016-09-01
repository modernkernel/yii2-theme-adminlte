<?php

/* @var $this \yii\web\View */
/* @var $content string */


use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use modernkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;
use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);
AppAsset::register($this);
JsonLDHelper::addBreadcrumbList();
?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
<?php $this->beginBody() ?>

<div class="wrapper">
    <?= Header::widget() ?>
    <div class="content-wrapper">
        <div class="container">

            <section class="content-header" style="padding: 10px 0">
                <h1>
                    <?= Html::encode($this->title) ?>
                    <?php if(!empty($this->params['subtitle'])):?>
                        <small><?= Html::encode($this->params['subtitle']) ?></small>
                    <?php endif;?>
                </h1>
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
            </section>

            <section class="content" style="padding: 10px 0">
                <?= Alert::widget() ?>
                <?= $content ?>
            </section>
        </div>
    </div>
    <?= Footer::widget() ?>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>