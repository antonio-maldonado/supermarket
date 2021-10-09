<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'code_product')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'price_each')->textInput(['maxlength' => true]) ?>

   <!--
    <?= $form->field($model, 'quantity_in_stock_product')->textInput() ?>

    <?= $form->field($model, 'promotion_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_number')->textInput() ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>
  
-->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
