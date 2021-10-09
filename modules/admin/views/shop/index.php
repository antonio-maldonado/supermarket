<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Product;

$producto = Product::find()->all();

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Shop');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

 
<?php 
foreach($producto as $key=>$value){
    echo $value->name.'<br>';
}
?>

</div>
