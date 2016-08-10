<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use modernkernel\themeadminlte\AdminlteAsset;
use yii\widgets\Breadcrumbs;

AdminlteAsset::register($this);
?>
<?php $this->beginContent('@vendor/modernkernel/yii2-theme-adminlte/layouts/base.php'); ?>
<body class="<?= Yii::$app->getView()->theme->bodyClass ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?= \frontend\widgets\Header::widget() ?>
    <div class="content-wrapper">
        <div class="container">
            <section class="content-header">
                <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
            </section>

            <section class="content no-padding">
                <?= Alert::widget() ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?= Yii::t('app', 'Personal settings') ?></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="nav nav-stacked">
                                    <li class="active"><a href="<?= Yii::$app->urlManager->createUrl(['/account']) ?>"><?= Yii::t('app', 'Profile') ?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl(['/account/email']) ?>"><?= Yii::t('app', 'Email') ?></a></li>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl(['/account/password']) ?>"><?= Yii::t('app', 'Password') ?></a></li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <?= $content ?>
                    </div>
                </div>

            </section>
        </div>
    </div>
    <?= \frontend\widgets\Footer::widget() ?>
</div>
<?php $this->endBody() ?>
</body>
<?php $this->endContent() ?>