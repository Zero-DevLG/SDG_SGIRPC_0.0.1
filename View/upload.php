<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}

#$direccion_o = $_SESSION['direccion'];


include("../Model/Conexion.php");



$Fecha = date('Y-m-d');




//$txtfolio = (isset($_POST['txtfolio'])) ? $_POST['txtfolio'] : "";
$txtfecha_o = (isset($_POST['txtfecha_o'])) ? $_POST['txtfecha_o'] : "";
$txtremitente = (isset($_POST['txtremitente'])) ? $_POST['txtremitente'] : "";
$txtcargo_r = (isset($_POST['txtcargo_r'])) ? $_POST['txtcargo_r'] : "";
$txtasunto = (isset($_POST['txtasunto'])) ? $_POST['txtasunto'] : "";
$txttipo_documento = (isset($_POST['txttipodocumento'])) ? $_POST['txttipodocumento'] : "";

//$txtasunto = "Prueba";

$dir_local = $_SESSION["id_direccion"];
$consulta_oDir = $pdo->prepare("SELECT * FROM contador WHERE id_dir='" . $dir_local . "' AND tipo='" . $txttipo_documento . "'");
$consulta_oDir->execute();
$datos_locales_dir = $consulta_oDir->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos_locales_dir as $mostrar) {
    $cont = $mostrar['conteo'];
}

//Construir Folio

switch ($dir_local) {
    case 15:
        $fol = "DEAF/" . $cont . "/2020";
        break;
    case 9:
        $fol = "DGR/" . $cont . "/2020";
        break;
    case 10:
        $fol = "DGTO/" . $cont . "/2020";
        break;
    case 11:
        $fol = "SP/" . $cont . "/2020";
        break;
    case 12:
        $fol = "DER/" . $cont . "/2020";
        break;
    case 13:
        $fol = "DGAR/" . $cont . "/2020";
        break;
    case 14:
        $fol = "DAT/" . $cont . "/2020";
        break;
    case 16:
        $fol = "DGVCD/" . $cont . "/2020";
        break;
}

$bloqueo_1 = $pdo->prepare("LOCK TABLES documentos WRITE");
$bloqueo_1->execute();
$txtfolio = $fol;
$sentencia = $pdo->prepare("INSERT INTO documentos(n_folio,fecha_registro,fecha_oficio,remitente,cargo_r,asunto,tipo_documento) VALUES (:n_folio,:fecha_registro,:fecha_oficio,:remitente,:cargo_r,:asunto,:tipo_documento)");
$sentencia->bindParam(':n_folio', $txtfolio);
$sentencia->bindParam(':fecha_registro', $Fecha);
$sentencia->bindParam(':fecha_oficio', $txtfecha_o);
$sentencia->bindParam(':remitente', $txtremitente);
$sentencia->bindParam(':cargo_r', $txtcargo_r);
$sentencia->bindParam(':asunto', $txtasunto);
$sentencia->bindParam(':tipo_documento', $txttipo_documento);
$sentencia->execute();
$desbloqueo_1 = $pdo->prepare("UNLOCK TABLES");
$desbloqueo_1->execute();

$id_ciclo = $pdo->prepare("SELECT MAX(id_documento) FROM documentos");
$id_ciclo->execute();
$ciclo = $id_ciclo->fetchall(PDO::FETCH_BOTH);
foreach ($ciclo as $mostrar) {
    $id_max = $mostrar[0];
}
$mDate = new DateTime();
$hora = $mDate->format("H:i:s");
echo $hora;
$usuario = $_SESSION['usuario'];
$accion = "Registro de documento";
$id_empleado = $_SESSION['id_empleado'];
$id_dir = $_SESSION['id_direccion'];

$sql1 = "INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)";
$consulta_logIns = $pdo->prepare("INSERT INTO logs(usuario,id_usr,id_direccion,accion,query,id_documento,fecha_accion,hora_accion) VALUES(:usuario,:id_usr,:id_direccion,:accion,:query,:id_documento,:fecha_accion,:hora_accion)");
$consulta_logIns->bindParam(':usuario', $usuario);
$consulta_logIns->bindParam(':accion', $accion);
$consulta_logIns->bindParam(':query', $sql1);
$consulta_logIns->bindParam(':id_documento', $id_max);
$consulta_logIns->bindParam('fecha_accion', $Fecha);
$consulta_logIns->bindParam(':hora_accion', $hora);
$consulta_logIns->bindParam(':id_usr', $id_empleado);
$consulta_logIns->bindParam(':id_direccion', $id_dir);
$consulta_logIns->execute();



$cont += 1;
$bloqueo_2 = $pdo->prepare("LOCK TABLES contador WRITE");
$bloqueo_2->execute();
$sentencia_aumento = $pdo->prepare("UPDATE contador SET conteo = '" . $cont . "' WHERE id_dir='" . $dir_local . "' AND tipo='" . $txttipo_documento . "'");
$sentencia_aumento->execute();
$desbloqueo_1 = $pdo->prepare("UNLOCK TABLES");
$desbloqueo_1->execute();


$estado = 1;
$origen = $_SESSION['id_direccion'];
$ubicacion = $_SESSION['id_direccion'];
$bloqueo_3 = $pdo->prepare("LOCK TABLES documento_ciclo WRITE");
$bloqueo_3->execute();
$sentencia_ciclo = $pdo->prepare("INSERT INTO documento_ciclo(id_documento,estado,origen,ubicacion) VALUES (:id_documento,:estado,:origen,:ubicacion)");
$sentencia_ciclo->bindParam(':id_documento', $id_max);
$sentencia_ciclo->bindParam(':estado', $estado);
$sentencia_ciclo->bindParam(':origen', $origen);
$sentencia_ciclo->bindParam(':ubicacion', $ubicacion);

$sentencia_ciclo->execute();

$desbloqueo_1 = $pdo->prepare("UNLOCK TABLES");
$desbloqueo_1->execute();




$conteo_n = $_SESSION['conteo'] + 1;
$codigo = $_SESSION['codigo'];

echo $codigo;

echo $conteo_n;


$sentencia_s = $pdo->prepare("UPDATE equipo_registro set contador='$conteo_n' WHERE codigo='$codigo'");
$sentencia_s->execute();
header("location:tabla_consulta.php");