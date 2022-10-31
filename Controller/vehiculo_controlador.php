<?php


date_default_timezone_set("America/Mexico_City");

$Fecha = date('Y-m-d');

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtplacas = (isset($_POST['txtplacas'])) ? $_POST['txtplacas'] : "";
$txttipo = (isset($_POST['txttipo'])) ? $_POST['txttipo'] : "";
$txtmarca = (isset($_POST['txtmarca'])) ? $_POST['txtmarca'] : "";
$txtmodelo = (isset($_POST['txtmodelo'])) ? $_POST['txtmodelo'] : "";
$txtdireccion = (isset($_POST['txtdireccion'])) ? $_POST['txtdireccion'] : "";
$txtfoto = (isset($_FILES['txtfoto']["name"])) ? $_FILES['txtfoto'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

$accionAgregar = "";
$accionModificar = $accionEliminar = $accionCancelar = "disabled";
$mostrarModal = "false";
$error = array();




include("../Model/conexion_vehicular.php");


switch ($accion) {


    case "btnModificar":

        $sentencia_mod = $pdo->prepare("UPDATE vehiculo SET 
         placas=:placas,
         tipo_vehiculo=:tipo_vehiculo,
         marca=:marca,
         modelo=:modelo,
         direccion=:direccion WHERE
         id_vehiculo=:id");

        $sentencia_mod->bindParam(':placas', $txtplacas);
        $sentencia_mod->bindParam(':tipo_vehiculo', $txttipo);
        $sentencia_mod->bindParam(':marca', $txtmarca);
        $sentencia_mod->bindParam(':modelo', $txtmodelo);
        $sentencia_mod->bindParam(':direccion', $txtdireccion);
        $sentencia_mod->bindParam(':id', $txtID);
        $sentencia_mod->execute();


        $fecha = new DateTime();
        $nombreArchivo = ($txtfoto != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtfoto"]["name"] : "default.gif";
        $tmpFoto = $_FILES["txtfoto"]["tmp_name"];
        if ($tmpFoto != "") {
            move_uploaded_file($tmpFoto, "../imagenes/" . $nombreArchivo);


            $sentencia = $pdo->prepare("SELECT foto FROM vehiculo WHERE id_vehiculo=:id");
            $sentencia->bindParam(':id', $txtID);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);


            if (isset($empleado["foto"])) {
                if (file_exists("../imagenes/" . $empleado["foto"])) {
                    if ($empleado['foto'] != "default.gif") {
                        unlink("../imagenes/" . $empleado["foto"]);
                    }
                }
            }



            $sentencia_modFoto = $pdo->prepare("UPDATE vehiculo SET 
          foto=:foto WHERE
         id_vehiculo=:id");
            $sentencia_modFoto->bindParam(':foto', $nombreArchivo);
            $sentencia_modFoto->bindParam(':id', $txtID);
            $sentencia_modFoto->execute();
        }







        header('Location: ../View/registro_vehiculos.php');

        break;

    case "btnEliminar":

        $sentencia_id = $pdo->prepare("SELECT foto FROM vehiculo WHERE id_vehiculo=:id");
        $sentencia_id->bindParam(':id', $txtID);
        $sentencia_id->execute();
        $empleado = $sentencia_id->fetch(PDO::FETCH_LAZY);


        if (isset($empleado["foto"]) && ($empleado['foto'] != "default.gif")) {
            if (file_exists("../imagenes/" . $empleado["foto"])) {
                unlink("../imagenes/" . $empleado["foto"]);
            }
        }



        $sentencia_eliminar = $pdo->prepare("DELETE FROM vehiculo WHERE id_vehiculo=:id");
        $sentencia_eliminar->bindParam(':id', $txtID);
        $sentencia_eliminar->execute();

        header('Location: ../View/registro_vehiculos.php');



        break;




    case "seleccionar":

        $accionAgregar = "disabled";
        $accionModificar = $accionEliminar = $accionCancelar = "";
        $mostrarModal = "true";

        $sentencia_seleccionar = $pdo->prepare("SELECT foto FROM vehiculo WHERE id_vehiculo=:id");
        $sentencia_seleccionar->bindParam(':id', $txtID);
        $sentencia_seleccionar->execute();
        $empleado = $sentencia_seleccionar->fetch(PDO::FETCH_LAZY);
        $txtfoto = $empleado['foto'];


        break;
}





$sentencia_a = $pdo->prepare("SELECT * FROM catalogo_dispositivo");
$sentencia_a->execute();

$listaAreas = $sentencia_a->fetchAll(PDO::FETCH_ASSOC);


$sentencia_d = $pdo->prepare("SELECT * FROM direccion");
$sentencia_d->execute();

$listaDireccion = $sentencia_d->fetchAll(PDO::FETCH_ASSOC);

$sentencia0 = null;
$pdo = null;
$sentencia_a = null;
$sentencia_d = null;