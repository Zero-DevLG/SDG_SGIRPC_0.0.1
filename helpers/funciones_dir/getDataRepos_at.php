<?php
    require('../../Model/Conexion.php');
    session_start();
    $id_dir_general = $_SESSION["id_direccion"];
    
    // Variable POST
    
    $year = $_POST['year'];
    
   $date1 = $year . "-12-31";
   $date2 = $year . "-01-01";
    
    $consulta = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,rep.folio_respuesta,ar.url,ar.a_nombre FROM documentos_externos_2021 as de INNER JOIN repos_res as rep ON rep.id_documento = de.id_documento INNER JOIN archivos_repos as ar ON ar.id_documento = de.id_documento WHERE rep.id_direccion_gen = '$id_dir_general' AND de.estatus = 2 AND de.fecha_registro BETWEEN '$date2' AND '$date1'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    
    /*
        $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
        $prueba->execute();
        $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
        */
    //Se guarda en un array dinamico 
    $i = 0;
    $tabla = "";
    foreach ($datos as $mostrar) {
        $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","folio":"' . $mostrar['folio'] . '","oficio":"' . $mostrar['n_oficio'] . '","folio_resp":"' .  $mostrar['folio_respuesta']  . '","file":"' . "<a href='../../../repositorio_sgirpc/repos_past/" .   $mostrar['a_nombre']   . "' download='".  $mostrar['a_nombre']  . "'>". $mostrar['a_nombre'] ."</a>"  . '"},';
        $i++;
    }
    $tabla = substr($tabla, 0, strlen($tabla) - 1);
    
    echo '{"data":[' . $tabla . ']}';




?>