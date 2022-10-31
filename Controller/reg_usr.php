<?php
    error_reporting(E_ERROR);
    session_start();
    include("../Model/Conexion.php");
    $doc = $_POST['data'];
    //$data = array();
    $cont = $pdo ->prepare("SELECT de.id_documento, e.nombre,de.estatus from documentos_externos as de INNER JOIN empleado as e ON e.id_empleado = de.id_empleado_r WHERE de.id_documento = '$doc'");
    $cont ->execute();
    $data_list = $cont->fetchAll(PDO::FETCH_ASSOC);
    foreach($data_list as $get){
        $usr = $get['nombre'];
        $doc = $get['id_documento']; 
        $estatus = $get['estatus'];
    }
    $rows = $cont->rowCount();
    //$data[0] = $rows;
   
    $data = array("nombre" => $usr, "id_doc" => $doc, "estatus" => $estatus);
    echo JSON_encode($data);
?>

