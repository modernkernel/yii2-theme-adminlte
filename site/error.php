<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use common\models\Setting;
use powerkernel\fontawesome\Icon;
use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'error';

$color = 'yellow';
if ($exception->statusCode == 500) {
    $color = 'red';
}

$url = \common\Core::getStorageUrl();

?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="error-page">
                <a href="<?= Yii::$app->homeUrl ?>" title="<?= Yii::$app->name ?>">
                    <img src="<?= $url ?>/images/banner.svg" class="img-responsive"
                         style="max-width: 80%; max-height: 60px; margin: 5px auto;" alt="<?= Yii::$app->name ?>"/>
                </a>
                <div>
                    <hr/>
                </div>

                <h1 class="headline text-<?= $color ?>"> <?= $exception->statusCode ?></h1>
                <div class="error-content">
                    <h3><?= Icon::widget(['name' => 'exclamation-triangle', 'options' => ['class' => 'text-' . $color]]) ?> <?= nl2br(Html::encode($message)) ?></h3>

                    <p>
                        <?= Yii::t('app', 'The above error occurred while the Web server was processing your request.') ?>
                    </p>
                    <p>
                        <?= Yii::t('app', 'Please contact us if you think this is a server error. Thank you.') ?>
                    </p>
                </div>

                <?php if (!empty(Setting::getValue('googleCustomSearch'))): ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="" role="search"
                                  action="<?= Yii::$app->urlManager->createUrl(['/site/search']) ?>">
                                <div class="input-group">
                                    <input name="q" value="<?= Yii::$app->request->get('q') ?>" type="text"
                                           class="form-control"
                                           placeholder="<?= Yii::t('app', 'Search') ?>">
                                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default btn-flat">
                          <?= Icon::widget(['icon' => 'search']) ?>
                      </button>
                    </span>
                                </div>
                            </form>

                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty(Yii::$app->request->referrer)): ?>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-xs-12">
                        <div class="text-center">
                            <a href="<?= Yii::$app->request->referrer ?>"
                               class="btn btn-primary"><?= Yii::t('app', 'Go Back') ?></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
