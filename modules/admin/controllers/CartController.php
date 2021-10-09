<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Product;
use app\models\ProductSearch;

use app\models\Order;


class CartController extends Controller{
		
		private $cart;
		public function __construct($id, $module, $config=[]) {
			
				parent::__construct($id, $module, $config);
				$this->cart = Yii::$app->cart;
		}	

		public function actionFinalizar($cant_ord = 0,$name_cart = [],$cant_cart = [],$cost_cart = []){
			return $this->render('_finalizar',['cant' => $cant_ord,'name_cart' => $name_cart, 'cant_cart' => $cant_cart,'cost_cart' => $cost_cart]);
		}
		
	

		public function actionIndex() {
			
		 $searchModel = new ProductSearch();
       $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cart'	=> $this->cart,
        ]);
			
		}
		
		public function actionAdd($code, $qty=1) {
				
				try{ 
					$product = Product::findOne($code);
					$quantity = $this->cart->getQuantity($qty, $product->quantity_in_stock);
					if($item = $this->cart->getItem($product->code)) {
						$this->cart->plus($item->getId(), $quantity);
					}else {
						$this->cart->add($product, $quantity);
					}		
					Yii::$app->session->setFlash('success', Yii::t('app', '{0} {1} were added',
					[$qty, $product->name]));			
				}catch (\DomainException $e) { 
					Yii::$app->errorHandler->logException($e);
					Yii::$app->session->setFlash('error', $e->getMenssage());
				}
				return $this->redirect(['index', 'order' => $product->code]);
		}	
		
	public function actionRemove($code)
    {
        try {
           
            $this->cart->remove($code);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
         $product = Product::findOne($code);
        return $this->redirect(['index','order' => $product->code]);
    }
	public function actionSubtract($code, $qty = -1) {
		try{
			$product = Product::findOne($code);
			if($item = $this->cart->getItem($product->code)) {
			if($item->getQuantity()>1) {
				$this->cart->plus($item->getId(),$qty);			
			}else {
				$this->cart->remove($code);
			}
			Yii::$app->session->setFlash('success', 'ok!');
			}
		}catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }	
        return $this->redirect(['index', 'order' => $product->code]);
	} 
	
	public function actionClear()
    {
        $this->cart->clear();
        return $this->redirect(['index']);
    }  
    
     public function actionFinish() {

		$id_orden = Order::find()->orderBy(['id' => SORT_DESC])
                          ->all();
		$id_ultimaVenta = $id_orden[0]->order_number+1;
		$employee = 1709;
    	$cartItems = \Yii::$app->cart->getItems();
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
    	
    	
		\Yii::$app->cart->clear();   
		
		/*$finish=1;
		return $this->redirect(['index', 'order' => $finish]);*/
		/*try {
           
            



    	$id_orden = Order::find()->orderBy(['id' => SORT_DESC])
                          ->all();
		$id_ultimaVenta = $id_orden[0]->order_number+1;
		$employee = 1709;
    	$items = \Yii::$app->cart->getItems();
    	$timestamp=time();
		$dia =gmdate("Y-m-d", $timestamp);
    		
    		
    		$producto_bd = Product::findOne(['name' => $items->getProduct()->name]);
    		if($qty<=$producto_bd->quantity_in_stock) {
			
			$modelOrden= new Order;
			$modelOrden ->order_date = $dia;
			$modelOrden->code_product = $producto_bd->code;
			$modelOrden->price_each = $cost;
			$modelOrden->quantity_in_stock_product =$qty;
			$modelOrden->promotion_product = $producto_bd->promotion;
			$modelOrden->order_number = $id_ultimaVenta;
			$modelOrden->employee_id = $employee;
			$modelOrden->save();	    			
    			
    		}    	
    	
    	
    	
    	  $cart->clear();    
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
         $product = Product::findOne($code);
        return $this->redirect(['index','order' => $product->code]);*/
		return $this->redirect(['index']);
		}

	
		
		
    	//-----------------
}


?>
