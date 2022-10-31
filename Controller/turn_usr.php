<?php
    error_reporting(E_ERROR);
    session_start();
    include("../Model/Conexion.php");
    $doc = $_POST['id'];
    $data = array();
    //$cont = $pdo ->prepare("SELECT e.nombre FROM empleado as e INNER JOIN documento_instruccion as di ON di.id_empleado = e.id_empleado WHERE id_documento = '$doc'");
    $cont = $pdo->prepare("SELECT e.nombre,di.direccion,sp.codigo,di.id_documento FROM empleado as e INNER JOIN documento_instruccion as di ON di.id_empleado = e.id_empleado INNER JOIN equipo_registro as sp ON sp.id_direccion = di.direccion WHERE id_documento = '$doc'");
    $cont ->execute();
    $data_list = $cont->fetchAll(PDO::FETCH_ASSOC);
    foreach($data_list as $get)
    {
        $usr = $get['nombre'];
        $code = $get['codigo'];
        $id = $get['id_documento'];
    }
    //$rows = $cont->rowCount();
    //$data[0] = $rows;
   
    $data = array("nombre" => $usr, "codigo" => $code, "id"=>$id);
    echo json_encode($data);
?>
