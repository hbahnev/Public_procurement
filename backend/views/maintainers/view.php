<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Maintainers */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Maintainers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintainers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Промени', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изтрий', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сигурни ли сте, че искате да изтриете този отговорник?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'address',
            'email:email',
            'phone',
            'obl',
            'contract',
        ],
    ]) ?>

</div>
