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



?>


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
