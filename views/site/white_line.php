



-------------------------
<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Línea blanca';
?>
<div class="site-white_line">
<div class="body-content">

<p>Ordenar Por:</p>

<?php echo Html::dropDownList('Lista', ['H'=>'Hombre'], ['prompt'=>'Precio más bajo']); ?>

        <div class="row">
            <div class="col-sm-4">
                <br>

                <img src="../assets/img/microondas.png" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Horno de Microondas Winia 0.7 Pies Cúbicos Gris KOR-667DG</p>
                <b>$1345.00</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>
            </div>

            <div class="col-sm-4">
                <br>
                <img src="../assets/img/estufa.jpg" width="270px" height="220px" style="margin-left: -25px; margin-top: -0.4em;"/>
                <p>Estufa de Piso Whirlpool Gas 30 pulgadas Silver WFR3200D</p>
                <b>$6495.00</b>
                <br>
                <?=html::button('<span class="glyphicon glyphicon-shopping-cart"></span> ' . ' Agregar',['class'=>'teaser'])?>

            </div>
        </div>

    </div>

</div>

