<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filterproduct-index">
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
    
            'code',
            'name',
            'description:ntext',
            'quantity_in_stock',
            'buy_price',
            'MSRP',
            //'imageFile',
            'promotion',

        ],
    ]); ?>


</div>
