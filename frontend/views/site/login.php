<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Потребителско име') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Парола') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомни ме') ?>

                <div style="color:#999;margin:1em 0">
                    Ако сте забравили паролата си можете да я възтановите <?= Html::a('тук', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					<?= Html::a('Регистрация', ['/site/signup'], ['class'=>'btn btn-success']) ?></p>
					
                </div>
				

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
