<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-lg-6">
            <img src="vistas/img/plantilla/logo-dirisls-bloque copy.png" class="img-responsive" style="margin: 10px;">
        </div>
        <div class="col col-lg-5" style="margin-top: 20px;">

            <strong class="text-$http_response_header" style="color: white;">“Año de la Universalización de la Salud”</strong>
        </div>
        <div class="col col-lg-1" style="margin-top: 20px;">

            <a href="login" type="button" name="login" class="btn btn-primary">Iniciar Session</a>
        </div>

    </div>

</div>

<div class="content">

    <div class="row">

        <h1 style="color: white; text-align: center">Plataforma Tecnológica - Registro de Visitas</h1>

        <section class="content">

            <div class="box">

                <div class="box-header with-border">

                    <form class="form-inline" method="POST" action="">

                        <label>Fecha Desde:</label>

                        <input type="date" class="form-control" placeholder="Start" name="fechaI" />

                        <label>Hasta</label>

                        <input type="date" class="form-control" placeholder="End" name="fechaFinal" value="<?php echo date("Y-m-d"); ?>" />

                        <button class="btn btn-primary" name="search">

                            <span class="glyphicon glyphicon-search"></span>

                        </button>

                        <a href="consulta" type="button" class="btn btn-success">

                            <span class="glyphicon glyphicon-refresh"></span>

                        </a>

                    </form>

                </div>

                <div class="box-body" id="resultados">

                    <br>
                    <table class="table table-bordered table-striped dt-responsive tablas tablaActualizar" width="100%">

                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th style="width:20px">TIPO DOCUMENTO</th>
                                <th>N° DOC DEL VISITANTE</th>
                                <th>NOMBRE DEL VISITANTE</th>
                                <th>CARGO DEL VISITANTE</th>
                                <th>ENTIDAD DEL VISITANTE</th>
                                <th>MOTIVO DE LA VISITA</th>
                                <th>FUNCIONARIO</th>
                                <th>AREA/OFICINA</th>
                                <th style="width:5px">CARGO</th>
                                <th>FECHA DE INGRESO</th>
                                <th style="width:20px">HORA DE INGRESO</th>
                                <th>FECHA DE SALIDA</th>
                                <th style="width:20px">HORA DE SALIDA</th>
                                <th style="width:5px">DIGITADOR</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php

                            if (isset($_POST['search'])) {

                                if (empty($_POST["fechaI"])) {

                                    echo '<script>

                                    swal({
                                          type: "error",
                                          title: "¡Ingresa las fechas!",
                                          showConfirmButton: true,
                                          confirmButtonText: "Cerrar"
                                          }).then((result) => {
                                            if (result.value) {
                
                                            window.location = "consulta";
                
                                            }
                                        })
                
                                  </script>';
                                    $fechaInicial = null;
                                    $fechaFinal = null;
                                } else {

                                    $d1 = DateTime::createFromFormat('Y-m-d', $_POST["fechaI"]);
                                    $d2 = DateTime::createFromFormat('Y-m-d', $_POST["fechaFinal"]);
                                    /*                              var_dump($d1->format('d/m/Y'));
                              var_dump($d2->format('d/m/Y')); */
                                    $fechaInicial = $d1->format('d-m-Y');
                                    $fechaFinal = $d2->format('d-m-Y');
                                   /*  var_dump($fechaInicial, $fechaFinal); */
                                }
                            } else {

                                $fechaInicial = null;
                                $fechaFinal = null;
                            }

                            $usuarios = ControladorRegistro::ctrRangoFechasRegistro($fechaInicial, $fechaFinal);

                            foreach ($usuarios as $key => $value) {

                                echo ' <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td class="text-center"><button class="btn btn-primary btn-xm">' . $value["TipoDocF"] . '</button></td>
                                            <td><button class="btn btn-warning btn-xm">' . $value["num_documento"] . '</button></td>
                                            <td>' . $value["nombre"] . '</td>
                                            <td>' . $value["cargo"] . '</td>
                                            <td>' . $value["ent_funcionario"] . '</td>
                                            <td>' . $value["motivo"] . '</td>
                                            <td>' . $value["servidor_publico"] . '</td>
                                            <td>' . $value["area_oficina_sp"] . '</td>
                                            <td>' . $value["cargo"] . '</td>
                                            <td>' . $value["fecha_ingreso"] . '</td>
                                            <td>' . $value["hora_ingreso"] . '</td>
                                            <td>' . $value["fecha_salida"] . '</td>
                                            <td>' . $value["hora_salida"] . '</td>
                                            <td>' . $value["usuario"] . '</td>


                                        </tr>';
                            }

                            ?>
                        </tbody>

                    </table>

                </div>

            </div>

        </section>
    </div>
</div>