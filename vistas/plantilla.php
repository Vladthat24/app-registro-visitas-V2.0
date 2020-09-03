<?php

@session_start();

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Plataforma Tecnológica</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">

  <!--=====================================
       PLUGINS DE CSS
       ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

  <!-- DatePicker-->
  <link rel="stylesheet" href="vistas/bower_components/datepicker/jquery-ui.css">

  <!-- DateTimePicker-->
  <link rel="stylesheet" href="vistas/bower_components/datetimepicker/bootstrap-datetimepicker.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">


  <!-- SELECT 2 -->
  <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.css">
  <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">


  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">


  <link href="vistas/bower_components/exportexcel/tableexport.css" rel="stylesheet" type="text/css">


  <script src="vistas/bower_components/exportexcel/FileSaver.min.js"></script>
  <script src="vistas/bower_components/exportexcel/Blob.min.js"></script>
  <script src="vistas/bower_components/exportexcel/xls.core.min.js"></script>
  <script src="vistas/bower_components/exportexcel/tableexport.js"></script>











  <!--=====================================
        PLUGINS DE JAVASCRIPT
        ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- datepicker-->
  <script src="vistas/bower_components/datepicker/jquery-ui.js"></script>

  <!-- dateTimePicker-->
  <script src="vistas/bower_components/datetimepicker/bootstrap-datetimepicker.js"></script>

  <!-- select 2-->
  <script src="vistas/bower_components/select2/dist/js/select2.js"></script>

</head>

<!--=====================================
    CUERPO DOCUMENTO
    ======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

    @session_start();

    echo '<div class="wrapper">';

    /* =============================================
              CABEZOTE
              ============================================= */

    include "modulos/cabezote.php";

    /* =============================================
              MENU
              ============================================= */

    include "modulos/menu.php";

    /* =============================================
              CONTENIDO
              ============================================= */

    if (isset($_GET["ruta"])) {

      if (
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "funcionario" ||
        $_GET["ruta"] == "entidad" ||
        $_GET["ruta"] == "documento" ||
        $_GET["ruta"] == "perfil" ||
        $_GET["ruta"] == "soporte" ||
        $_GET["ruta"] == "estado" ||
        $_GET["ruta"] == "registro" ||
        $_GET["ruta"] == "reporteticket" ||
        $_GET["ruta"] == "clientes" ||
        $_GET["ruta"] == "ventas" ||
        $_GET["ruta"] == "crear-venta" ||
        $_GET["ruta"] == "editar-venta" ||
        $_GET["ruta"] == "reportes" ||
        $_GET["ruta"] == "distrito" ||
        $_GET["ruta"] == "salir"
      ) {

        include "modulos/" . $_GET["ruta"] . ".php";
      } else {

        include "modulos/404.php";
      }
    } else {

      include "modulos/inicio.php";
    }


    /* =============================================
              FOOTER
    ============================================= */

    include "modulos/footer.php";

    echo '</div>';
  } else if (isset($_GET["ruta"])) {

    if ($_GET["ruta"] == "login" || $_GET["ruta"] == "consulta") {

      include "modulos/" . $_GET["ruta"] . ".php";
    }
  } else {

    include "modulos/consulta.php";
  }






  ?>


  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/usuarios.js"></script>
  <script src="vistas/js/categorias.js"></script>
  <script src="vistas/js/entidad.js"></script>
  <script src="vistas/js/documento.js"></script>
  <script src="vistas/js/registro.js"></script>
  <script src="vistas/js/clientes.js"></script>
  <script src="vistas/js/ventas.js"></script>
  <script src="vistas/js/consultaReniec.js"></script>
  <script src="vistas/js/soporte.js"></script>
  <script src="vistas/js/estado.js"></script>
  <script src="vistas/js/distrito.js"></script>
  <script src="vistas/js/perfil.js"></script>
  <script src="vistas/js/funcionario.js"></script>
</body>

</html>