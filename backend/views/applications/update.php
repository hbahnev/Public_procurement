<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Applications */

$this->title = 'Промени оферта: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="applications-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$( "#applications-contract_number" ).attr('placeholder','Моля, въведете номера на поръчката. Може да го намерите на страницата с поръчки.');
	$("#applications-price").attr('placeholder','оля, въведете цена в лева!');
	$("#applications-deadline").attr('placeholder','ГГГГ-MM-ДД');
	
	$("#applications-guarantee").attr('placeholder','Моля, въведете години гаранция!');
	$("#applications-name").attr('placeholder','Моля въведете вашето име!');
	$("#applications-bulstat").attr('placeholder','Моля, въведете вашия Булстат!');
	$("#applications-address").attr('placeholder','Моля, въведете вашия адрес!');
	$("#applications-phone").attr('placeholder','Моля, въведете телефон за връзка!');
	$("#applications-additional").attr('placeholder','Моля,въведете допълнителна информация!');
	
});

</script>