<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContractSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поръчки';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?php 
			if(Yii::$app->user->can('create-contracts')){
			echo Html::a('Създай поръчка', ['create'], ['class' => 'btn btn-success']);
			}?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
			'title',
            'price',
            'deadline_application',
            'object',
            'guarantee',
            'status',
            'annex:ntext',
            'checkout',
			[
				'class' => 'yii\grid\ActionColumn',
				'buttons' => []
			],
            
        ],
    ]); ?>
</div>
<?php if(!Yii::$app->user->can('create-contracts')){ ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    	$(".glyphicon-pencil").hide();
		$(".glyphicon-trash").hide();
});

</script>
<?php }?>
