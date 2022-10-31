<?php
session_start();


$dir_local = $_SESSION["id_direccion"];
// obtiene los valores para realizar la paginacion
$limit = isset($_POST["limit"]) && intval($_POST["limit"]) > 0 ? intval($_POST["limit"])    : 10;
$offset = isset($_POST["offset"]) && intval($_POST["offset"]) >= 0    ? intval($_POST["offset"])    : 0;
// realiza la conexion
$con = new mysqli("localhost", "gerencia", "civilwars2016", "archivo2");
$con->set_charset("utf8");

// array para devolver la informacion
$json = array();
$data = array();
//consulta que deseamos realizar a la db	
$query = $con->prepare("SELECT d.id_documento,d.fecha_registro,d.folio,d.asunto,e.descripcion FROM documentos_externos as d INNER JOIN documento_ciclo as dc ON d.id_documento = dc.id_documento INNER JOIN estado as e ON e.id_estado = dc.estado WHERE dc.origen='" . $dir_local . "' LIMIT ? OFFSET ?");
$query->bind_param("ii", $limit, $offset);
$query->execute();

// vincular variables a la sentencia preparada 
$query->bind_result($id_documento, $fecha_registro, $n_folio, $asunto, $estado);

// obtener valores 
while ($query->fetch()) {
    $data_json = array();
    $data_json["id"] = $id_documento;
    $data_json["fecha"] = $fecha_registro;
    $data_json["oficio"] = $n_folio;
    $data_json["asunto"] = $asunto;
    $data_json["estado"] = $estado;
    $data[] = $data_json;
}

// obtiene la cantidad de registros
$cantidad_consulta = $con->query("select count(*) as total from documentos");
$row = $cantidad_consulta->fetch_assoc();
$cantidad['cantidad'] = $row['total'];

$json["lista"] = array_values($data);
$json["cantidad"] = array_values($cantidad);


// envia la respuesta en formato json		

header("Content-type:application/json; charset = utf-8");
echo json_encode($json);
exit();
//header('Location: ../View/tabla_consulta.php');