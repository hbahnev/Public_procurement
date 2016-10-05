<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Изникна грешка докато се изпълняваше вашата заявка.
    </p>
    <p>
        Моля, опитайте отново или се свържете с нас. Благодарим Ви!
    </p>

</div>
