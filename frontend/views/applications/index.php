<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ApplicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оферти';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Направи оферта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'contract_number',
            'price',
            'deadline',
            'guarantee',
            'name',
            'bulstat',
            'address',
            'phone',
            'Additional:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
