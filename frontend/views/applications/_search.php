<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplicationsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'contract_number') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'deadline') ?>

    <?= $form->field($model, 'guarantee') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'bulstat') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'Additional') ?>

    <div class="form-group">
        <?= Html::submitButton('Търси', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Обнови', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
