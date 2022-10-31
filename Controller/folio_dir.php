<?php
require('../Model/Conexion.php');
require('../Model/sessiones.php');

$id_direccion = $_POST['direccion'];
$id_documento = $_POST['id_documento'];
$date = date('Y-m-d,H:i:s');
$id_usr = $_SESSION['id_empleado'];

$if_temp = $pdo->prepare("SELECT folio FROM temp_folio WHERE id_direccion = '$id_direccion'");
$if_temp->execute();
$rows = $if_temp->rowCount();
$contador_tem = $if_temp->fetchColumn();
if($rows > 0)
{
    $select_max = $pdo->prepare("SELECT MAX(folio) FROM temp_folio WHERE id_direccion = '$id_direccion'");
    $select_max -> execute();
    $max = $select_max->fetchColumn();
    $contador = $max + 1;
    $contador_f = str_pad($contador,4,'0',STR_PAD_LEFT);

    $sql1 = $pdo->prepare("SELECT id_direccion,siglas,contador FROM control_sp WHERE id_direccion = '$id_direccion'");
    $sql1->execute();
    $lista = $sql1->fetchAll(PDO::FETCH_ASSOC);
    

    foreach ($lista as $mostrar) {
        $siglas = $mostrar['siglas'];
      
    }
      
    if($id_direccion == 1)
    {
        $folio = $contador_f . "-2022";
    }else{
        $folio = $siglas . "-" . $contador_f . "-2022";
    }

}else
{
    $sql1 = $pdo->prepare("SELECT id_direccion,siglas,contador FROM control_sp WHERE id_direccion = '$id_direccion'");
$sql1->execute();
$lista = $sql1->fetchAll(PDO::FETCH_ASSOC);



//$array = array();



foreach ($lista as $mostrar) {
    $siglas = $mostrar['siglas'];
    $contador = $mostrar['contador'];
}

if($id_direccion == 1)
{
    $folio = $contador . "-2022";
}else{
    $folio = $siglas . "-" . $contador . "-2022";
}

}

//$set_temp = $pdo->prepare("INSERT INTO temp_folio(id_document,folio,id_usr,date_temp,id_direccion) VALUES('$id_documento','$contador','$id_usr','$date','$id_direccion')");
//$set_temp->execute();



echo json_encode($folio);