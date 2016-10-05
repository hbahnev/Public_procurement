<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline_complete')->textInput() ?>

    <?= $form->field($model, 'deadline_application')->textInput() ?>

    <?= $form->field($model, 'object')->dropDownList([ 'Доставка' => 'Доставка', 'Строителство' => 'Строителство', 'Услуга' => 'Услуга',]) ?>

    <?= $form->field($model, 'contract_more')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'guarantee')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Активен' => 'Активен', 'Завършен' => 'Завършен', 'Замразен' => 'Замразен', ]) ?>

    <?= $form->field($model, 'annex')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'checkout')->dropDownList([ 'Предплата' => 'Предплата', 'Отложено' => 'Отложено', 'След свършване на проекта' => 'След свършване на проекта', ]) ?>
	
	<label for="file" ><span style="font-size:50px;" class="glyphicon glyphicon-upload" required="required"></span> Файл - Моля качвайте името на файла с латински символи!</label>
    <span id="error" class="alert-danger"></span>
	<input type="file" onchange="document.getElementById('error').innerHTML = '';" name="file" id="file" style="display:none;" required="required" />
	<br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Създай' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick'=>'return CheckFile()']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<script>
function CheckFile()
{
    if(document.getElementById("file").value == "")
    {
        document.getElementById("error").innerHTML = "Моля качете файл!";
        return false;
    }
}
</script>
</div>
