<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Applications */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Applications', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Промени', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изтрий', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сигурни ли сте, че искате да изтриете тази оферта?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'contract_number',
            'price',
            'deadline',
            'guarantee',
            'name',
            'bulstat',
            'address',
            'phone',
            'Additional:ntext',
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

</div>
