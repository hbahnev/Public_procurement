<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Blog */

$this->title = 'Новини';
//$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Промени', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Изтрий', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Сигурни ли сте,че искате да изтриете тази новина?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'text:ntext',
        ],
    ]) ?>

</div>
