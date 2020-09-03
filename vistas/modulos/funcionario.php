<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar Funcionario

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar Funcionario</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFuncionario">

                    Agregar Funcionario

                </button>

            </div>


            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Acciones</th>
                            <th>Tipo Documento</th>
                            <th>N° Documento</th>
                            <th>Nombre</th>
                            <th>Entidad</th>
                            <th>Cargo</th>
                            <th>Fecha</th>
                            

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $funcionario = ControladorFuncionario::ctrMostrarFuncionario($item, $valor);

                        foreach ($funcionario as $key => $value) {

                            echo ' <tr>                            
                            


                              <td>' . ($key + 1) . '</td>                       
                                <td>

                                <div class="btn-group">
                                    
                                    <button class="btn btn-warning btnEditarFuncionario" idFuncionario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarFuncionario"><i class="fa fa-pencil"></i></button>
            
                                    <button class="btn btn-danger btnEliminarFuncionario" idFuncionario="' . $value["id"] . '"><i class="fa fa-times"></i></button>
            
                                </div>  
            
                                </td>
                              <td>' . $value["tipo_documento"] . '</td>
                              <td>' . $value["num_documento"] . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["entidad"] . '</td>
                              <td>' . $value["cargo"] . '</td>
                              <td>' . $value["fecha_registro"] . '</td>
                              



                            </tr>';
                        }

                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!--=====================================
MODAL AGREGAR FUNCIONARIO
======================================-->

<div id="modalAgregarFuncionario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar Funcionario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA SELECCIONAR DOCUMENTO DEL REGISTRO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="nuevTipoDocumento" name="nuevTipoDocumento" required>

                                    <option value="">Tipo de Documento</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                    foreach ($documento as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["tipo_documento"] . '</option>';
                                    }
                                    ?>

                                </select>


                            </div>

                        </div>

                        <!-- ENTRADA PARA NUMERO DE DOCUMENTO (DNI) -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx dni validardni" maxlength="8" id="dni" name="dni" placeholder="Documento de Identidad" required>


                                <span class="input-group-addon">
                                    <button type="button" id="consultar" class="btn btn-primary btn-xs consultar">
                                        Consultar
                                    </button>
                                </span>

                            </div>

                        </div>
                        <!-- ENTRADA PARA EL NOMBRE Y APELLIDO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx nuevoNombre" id="nuevNombre" name="nuevNombre" placeholder="Nombres y Apellidos" required>

                            </div>


                        </div>

                        <!-- ENTRADA PARA SELECCIONAR ENTIDAD-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" id="nuevEntidad" name="nuevEntidad" required>

                                    <option value="">Entidad</option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $entidad = ControladorEntidad::ctrMostrarEntidad($item, $valor);

                                    foreach ($entidad as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["entidad"] . '</option>';
                                    }
                                    ?>

                                </select>


                            </div>

                        </div>

                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" name="nuevCargo" placeholder="Cargo" required>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar usuario</button>

                </div>

                <?php
                $crearFuncionario = new ControladorFuncionario();
                $crearFuncionario->ctrCrearFuncionario();
                ?>

            </form>

        </div>

    </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarFuncionario" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar Funcionario</h4>

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                    <input type="hidden"  name="idFuncionario" id="idFuncionario" required>

                        <!-- ENTRADA PARA SELECCIONAR DOCUMENTO DEL REGISTRO-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <select class="form-control input-lx" name="editarTipoDocumento" required>

                                    <option id="editarTipoDocumento"></option>

                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $documento = ControladorDocumento::ctrMostrarDocumento($item, $valor);

                                    foreach ($documento as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["tipo_documento"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>
                        <!-- ENTRADA PARA DNI -->

                        <div class="form-group">

                            <div class="input-group ">

                                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                <input type="text" class="form-control input-lx" maxlength="8" id="editarDni" name="editarDni" readonly>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lx" id="editarNombre" name="editarNombre" readonly>

                            </div>

                        </div>


                        <!-- ENTRADA PARA SELECCIONAR SU ENTIDAD-->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control input-lx" name="editarEntidad">

                                    <option id="editarEntidad"></option>
                                    <?php
                                    $item = null;
                                    $valor = null;

                                    $perfil = ControladorEntidad::ctrMostrarEntidad($item, $valor);

                                    foreach ($perfil as $key => $value) {

                                        echo '<option value="' . $value["id"] . '">' . $value["entidad"] . '</option>';
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>






                        <!-- ENTRADA PARA CARGO -->
                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>

                                <input type="text" class="form-control input-lx" id="editarCargo" name="editarCargo" required>

                            </div>

                        </div>







                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar Funcionario</button>

                </div>

                <?php
                $editarFuncionario = new ControladorFuncionario();
                $editarFuncionario->ctrEditarFuncionario();
                ?>

            </form>

        </div>

    </div>

</div>

<?php
$borrarFuncionario = new ControladorFuncionario();
$borrarFuncionario->ctrBorrarFuncionario();
?>