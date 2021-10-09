<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(24)?>" 
                class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= Yii::$app->user->identity->username?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= Yii::$app->user->identity->profile->getAvatarUrl(96)?>" 
                  class="img-circle" alt="User Image">

                  <p>
                    <?= Yii::$app->user->identity->profile->name ?>
                    <small>
                    <?= Yii::t('app','Member since {0}',
                    Yii::$app->formatter->asDate(Yii::$app->user->identity->created_at)
                    ) ?>
                    </small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    
                    <div class="col-xs-4 text-center">
                    <?php if(Yii::$app->user->can('employee')){
                      echo Html::a(Yii::t('app','Admin'), ['/admin']);
                    }else{
                      echo '<a href="#">Sales</a>';
                    }

                    ?>
                    </div>
							<div class="col-xs-4 text-center">
                      
                    </div>                    
                    <div class="col-xs-4 text-center">
                      <?php if(Yii::$app->user->identity->isAdmin){
                            echo Html::a(Yii::t('app', 'Users'), ['/user/admin']);
                      } 
                      ?>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= Url::to(['/user/settings/profile']) ?>"
                      class="btn btn-default btn-flat"> <?= Yii::t('app','Profile') ?></a>
                  </div>
                  <div class="pull-right">
                    <?php 
                      if(Yii::$app->session->has(\dektrium\user\controllers\AdminController::ORIGINAL_USER_SESSION_KEY)){
                        echo Html::a('<span class="btn btn-default btn-flat">'.
                        Yii::t('app','Back'),
                        ['/user/admin/switch'],
                        ['data-method' => 'post']
                        );
                      }else{
                        echo Html::a('<span class="btn btn-default btn-flat">'.
                        Yii::t('app','Sign out'),
                        ['/user/security/logout'],
                        ['data-method' => 'post']
                        );
                      }
                    ?>
                  </div>
                </li>
              </ul>
            </li>