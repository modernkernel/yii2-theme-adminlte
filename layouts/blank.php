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
<?php $this->beginContent('@common/layouts/base.php'); ?>
    <body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
    <?php $this->beginBody() ?>

    <div class="row">
        <div class="col-xs-12" style="margin: 10px;">
            <?= $content ?>
        </div>

    </div>
    <?php $this->endBody() ?>
    </body>
<?php $this->endContent() ?>