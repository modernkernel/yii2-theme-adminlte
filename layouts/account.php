<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use modernkernel\themeadminlte\AdminlteAsset;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;

AdminlteAsset::register($this);
AppAsset::register($this);
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
                                <?=
                                Nav::widget([
                                    'options' => ['class' => 'nav-stacked'],
                                    'items' => [
                                        ['label' => Yii::t('app','Profile'), 'url' => ['/account/index']],
                                        ['label' => Yii::t('app','Email'), 'url' => ['/account/email']],
                                        ['label' => Yii::t('app','Password'), 'url' => ['/account/password']],
                                        ['label' => Yii::t('app','Linked Accounts'), 'url' => ['/account/linked']],
                                    ],
                                ]);
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?= Yii::t('app', 'Blog') ?></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <?=
                                Nav::widget([
                                    'options' => ['class' => 'nav-stacked'],
                                    'items' => [
                                        ['label' => Yii::t('app','My Blog'), 'url' => ['/blog/manage']],
                                        ['label' => Yii::t('app','Write'), 'url' => ['/blog/create']],
                                    ],
                                ]);
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-sm-9">
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