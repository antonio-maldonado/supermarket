<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div style=" width:200px; display: inline-block;font-size: 17px" >
    <?= $form->field($model, 'code')->textInput() ?>
    </div>

    <div style=" width:250px;padding:50px;display: inline-block; font-size: 17px">
    <?= $form->field($model, 'name')->textInput() ?>
    </div>
    <!--
    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'quantity_in_stock') ?>

    <?= $form->field($model, 'buy_price') ?>

    -->

    <?php // echo $form->field($model, 'MSRP') ?>

    <?php // echo $form->field($model, 'imageFile') ?>

    <?php // echo $form->field($model, 'promotion') ?>

    <!--div class="form-group"-->
        <!--?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?-->
        <!--?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?-->
    <!--/div-->
    <div class="form-group" style="display: inline;">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-primary' ,'style'=>'background-color:red']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
