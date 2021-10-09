<?php

use app\models\Product;
use app\models\ProductSearch;
use app\models\Order;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;


$id_orden = Order::find()->orderBy(['id' => SORT_ASC])
                          ->all();
//$id_ultimaVenta = $id_orden[0];

$employee = 1709;
$venta_actual = 3;

?>

<?= Html::beginForm(
	Url::toRoute("site/request"),
	"get", 
	['class' => 'form-inline']);

?>

<div class="row">
	<div class="col-lg-3">
	
		<?= Html::label("Producto", "nombre")?>
		<?= Html::textInput("nombre", null, ["class" => "form-control"])?>
		
		</div>
		<div class="col-lg-3">
		<?= Html::label("Cantidad", "cantidad")?>
		<?= Html::textInput("cantidad", null,["class" => "form-control"])?> 
		

		</div>
<div class="col-lg-3">
<?= Html::label(" ")?>
<?= Html::submitInput("Agregar", ["class" => "btn btn-primary"]) ?>
</div>
<div class="col-lg-3">
<?= Html::label(Yii::t('app', 'Numero de venta es: {0}', $venta_actual))?>
</div>
</div>
<?= Html::endForm()?>





<?php
//echo GridView::widget([
	//'dataProvider' => $dataProvider,
	//'filterModel' => $searchModel,
	//'columns' => $gridColumns,
//]);
?>

