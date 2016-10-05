<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaintainersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отговорници';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintainers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'address',
            'email:email',
            'phone',
            'obl',
            'contract',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    	$(".glyphicon-pencil").hide();
		$(".glyphicon-trash").hide();
});

</script>
</div>
