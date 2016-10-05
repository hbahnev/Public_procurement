<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline_complete')->textInput() ?>

    <?= $form->field($model, 'deadline_application')->textInput() ?>

    <?= $form->field($model, 'object')->dropDownList([ 'Доставка' => 'Доставка', 'Строителство' => 'Строителство', 'Услуга' => 'Услуга', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'contract_more')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'guarantee')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Aктивен' => 'Aктивен', 'Приключил' => 'Приключил', 'Прекратен' => 'Прекратен', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'annex')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'checkout')->dropDownList([ 'Авансово' => 'Авансово', 'Разсрочено' => 'Разсрочено', 'След П.Н.И' => 'След П.Н.И', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
