<?php

/* @var $this \yii\web\View */
/* @var $content string */


use frontend\assets\AppAsset;
use powerkernel\themeadminlte\AdminlteAsset;
use powerkernel\jsonld\JsonLDHelper;


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