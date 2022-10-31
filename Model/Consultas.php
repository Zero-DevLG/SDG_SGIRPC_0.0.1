<?php
error_reporting(0);
date_default_timezone_set("America/Mexico_City");
require('Conexion.php');
require('sessiones.php');
$Fecha = date('Y-m-d');
$dir = "";
$dir_local = $_SESSION["id_direccion"];
$consulta_dir = $pdo->prepare("SELECT * FROM control_sp WHERE 1 AND id_direccion NOT IN(200,20,52)");
$consulta_dir->execute();
$lista_dir = $consulta_dir->fetchAll(PDO::FETCH_ASSOC);

$consulta_ins = $pdo->prepare("SELECT * FROM instrucciones WHERE 1 ");
$consulta_ins->execute();
$lista_ins = $consulta_ins->fetchAll(PDO::FETCH_ASSOC);

$consulta_tip = $pdo->prepare("SELECT * FROM tipo_documentos WHERE 1");
$consulta_tip->execute();
$lista_tipo = $consulta_tip->fetchAll(PDO::FETCH_ASSOC);

$consulta_doc = $pdo->prepare("SELECT d.id_documento,d.n_folio,d.remitente,d.asunto,d.tipo_documento,di.direccion,di.area,di.instruccion,di.destinatario,di.cargo_d,di.fecha_limite,di.prioridad FROM documentos as d INNER JOIN documento_instruccion as di ON d.id_documento = di.id_documento WHERE di.direccion = '" . $dir_local . "' AND (area = 6)");
$consulta_doc->execute();
$lista_doc = $consulta_doc->fetchAll(PDO::FETCH_ASSOC);

$consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,de.tipo_documento,de.fecha_oficio,de.fecha_recibido,de.id_empleado_r,de.id_organismo,de.remitente,de.remitente,de.cargo_r,de.asunto,e.detalles FROM documentos_externos as de INNER JOIN estatus as e ON de.estatus = e.id_estatus
 WHERE de.estatus=1");
$consulta_doc_ex->execute();
$lista_doc_ext = $consulta_doc_ex->fetchAll(PDO::FETCH_ASSOC);

$consulta_doc_ex_di = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,de.tipo_documento,de.fecha_oficio,de.fecha_recibido,di.fecha_limite,de.id_empleado_r,de.id_organismo,de.remitente,de.remitente,de.cargo_r,de.asunto,e.detalles FROM documentos_externos as de INNER JOIN estatus as e ON de.estatus = e.id_estatus INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE de.estatus=2");
$consulta_doc_ex_di->execute();
$lista_doc_ext_di = $consulta_doc_ex_di->fetchAll(PDO::FETCH_ASSOC);




$consulta_doc_ex_as = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,de.tipo_documento,de.fecha_oficio,de.fecha_recibido,de.id_empleado_r,de.id_organismo,de.remitente,de.remitente,de.cargo_r,de.asunto,e.detalles FROM documentos_externos as de INNER JOIN estatus as e ON de.estatus = e.id_estatus
 WHERE de.estatus=2");
$consulta_doc_ex_as->execute();
$lista_doc_ext_as = $consulta_doc_ex_as->fetchAll(PDO::FETCH_ASSOC);

$consulta_doc_ex_bitacora = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,de.tipo_documento,de.fecha_oficio,de.fecha_recibido,de.id_empleado_r,de.id_organismo,de.remitente,de.remitente,de.cargo_r,de.asunto,e.detalles FROM documentos_externos as de INNER JOIN estatus as e ON de.estatus = e.id_estatus
 WHERE de.estatus=2 AND fecha_registro = $Fecha");
$consulta_doc_ex_bitacora->execute();
$lista_doc_ext_bitacora = $consulta_doc_ex_bitacora->fetchAll(PDO::FETCH_ASSOC);

$consulta_organismo = $pdo->prepare("SELECT * FROM organismo");
$consulta_organismo->execute();
$lista_organismo = $consulta_organismo->fetchAll(PDO::FETCH_ASSOC);

$consulta_colaboradores = $pdo->prepare("SELECT * FROM empleado WHERE id_direccion = '$dir_local'");
$consulta_colaboradores->execute();
$lista_colaboradores = $consulta_colaboradores->fetchAll(PDO::FETCH_ASSOC);

$consulta_direccion_sp = $pdo->prepare("SELECT * FROM control_sp WHERE id_direccion NOT IN(51,52)");
$consulta_direccion_sp->execute();
$lista_sp = $consulta_direccion_sp->fetchAll(PDO::FETCH_ASSOC);

$consulta_modulo = $pdo->prepare("SELECT * FROM modulo");
$consulta_modulo->execute();
$lista_modulo = $consulta_modulo->fetchAll(PDO::FETCH_ASSOC);

$consulta_op_today = $pdo->prepare("SELECT * FROM documentos_externos WHERE fecha_registro ='$Fecha'");
$consulta_op_today->execute();
$lista_op_today = $consulta_op_today->fetchAll(PDO::FETCH_ASSOC);

$contadores_sp = $pdo->prepare("SELECT * FROM control_sp");
$contadores_sp->execute();
$lista_contadores = $contadores_sp->fetchAll(PDO::FETCH_ASSOC);