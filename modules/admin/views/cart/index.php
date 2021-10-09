<?php

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="row">
<?php
$this ->params['breadcrumbs'][]=[
	'label' => Yii::t('app', 'My cart'),
	'url'	 =>	['/cart']
];
?>
</div>
<br><br>
<div class="row">
<?php

$cartItems = $cart->getItems();
	echo $this->render('_cartitems',[
		'cart' => $cart,
		'cartItems' => $cartItems,	
	]);			

?>
</div>
<br><br>
<div class="row">
<?php

	echo $this->render('_product',[
		'cart' => $cart,
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,	
	
	]);
?>

</div>
<br><br>		
<div class="row">





