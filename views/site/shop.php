<?php 
use app\models\Product;
use app\models\ProductSearch;
use app\models\Order;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Se obtiene todo los datos de la tabla orden, se ordena de manera ascendente
 */
$id_orden = Order::find()->orderBy(['id' => SORT_ASC])
                          ->all();
//$id_ultimaVenta = $id_orden[0];

$employee = 1709;
$venta_actual = 3;
//$id_ultimaVenta->order_number +1 ;

$model = new Product;



?>

<h1>Formulario</h1>


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
		<?= Html::textInput("cantidad", null, 
		[
		"class" => "form-control", 
		"type" => "number",
		"min" => 0,
		"max" => 25
		])?>

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



<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre del producto</th>
				<th>Descripción</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
				
			</tr>
		</thead>

<?php 
//$producto = 'Epamin';

$timestamp=time();
$dia =gmdate("Y-m-d", $timestamp);

	if($producto != NULL && $cantidad != NULL ){
$producto_bd = Product::findOne(['name' => $producto]);
	if($cantidad<=$producto_bd->quantity_in_stock) {
		
		$modelOrden= new Order;
		$modelOrden ->order_date = $dia;
		$modelOrden->code_product = $producto_bd->code;
		$modelOrden->price_each = $producto_bd->MSRP * $cantidad;
		$modelOrden->quantity_in_stock_product = $cantidad;
		$modelOrden->promotion_product = NULL;
		$modelOrden->order_number = $venta_actual;
		$modelOrden->employee_id = $employee;
		$modelOrden->save();
			
?>

		<tbody>
		<?php 
		
		$ordentest = Order::find()->where(['order_number' => $venta_actual])->all();
		
		foreach ($ordentest as $ordentests){
		$producto_bd2 = Product::findOne(['code' => $ordentests->code_product]);
		
		?>
			<tr>
				<td><?php echo $producto_bd2->name ?></td>
				<td><?php echo $producto_bd2->description ?></td>
				<td><?php echo $producto_bd2->MSRP ?></td>
				<td><?php echo $cantidad ?></td>
				<td><?php echo $producto_bd2->MSRP * $cantidad ?></td>
			</tr>
		<?php  	
		} ?>
		</tbody>
		
		<?php }else { echo "no tienes disponible en el inventario"; }	}
				
		?>
	</table>
	
------------------------------------------------------------------------
------------------------------------------------------------------------
------------------------------------------------------------------------	
<table class="table table-bordered">
<tbody>
			<tr>
				<th>fecha</th>
				<th>codigo</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Promocion</th>
				<th>numero de orden</th>
				<th>empleado</th>
				<th>id</th>
				
			</tr>

</tbody>
<tbody>
<?php foreach($id_orden as $ordenproducto){?>
<tr>
		<td><?php echo $ordenproducto->order_date?></td>
		<td><?php echo $ordenproducto->code_product?></td>
		<td><?php echo $ordenproducto->price_each?></td>
		<td><?php echo $ordenproducto->quantity_in_stock_product?></td>
		<td><?php echo $ordenproducto->promotion_product?></td>
		<td><?php echo $ordenproducto->order_number?></td>
		<td><?php echo $ordenproducto->employee_id?></td>
		<td><?php echo $ordenproducto->id?></td>
		</tr>
<?php }?>

</tbody>
</table>

