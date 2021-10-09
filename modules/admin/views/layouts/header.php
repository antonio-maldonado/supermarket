<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                
                <?php 
                if(Yii::$app->user->can('technicalSupport')){
                    echo ($this->render('_tasks', ['directoryAsset'=>$directoryAsset ]));
                }
               ?>
                
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                
               <?php  
               	
						echo $this->render('@app/views/_useraccount');               
                ?> 
                    
                        
               
            </ul>
        </div>
    </nav>
</header>
