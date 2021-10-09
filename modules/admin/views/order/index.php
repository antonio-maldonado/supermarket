<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
<style type="text/css">
.grid-view td {
    background-color: #FEFEFA;
    color: black;
    white-space:pre-line; 
    font-size: 17px;
}
.grid-view th {
    background-color: #FEFEFA; 
    border-color: black;
    color: white;
    font-size: 17px;
}
</style>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
 <!--'filterModel' => $searchModel,-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       
        'columns' => [
            
            'order_date',
            'code_product',
            'price_each',
            'quantity_in_stock_product',
            'promotion_product',
            //'order_number',
            //'employee_id',
            //'id',
			
            ['class' => 'yii\grid\ActionColumn',],
           
        ],
    ]); ?>


</div>
