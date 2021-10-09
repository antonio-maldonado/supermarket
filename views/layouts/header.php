<?php
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
?>

<!--Estilos css-->
<link rel="stylesheet" href="<?= Url::to('../web/css/header.css') ?>">

<header class="main-header">
    <nav class="navbar navbar-static-top" >
      <div class="container">
        <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <h2 style="margin-top: 0.2em; font-style: normal; color:white;">
                Family pharmacies
            </h2>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
         
                
              
               <!--aqui termina eliminarlo abram del futuro --> 
            <?php 
            // Realizamos la verificación de la existencia de un usuario
            if(Yii::$app->user->isGuest){?>
            <!-- User Account Menu -->
            
            <li>
                <a href="<?= Url::to(['/user/security/login'])?>" style="margin-right: -35px;">
                  <?= Yii::t('app','Login') ?>
                </a>
            </li>
            <?php }else{ ?>
              
            <?php
              echo $this->render('../_useraccount',['directoryAsset'=>$directoryAsset ]);   
            } ?>




          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
</header>