<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtno_serie = (isset($_POST['txtno_serie']))?$_POST['txtno_serie']:"";
$txtmodelo = (isset($_POST['txtmodelo']))?$_POST['txtmodelo']:"";
$txtdescripcion = (isset($_POST['txtdescripcion']))?$_POST['txtdescripcion']:"";
$txtstatus = (isset($_POST['txtstatus']))?$_POST['txtstatus']:"";

/*
switch($txtdescripcion){
    case "Tablet":
        $txttipo_equipo = "1";
        break;
        
        
    case "Scanner":
        $txttipo_equipo = "2";
        break;
        
    case "Impresora":
        $txttipo_equipo= "3";
        break;
}

*/

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal="false";
$error=array();




    include("../Model/Conexion.php");

   

switch($accion){
    case "btnAgregar":
        
     
        
         $sentencia=$pdo->prepare("INSERT INTO equipo_tienda(item,no_serie,modelo,imei,descripcion,sim_serial,status) VALUES (:item,:no_serie,:modelo,:imei,:descripcion,:sim_serial,:status)");
        
            $sentencia->bindParam(':item',$txtitem);
            $sentencia->bindParam(':no_serie',$txtno_serie);
            $sentencia->bindParam(':modelo',$txtmodelo);
            $sentencia->bindParam(':imei',$txtimei);
            $sentencia->bindParam(':descripcion',$txtdescripcion);
            $sentencia->bindParam(':sim_serial',$txtsim_serial);
            $sentencia->bindParam(':status',$txtstatus);
            
           /* $fecha = new DateTime();
            $nombreArchivo=($txtfoto!="")?$fecha->getTimestamp()."_".$_FILES["txtfoto"]["name"]:"default.gif";
            $tmpFoto=$_FILES["txtfoto"]["tmp_name"];
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
            }
            $sentencia->bindParam(':foto',$nombreArchivo);
            $sentencia->bindParam(':fecha_registro',$txtfecha_registro);
        */
        
            $sentencia->execute();
            
            header('Location: ../View/admin_equipos.php');
    
            
    break;
        
        
    case "btnModificar":
        
         $sentencia=$pdo->prepare("UPDATE catalogo_dispositivo SET 
         codigo_equipo=:codigo_equipo,
         tipo_equipo=:tipo_equipo,
         descripcion=:descripcion,
         modelo=:modelo,
         cantidad=:cantidad,
         activo=:activo WHERE
         id_catalogo=:id");
        
            $sentencia->bindParam(':codigo_equipo',$txtcodigo_equipo);
            $sentencia->bindParam(':tipo_equipo',$txttipo_equipo);
            $sentencia->bindParam(':descripcion',$txtdescripcion);
            $sentencia->bindParam(':modelo',$txtmodelo);
            $sentencia->bindParam(':cantidad',$txtcantidad);
            $sentencia->bindParam(':activo',$txtactivo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
        
               $fecha = new DateTime();
            $nombreArchivo=($txtfoto!="")?$fecha->getTimestamp()."_".$_FILES["txtfoto"]["name"]:"default.gif";
            $tmpFoto=$_FILES["txtfoto"]["tmp_name"];
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
                
                
            $sentencia=$pdo->prepare("SELECT foto FROM catalogo_dispositivo WHERE id_catalogo=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
        
            if(isset($empleado["foto"])){
                if(file_exists("../imagenes/".$empleado["foto"])){
                    if($empleado['foto']!="default.gif"){
                    unlink("../imagenes/".$empleado["foto"]);    
                    }
                    
                }
            }
        
                
                
                  $sentencia=$pdo->prepare("UPDATE catalogo_dispositivo SET 
          foto=:foto WHERE
         id_catalogo=:id");
            $sentencia->bindParam(':foto',$nombreArchivo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
                
            }
        
        
            
            
        
        
        
            header('Location: ../View/inventario.php');
        
    break;
        
    case "btnEliminar":
        
           
        
        
        
         $sentencia=$pdo->prepare("DELETE FROM equipo_registro WHERE id_equipo=:id");
        
           
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
            header('Location: ../View/admin_equipos.php');
        
        
        
    break;
        
        
    case "btnCancelar":
            header('Location: ../View/admin_equipos.php');
        
    break;
        
    case "seleccionar":
        
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal="true";
        
         $sentencia=$pdo->prepare("SELECT foto FROM equipo_registro WHERE id_equipo=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
            
        
        
    break;
        
        
        
}

    $sentencia0 = $pdo->prepare("SELECT * FROM equipo_registro");
    $sentencia0->execute();

    $listaEmpleados=$sentencia0->fetchAll(PDO::FETCH_ASSOC);


    














?>

