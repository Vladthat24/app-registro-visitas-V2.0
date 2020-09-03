<?php
//fetch.php
$serverName = "ETF_DESARROLLO"; //serverName\instanceName
$connectionInfo = array("Database" => "dirislim_visita", "UID" => "sa", "PWD" => '1597531994', "CharacterSet" => "UTF-8");
$connect = sqlsrv_connect($serverName, $connectionInfo);

$d1 = DateTime::createFromFormat('Y-m-d', $_POST["start_date"]);
$d2 = DateTime::createFromFormat('Y-m-d', $_POST["end_date"]);
/* $connect = sqlsrv_connect("localhost", "root", "", "testing"); */
$columns = array('id', 'idfuncionario', 'motivo', 'servidor_publico', 'area_oficina_sp', 'cargo', 'fecha_ingreso', 'hora_ingreso', 'fecha_salida', 'hora_salida', 'usuario');

$query = "SELECT id,
idfuncionario,
motivo,
servidor_publico,
area_oficina_sp,
cargo,
FORMAT(CONVERT(date,Tap_RegistroVisita.fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
CONVERT(varchar(25), CAST(Tap_RegistroVisita.hora_ingreso as TIME),100) as hora_ingreso,
FORMAT(Tap_RegistroVisita.fecha_salida,'dd/MM/yyyy') as fecha_salida,
hora_salida,
usuario FROM Tap_RegistroVisita WHERE ";


if ($_POST["is_date_search"] == "yes") {
    if ($d1 !== false && $d2 !== false) {

   /*      var_dump($_POST["start_date"]);
        var_dump($_POST["end_date"]); */

        $fechaInicial = $d1->format('d/m/Y');
        $fechaFinal = $d2->format('d/m/Y');
        $query .= " FORMAT(CONVERT(date,fecha_ingreso),'dd/MM/yyyy') BETWEEN '" . $fechaInicial . "' AND '" . $fechaFinal . "' AND ";
    }
}

if (isset($_POST["search"]["value"])) {
    $query .= "
  (id LIKE '%" . $_POST["search"]["value"] . "%' 
  OR motivo LIKE '%" . $_POST["search"]["value"] . "%' 
  OR servidor_publico LIKE '%" . $_POST["search"]["value"] . "%'
  OR area_oficina_sp LIKE '%" . $_POST["search"]["value"] . "%'
  OR usuario LIKE '%" . $_POST["search"]["value"] . "%')
 ";
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} else {
    $query .= 'ORDER BY id DESC ';
}


/* $query1 = ''; */

/* if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
} */
var_dump($query);

$number_filter_row = sqlsrv_num_rows(sqlsrv_query($connect, $query));
echo "-------------";
var_dump($number_filter_row);
$result = sqlsrv_query($connect, $query);
echo "-------------";
var_dump($result);
$data = array();

while ($row = sqlsrv_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = $row["id"];
    $sub_array[] = $row["idfuncionario"];
    $sub_array[] = $row["motivo"];
    $sub_array[] = $row["servidor_publico"];
    $sub_array[] = $row["area_oficina_sp"];
    $sub_array[] = $row["cargo"];
    $sub_array[] = $row["fecha_ingreso"];
    $sub_array[] = $row["hora_ingreso"];
    $sub_array[] = $row["fecha_salida"];
    $sub_array[] = $row["hora_salida"];
    $sub_array[] = $row["usuario"];
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT id,
    idfuncionario,
    motivo,
    servidor_publico,
    area_oficina_sp,
    cargo,
    FORMAT(CONVERT(date,fecha_ingreso),'dd/MM/yyyy') as fecha_ingreso,
    CONVERT(varchar(25), CAST(hora_ingreso as TIME),100) as hora_ingreso,
    FORMAT(fecha_salida,'dd/MM/yyyy') as fecha_salida,
    hora_salida,
    usuario FROM Tap_RegistroVisita";
    $result = sqlsrv_query($connect, $query);
    return sqlsrv_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "data"    => $data
);

echo json_encode($output);
