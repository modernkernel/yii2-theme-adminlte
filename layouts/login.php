<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use powerkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;


AdminlteAsset::register($this);
JsonLDHelper::addBreadcrumbList();

$url = \common\Core::getStorageUrl();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <div class="row">
            <div class="col-xs-10 col-xs-push-1">
                <a href="<?= Yii::$app->homeUrl ?>" title="<?= Yii::$app->name ?>">
                    <?= \common\models\Setting::getValue('logoLogin') ?>
                </a>
            </div>
        </div>
    </div>
    <div class="login-box-body">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>
