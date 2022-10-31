<?php 
session_start();
require('../Model/Conexion.php');
try{
$last = $_POST['last_doc'];
$usr = $_SESSION['id_empleado'];
$last_doc = $pdo->prepare("SELECT MAX(id_documento) FROM documentos_externos");
$last_doc->execute();
$last_doc_today = $last_doc->fetchColumn();
$info = $pdo->prepare("SELECT id_doc_last FROM ccc_notify WHERE id_usr = '$usr'");
$info ->execute();
$last = $info->fetchColumn();
$rows = $info->rowCount();
if($rows == 0){
    $set_last = $pdo->prepare("INSERT INTO ccc_notify(id_usr,id_doc_last) VALUES('$usr','$last_doc_today')");
    $set_last->execute();
}else 
{
    $set_last = $pdo->prepare("UPDATE ccc_notify SET id_doc_last = '$last_doc_today' WHERE id_usr = '$usr'");
    $set_last->execute();
}


}catch (Exception $e) {
die('Error: ' . $e->getMessage());
}
echo $last;

?>