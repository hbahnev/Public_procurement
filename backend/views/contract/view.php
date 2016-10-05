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
	<?php if(Yii::$app->user->can('create-contracts')){ ?>
    <p>
        <?= Html::a('Редактиране', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изтриване', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Найстина ли искате да изтриете този договор?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<?php }?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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

</div>
