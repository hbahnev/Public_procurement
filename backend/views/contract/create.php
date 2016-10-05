<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = 'Създай поръчка';
//$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#contract-price").attr('placeholder','Цена на поръчката.');
	$("#contract-deadline_complete").attr('placeholder','ГГГГ-MM-ДД Крайна дата за изпълнение на поръчката.');
	$("#contract-deadline_application").attr('placeholder','ГГГГ-MM-ДД Крайна дата за изпращане на оферти.');
	$("#contract-contract_more").attr('placeholder','Допълнителна информация.');
	$("#contract-guarantee").attr('placeholder','Години гаранция.');
	
});

</script>