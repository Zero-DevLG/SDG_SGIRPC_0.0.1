<?php
require('../Model/Conexion.php');
$id = $_POST['id_documento'];


try{
    

    $search_doc = $pdo->prepare("SELECT id_documento,num FROM op_control WHERE id_documento = '$id'");
$search_doc->execute();
$rows1 = $search_doc->rowCount();


$search_doc2 = $pdo->prepare("SELECT id_documento,num FROM op_control_t WHERE id_documento = '$id'");
$search_doc2->execute();
$rows2 = $search_doc2->rowCount();

$search_doc3 = $pdo->prepare("SELECT id_documento,num FROM op_control_ac WHERE id_documento = '$id'");
$search_doc3->execute();
$rows3 = $search_doc3->rowCount();

$delete_doc = $pdo->prepare("DELETE FROM documentos_externos WHERE id_documento = '$id'");
$delete_doc->execute();


if($rows1 != 0)
{
    $data = $search_doc->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $get){
        $num = $get['num'];   
    }
    $insert_free = $pdo->prepare("INSERT INTO free_num(num,cat) VALUES('$num',1)");
    $insert_free->execute();
    $delete_num = $pdo->prepare("DELETE FROM op_control WHERE id_documento = '$id'");
    $delete_num->execute();
    $get_url = $pdo->prepare("SELECT url FROM archivos WHERE id_documento = '$id'");
    $get_url->execute();
    $url_file = $get_url->fetchColumn();
    unlink($url_file);
    $delete_archivo = $pdo->prepare("DELETE FROM archivos WHERE id_documento = '$id'");
    $delete_archivo->execute();

}else if($rows2 != 0)
{
    $data = $search_doc2->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $get){
        $num = $get['num'];
        $insert_free = $pdo->prepare("INSERT INTO free_num(num,cat) VALUES('$num',2)");
        $insert_free->execute();
        $delete_num = $pdo->prepare("DELETE FROM op_control_t WHERE id_documento = '$id'");
        $delete_num->execute();
        $get_url = $pdo->prepare("SELECT url FROM archivos WHERE id_documento = '$id'");
        $get_url->execute();
        $url_file = $get_url->fetchColumn();
        unlink($url_file);
        $delete_archivo = $pdo->prepare("DELETE FROM archivos WHERE id_documento = '$id'");
        $delete_archivo->execute();

    
    }
}
if($rows3 != 0){
    $data = $search_doc3->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $get){
        $num = $get['num'];
        $insert_free = $pdo->prepare("INSERT INTO free_num(num,cat) VALUES('$num',3)");
        $insert_free->execute();
        $delete_num = $pdo->prepare("DELETE FROM op_control_ac WHERE id_documento = '$id'");
        $delete_num->execute();
        $get_url = $pdo->prepare("SELECT url FROM archivos WHERE id_documento = '$id'");
        $get_url->execute();
        $url_file = $get_url->fetchColumn();
        unlink($url_file);
        $delete_archivo = $pdo->prepare("DELETE FROM archivos WHERE id_documento = '$id'");
        $delete_archivo->execute();
    }
}

}catch (Exception $e) {
die('Error: ' . $e->getMessage());
}



?>