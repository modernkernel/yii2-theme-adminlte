<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use modernkernel\themeadminlte\AdminlteAsset;



AdminlteAsset::register($this);


?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="layout-top-nav">
<?php $this->beginBody() ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?= $content ?>
</div>
<!-- /.content-wrapper -->
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>
