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
        <?php 
            if($model->isActive =='Yes')
            {
                echo 'Офертата e одобрена!';
                
            }
            else
            {
               echo 'Офертата все още не е одобрена!';
            }


        ?>
    </p>
    <p>
        <?php 
        if($model->isActive!='Yes'){
		echo Html::a('Одобри', ['approve', 'id' => $model->id,'cId' => $model->contract_number], ['class' => 'btn btn-success']);
    }?>

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
            'owner_id',
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
