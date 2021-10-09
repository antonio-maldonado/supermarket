<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Venta';
?>
<div class="site-Venta">

<div class="body-content">

<p>Ordenar Por:</p>

<?php echo Html::dropDownList('Lista', ['H'=>'Hombre'], ['prompt'=>'Precio más bajo']); ?>

        <div class="row">
            <div class="col-sm-4">
                <br>

                <img src="../assets/img/advil.jpeg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Advil Pfizer 20mg 2 tabs</p>
                <b>$10.90</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>
            </div>

            <div class="col-sm-4">
                <br>
                <img src="../assets/img/paracetamol.jpg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Paracetamol 500 mg</p>
                <b>$12.40</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>

            </div>

            <div class="col-sm-4">
                <br>
                <img src="../assets/img/analgen.jpeg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Analgen GEL 30g</p>
                <b>$195.00</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>

            </div>
        </div>

    </div>


</div>