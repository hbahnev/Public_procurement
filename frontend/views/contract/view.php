<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contract */

$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
			'title',
            'price',
            'deadline_complete',
            'deadline_application',
            'object',
            'contract_more:ntext',
            'guarantee',
            'status',
            'annex:ntext',
            'checkout',
        ],
    ]) ?>
	<?php if($model->filePath){?>
	<a href="<?=$model->filePath?>" download class="btn btn-success">Свали Файл</a>
	<?php }
		else{
			?>
			<a  download class="btn btn-danger">Към този договор няма прикрепен файл</a>
			<?php
		}?>
	<a href="http://rop3-app1.aop.bg:7778/portal/page?_pageid=93,1&_dad=portal&_schema=PORTAL" class="btn btn-success">АОП</a>
	<?= Html::a('Изпрати оферта за тази поръчка', ['/applications/create'], ['class'=>'btn btn-success']) ?>

</div>
