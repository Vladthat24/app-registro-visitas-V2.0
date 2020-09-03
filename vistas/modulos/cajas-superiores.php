<?php
$tabla="Tap_RegistroVisita";
$item = null;
$valor = null;

$cantidad = ModeloRegistro::mdlCantidadRegistros($tabla,$item,$valor);

foreach ($cantidad as $key => $va) {
    $cantidadV=$va["CANTIDAD"]; //ULTIMO REGISTRO 
}

$tabla2="Tap_Funcionario";
$item2 = null;
$valor2 = null;

$cantidadfuncionario = ModeloRegistro::mdlCantidadRegistros($tabla2,$item2,$valor2);

foreach ($cantidadfuncionario as $key => $va) {
    $funcionario=$va["CANTIDAD"]; //ULTIMO REGISTRO 
}

$tabla2="Tap_Entidad";
$item2 = null;
$valor2 = null;

$cantidadentidad = ModeloEntidad::mdlCantidadEntidad($tabla2,$item2,$valor2);

foreach ($cantidadentidad as $key => $va) {
    $entidad=$va["CANTIDAD"]; //ULTIMO REGISTRO 
}
?>

<div class="col-lg-6 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h3 style="text-align: center;"><?php echo number_format($cantidadV); ?></h3>
            <p style="text-align: center;">CANTIDAD DE VISITAS</p>
            <h4 style="text-align: center">REGISTRO</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="registro" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="col-lg-6 col-xs-12">

    <div class="small-box bg-red">

        <div class="inner">

            <h3 style="text-align: center;"><?php echo number_format($funcionario); ?></h3>
            <p style="text-align: center;">CANTIDAD DE VISITANTES</p>
            <h4 style="text-align: center">VISITANTES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="funcionario" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>
<div class="col-lg-12 col-xs-12">

    <div class="small-box bg-green">

        <div class="inner">

            <h3 style="text-align: center;"><?php echo number_format($entidad); ?></h3>
            <p style="text-align: center;">CANTIDAD DE ENTIDADES REGISTRADAS</p>
            <h4 style="text-align: center">ENTIDADES</h4>

        </div>

        <div class="icon">

            <i class="ion ion-person-add"></i>

        </div>

        <a href="entidad" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>


<div class="col-lg-12 col-xs-12">

    <div class="small-box bg-aqua">

        <div class="inner">

            <h2 style="text-align: center">Plataforma Tecnológica - Registro de Visitas</h2>
        
            <h4 style="text-align: center">ETF - Tecnologia de la Información-Área de Programación y Desarrollo Informático</h4>

        </div>

        <a href="registro" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

        </a>

    </div>

</div>


