<?php
    require('../../Model/Conexion.php');
    session_start();
    $id_dir_general = $_SESSION["id_direccion"];
    $dep = $_SESSION['id_dir_s'];

    $sql = $pdo->prepare("SELECT doc.estatus,di.asunto,id.id_instruccion,doc.id_documento,doc.n_oficio,doc.folio,doc.fecha_oficio,doc.remitente,doc.cargo_r,id.prioridad, id.fecha_limite, id.instruccion,id.prioridad,dp.detalle,id.folio_dir FROM documentos_externos as doc INNER JOIN instrucciones_direcciones as id ON id.id_documento = doc.id_documento INNER JOIN documento_prioridad as dp ON dp.id_p = id.prioridad INNER JOIN documento_instruccion as di ON di.id_documento = doc.id_documento WHERE id.id_direccion_general = '$id_dir_general' AND id.id_direccion ='$dep' AND doc.estatus = 3 AND id.estatus_ins = 0 ");
    $sql->execute();
    $datos = $sql->fetchAll(PDO::FETCH_ASSOC);

    $i = 0;
$tabla = "";
foreach ($datos as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_instruccion'] . '","folio":"' . $mostrar['folio'] . '","folio_dir":"' . $mostrar['folio_dir'] . '","oficio":"' . $mostrar['n_oficio'] . '","asunto":"' .  $mostrar['asunto'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","remitente":"' . $mostrar['remitente'] . '","estatus":"' . $mostrar['estatus'] . '","instruccion_dir":"' . $mostrar['instruccion'] . '","prioridad":"' .$mostrar['prioridad'] . '","prioridad_d":"' . $mostrar['detalle'] . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';
?>


