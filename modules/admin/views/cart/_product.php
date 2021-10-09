<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Product;
use app\models\ProductSearch;
use app\models\Order;

$this->title = Yii::t('app','Products');
$productLines =Product::find()->all();
$lines = \yii\helpers\ArrayHelper::map($productLines, 'code' , 'code');
$gridColumns =[

	'code',
	'name',
	'description',
	[
		'class' => 'yii\grid\ActionColumn',
		'template' => '{shoppingCart}',
		'buttons' => [
			'shoppingCart' => function ($url, $model, $key){
				return \yii\helpers\Html::a(
						'<span class="glyphicon glyphicon-shopping-cart"></span>',
						['/cart/add/', 'code'=> $model->code],
						['class' => 'profile-link',
							'title' => Yii::t('app', 'Add product code {0}, name{1}', 
							[$model->code, $model->name]),
						]				
				);
			},		
		],
	],
];

echo GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => $gridColumns,
]);
?>
