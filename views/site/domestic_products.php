<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Productos del hogar';
?>
<div class="site-domestic_products">

<div class="body-content">

<p>Ordenar Por:</p>

<?php echo Html::dropDownList('Lista', ['H'=>'Hombre'], ['prompt'=>'Precio más bajo']); ?>

        <div class="row">
            <div class="col-sm-4">
                <br>

                <img src="../assets/img/limpiador.jpg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Limpiador Multiusos Fabuloso 750ml</p>
                <b>$24.50</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>
            </div>

            <div class="col-sm-4">
                <br>
                <img src="../assets/img/base.png" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Base para maceta Modelo YX-DC003</p>
                <b>$89.90</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>

            </div>

            <div class="col-sm-4">
                <br>
                <img src="../assets/img/lysol.jpg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Lysol desinfectante 475 g</p>
                <b>$219.90</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>

            </div>
        </div>

    </div>


</div>