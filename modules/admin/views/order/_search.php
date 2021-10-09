<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


<div style=" width:200px; display: inline-block;font-size: 17px" >
    <?= $form->field($model, 'order_date')->textInput() ?>
 </div>
<div style=" width:250px;padding:50px;display: inline-block; font-size: 17px">
    <?= $form->field($model, 'code_product')->textInput()  ?>
   </div>


  <!--  <?= $form->field($model, 'price_each') ?>

    <?= $form->field($model, 'quantity_in_stock_product') ?>

    <?= $form->field($model, 'promotion_product') ?>
    
   
-->

    <div class="form-group" style="display: inline;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-primary' ,'style'=>'background-color:red']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
