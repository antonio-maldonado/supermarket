<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Product;
use app\models\ProductSearch;
use yii\helpers\Url;
use kartik\dialog\Dialog;

use app\models\Order;

    	$id_orden = Order::find()->orderBy(['id' => SORT_DESC])
                          ->all();
		$id_ultimaVenta = $id_orden[0]->order_number+1;
		$employee = 1709;
    	
    	$timestamp=time();
		$dia =gmdate("Y-m-d", $timestamp);

    	foreach ($cartItems as $items){
    		
    		
    		$producto_bd = Product::findOne(['name' => $items->getProduct()->name]);
    		if($items->getQuantity()<=$producto_bd->quantity_in_stock) {
			
			$modelOrden= new Order;
			$modelOrden ->order_date = $dia;
			$modelOrden->code_product = $producto_bd->code;
			$modelOrden->price_each = $items->getCost();
			$modelOrden->quantity_in_stock_product =$items->getQuantity();
			$modelOrden->promotion_product = $producto_bd->promotion;
			$modelOrden->order_number = $id_ultimaVenta;
			$modelOrden->employee_id = $employee;
			$modelOrden->save();	    			
    			
    		}    	
    	}
    
    	  $cart->clear();    
   		
?>
