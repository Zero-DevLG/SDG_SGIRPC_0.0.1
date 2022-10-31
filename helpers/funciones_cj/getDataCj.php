<?php
    require('../../Model/Conexion.php');
    session_start();
    $id_dir_general = $_SESSION["id_direccion"];
    $dep = $_SESSION['id_dir_s'];
    $id_cj = $_SESSION['id_jc'];

    $sql = $pdo->prepare("SELECT de.id_documento,idp.id_instruccion_p,de.n_oficio,de.folio,de.fecha_oficio,de.estatus,id.folio_dir,di.asunto,idp.instruccion,id.prioridad,id.fecha_limite,p.detalle FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento INNER JOIN instrucciones_direcciones as id ON id.id_documento = de.id_documento INNER JOIN instruccion_direccion_p as idp ON idp.id_documento = de.id_documento INNER JOIN prioridad as p ON p.id_estatus_p = id.prioridad WHERE idp.id_jc = '$id_cj' AND id.id_direccion = '$dep'  AND idp.estatus = 0");
    $sql->execute();
    $datos = $sql->fetchAll(PDO::FETCH_ASSOC);

    $i = 0;
$tabla = "";
foreach ($datos as $mostrar) {
    $tabla .= '{"id_documento":"' . $mostrar['id_documento'] . '","oficio":"' . $mostrar['n_oficio'] . '","folio":"' . $mostrar['folio'] . '","folio_dir":"' . $mostrar['folio_dir'] . '","asunto":"' .  $mostrar['asunto'] . '","fecha_oficio":"' . $mostrar['fecha_oficio'] . '","fecha_limite":"' . $mostrar['fecha_limite'] . '","instruccion":"' . $mostrar['instruccion'] . '","prioridad":"' . $mostrar['detalle']  . '","prioridad_est":"' . $mostrar['prioridad']  . '","estatus":"' . $mostrar['estatus']  . '"},';
    $i++;
}
$tabla = substr($tabla, 0, strlen($tabla) - 1);

echo '{"data":[' . $tabla . ']}';
?>


