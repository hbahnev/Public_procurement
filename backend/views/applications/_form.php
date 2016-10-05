<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

	
	<?php
		$contractsArray = array();
		//echo '<div class="form-group field-applications-price required"><select name="contract_number" id="contract_number" class="form-control">';
		foreach($contracts as $contr)
		{
			//echo '<option value="'.$contr->id.'">'.$contr->id. ' - ' .$contr->title.'</option>';

			$dateNow = date("Y-m-d H:i:s");
			if($contr->deadline_application > $dateNow && $contr->status=='Активен')
			{
				$contractsArray[$contr->id] = 'Number of contract : '. $contr->id . ' Title : '.$contr->title;
			}
			
		}
		
		//echo '</select></div>';*/
	
	
	?>
    <?=$form->field($model, 'contract_number')->dropDownList($contractsArray) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'guarantee')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bulstat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Additional')->textarea(['rows' => 6]) ?>
	
	<label for="file" ><span style="font-size:50px;" class="glyphicon glyphicon-upload" required="required"></span> Файл - Моля качвайте името на файла с латински символи!</label>
	<span id="error" class="alert-danger"></span>
	<input type="file" onchange="document.getElementById('error').innerHTML = '';"  name="file" id="file" style="display:none;" required="required" />
	<br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onclick'=>'return CheckFile();']) ?>
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
