<?php
use yii\helpers\Url;
use app\models\Employee;
use app\models\User;

$employees = [];
$cont = 1;

    $employees = Employee::find()->all();
    $users = User::find()->all(); 

?>

<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger"><?= count($employees)-count($users) ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><?= Yii::t('app','Tienes {0} empleados para crear usuario',count($employees)-count($users))?></li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                            <?php foreach($employees as $key=>$value){
                                if($cont > count($users)){?>
                                <li><!-- Task item -->
                                    <a>
                                        <h3>
                                        <?= $value->email ?>
                                            <small class="pull-right"><?= $value->first_name.' '.$value->last_name ?></small>
                                        </h3>

                                    </a>
                                </li>
                                <?php }
                                $cont++;
                                        } ?>
                                <!-- end task item -->            
                            </ul>
                        </li>
                    </ul>
