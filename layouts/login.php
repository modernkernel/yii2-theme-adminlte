<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use powerkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;


AdminlteAsset::register($this);
JsonLDHelper::addBreadcrumbList();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>" title="<?= Yii::$app->name ?>">
            <img src="/images/banner.svg" class="img-responsive" style="max-width: 80%; max-height: 120px; margin: 5px auto;"  alt="<?= Yii::$app->name ?>" />
        </a>
    </div>
    <div class="login-box-body">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>
