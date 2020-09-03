
<div class="content">
    <div class="row">

        <h1 style="color: white; text-align: center" >Plataforma Tecnológica - Registro de Visitas V. 1.0.0</h1>
        <h2 style="color: white;text-align: center"><a href="https://www.dirislimasur.gob.pe/">Equipo de Trabajo Funcional Tecnologías de la Información - DIRIS LIMA SUR</a></h2>
        
        <div class="col-lg-12 col-md-12 col-xs-12">

            <div class="login-box ">

                <div class="login-logo">

                </div>

                <div class="login-box-body">
                    
                    <img src="vistas/img/plantilla/logo-dirisls-bloque.png" class="img-responsive">

                     <p class="login-box-msg" style="font-size: 25px;">Ingresar al sistema</p>

                    <form method="post">

                        <div class="form-group has-feedback">

                            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div>

                        <div class="form-group has-feedback">

                             <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                        </div>

                        <div class="row">

                            <div class="col-xs-4">

                                <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>

                            </div>

                        </div>

                        <?php
                        $login = new ControladorUsuarios();
                        $login->ctrIngresoUsuario();
                        ?>

                    </form>

                </div>

            </div>
        </div>
        <div class="col-lg12">
            
        </div>
    </div>
</div>