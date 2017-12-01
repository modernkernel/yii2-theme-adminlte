<?php

/* @var $this \yii\web\View */
/* @var $content string */

use powerkernel\themeadminlte\AdminlteAsset;
use nirvana\jsonld\JsonLDHelper;


AdminlteAsset::register($this);
JsonLDHelper::addBreadcrumbList();

?>
<?php $this->beginContent('@common/layouts/base.php'); ?>
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
