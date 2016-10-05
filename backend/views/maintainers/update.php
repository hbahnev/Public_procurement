<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Maintainers */

$this->title = 'Промени данните на отговорник: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Maintainers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintainers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
