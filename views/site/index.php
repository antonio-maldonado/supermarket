<?php
use Yii;
use yii\helpers\Url;
use app\models\Pharse;

$pharse = Pharse::findOne(rand(1,10));
/**
 * Titulo de la página  
 */
$this->title = 'home';
?>

<!--Estilos css-->
<link rel="stylesheet" href="<?= Url::to('../web/css/home.css') ?>">
 
 

<div class="image-fondo cabecera" style="margin-left: -5em; margin-top: -2.3em; width: 73.55em; max-height: 45em;">
	<div class="row">
		
	<div class="col-md-9" style="margin-top: 10em ; margin-left: 5em;"  >

	<div class="flip-card">
  <div class="flip-card-inner">
  
	<h2 style="text-align: center; margin-left: 1em; margin-right: 1em;">
        Bienvenido!!!
    	</h2>
   		 <h4 style="text-align: center; margin-left: 1em; margin-right: 1em;">
     	  <?php 
     	  echo $pharse->data;
    	   ?>
    	</h4>
	
 
  </div>
</div> 
		
	 	
		
	</div>
		<div class="col-md-3" style="margin-top: 14em; margin-left: -5em;">
		
			<a class="twitter-timeline" data-lang="es" data-width="300" 
			data-height="400" data-theme="light" href="https://twitter.com/DiariodeYucatan?ref_src=twsrc%5Etfw"
		   
			>
			Tweets by DiariodeYucatan</a> 
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

		</div>
</div>
</div>

	





<!--Esto es una card-->

   

   
