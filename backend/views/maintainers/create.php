<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Maintainers */

$this->title = 'Добави отговорник';
//$this->params['breadcrumbs'][] = ['label' => 'Maintainers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintainers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
