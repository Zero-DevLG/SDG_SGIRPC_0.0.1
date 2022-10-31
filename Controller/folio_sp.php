<?php
require('../Model/Conexion.php');
require('../Model/sessiones.php');

$tipo_c = $_POST['tipo_c'];

if($tipo_c == 200)
{
    $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=1");
    $search_free->execute();
    $rows = $search_free->rowCount();
}
if($tipo_c == 20)
{
    $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=2");
    $search_free->execute();
    $rows = $search_free->rowCount();
}

if($tipo_c == 52){
    $search_free = $pdo->prepare("SELECT num FROM free_num WHERE cat=3");
    $search_free->execute();
    $rows = $search_free->rowCount();
}

if($rows != 0){
    $data = $search_free->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $get)
    {
        $contador = $get['num'];
    }
}else{
    $sql1 = $pdo->prepare("SELECT siglas,contador FROM control_sp WHERE id_direccion = $tipo_c");
$sql1->execute();
$lista = $sql1->fetchAll(PDO::FETCH_ASSOC);

$array = array();

foreach ($lista as $mostrar) {
    $siglas = $mostrar['siglas'];
    $contador = $mostrar['contador'];
}

}

$folio = $contador . "-2022";

echo json_encode($folio);