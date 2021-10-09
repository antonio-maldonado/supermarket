<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>

<?php

    if(Yii::$app->session->hasFlash('success')){
 		echo (Yii::$app->session->getFlash('success'));
    }
?>

<?php $form = ActiveForm::begin(['id'=>'user-form']); ?>
<?= $form->field($model,'name'); ?>
<?= $form->field($model,'email'); ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'name' => 'user-form']) ?>

<?php ActiveForm::end(); ?>