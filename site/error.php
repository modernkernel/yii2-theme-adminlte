<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use modernkernel\fontawesome\Icon;
use yii\helpers\Html;

$this->title = $name;
$this->context->layout = 'error';

$color = 'yellow';
if ($exception->statusCode == 500) {
    $color = 'red';
}
?>
<section class="content">
    <div class="error-page">
        <h1 class="headline text-<?= $color ?>"> <?= $exception->statusCode ?></h1>
        <div class="error-content">
            <h3><?= Icon::widget(['icon' => 'warning text-'.$color]) ?> <?= nl2br(Html::encode($message)) ?></h3>

            <p>
                <?= Yii::t('app', 'The above error occurred while the Web server was processing your request.') ?>
            </p>

        </div>
    </div>
</section>
