<?php

/* @var $this \yii\web\View */
/* @var $content string */


use common\widgets\Alert;
use frontend\widgets\Footer;
use frontend\widgets\Header;
use modernkernel\themeadminlte\AdminlteAsset;
use yii\widgets\Breadcrumbs;


AdminlteAsset::register($this);


?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?= Header::widget() ?>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
            </section>
            <section class="content no-padding">
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