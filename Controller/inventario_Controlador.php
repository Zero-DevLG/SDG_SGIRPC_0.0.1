<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtarea = (isset($_POST['txtarea']))?$_POST['txtarea']:"";
$txtdireccion = (isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txttitular = (isset($_POST['txttitular']))?$_POST['txttitular']:"";


$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal="false";
$error=array();




    include("../Model/Conexion.php");

   

switch($accion){
    case "btnAgregar":
        
     
        
         $sentencia=$pdo->prepare("INSERT INTO catalogo_dispositivo(area,direccion,titular) VALUES (:area,:direccion,:titular)");
        
            $sentencia->bindParam(':area',$txtarea);
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':titular',$txttitular);
            
            
        
            $sentencia->execute();
            
            header('Location: ../View/inventario.php');
    
            
    break;
        
        
    case "btnModificar":
        
         $sentencia=$pdo->prepare("UPDATE catalogo_dispositivo SET 
         area=:area,
         direccion=:direccion,
         titular=:titular
        WHERE
         id_area=:id");
        
            $sentencia->bindParam(':area',$txtarea);
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':titular',$txttitular);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
        
             
          header('Location: ../View/inventario.php');
        
    break;
        
    case "btnEliminar":
         
         $sentencia=$pdo->prepare("DELETE FROM catalogo_dispositivo WHERE id_area=:id");
        
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
            header('Location: ../View/inventario.php');
        
        
        
    break;
        
        
    case "btnCancelar":
            header('Location: ../View/inventario.php');
        
    break;
        
    case "seleccionar":
        
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal="true";
        
         $sentencia=$pdo->prepare("SELECT foto FROM catalogo_dispositivo WHERE id_catalogo=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
            $txtfoto=$empleado['foto'];
        
        
    break;
        
        
        
}

    $sentencia0 = $pdo->prepare("SELECT * FROM catalogo_dispositivo");
    $sentencia0->execute();

    $listaEmpleados=$sentencia0->fetchAll(PDO::FETCH_ASSOC);

    $sentencia11 = $pdo->prepare("SELECT * FROM equipo_registro");
    $sentencia11->execute();
    $listaDireccion=$sentencia11->fetchAll(PDO::FETCH_ASSOC);

    














?>

