<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use modernkernel\themeadminlte\AdminlteAsset;


AppAsset::register($this);
AdminlteAsset::register($this);


?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= Yii::$app->homeUrl ?>"><?= Yii::$app->name ?></a>
    </div>
    <div class="login-box-body">
        <?= $content ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>