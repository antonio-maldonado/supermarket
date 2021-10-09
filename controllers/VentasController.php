<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Product;
use app\models\ProductSearch;


class VentasController extends Controller{
		
		private $cart;
		public function __construct($id, $module, $config=[]) {
			
				parent::__construct($id, $module, $config);
				$this->cart = Yii::$app->cart;
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
		


		public function actionAdd($name,$stock) {
			
			$model = Product::findOne($name);
			
			if($stock <= $model->quantity_in_stock){
				
				return $model;
			
			}
		
		}
		
		
}





?>