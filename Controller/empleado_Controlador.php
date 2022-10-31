<?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtnombre = (isset($_POST['txtnombre']))?$_POST['txtnombre']:"";
$txtapellido = (isset($_POST['txtapellido']))?$_POST['txtapellido']:"";
$txtpuesto = (isset($_POST['txtpuesto']))?$_POST['txtpuesto']:"";
$txtedad = (isset($_POST['txtedad']))?$_POST['txtedad']:"";
$txtarea = (isset($_POST['txtarea']))?$_POST['txtarea']:"";
$txtdireccion = (isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txtactivo = (isset($_POST['txtactivo']))?$_POST['txtactivo']:"";
$txtusuario = (isset($_POST['txtusuario']))?$_POST['txtusuario']:"";
$txtpassword = (isset($_POST['txtpassword']))?$_POST['txtpassword']:"";
$txttipo_usuario = (isset($_POST['txttipo_usuario']))?$_POST['txttipo_usuario']:"";
$txtfoto = (isset($_FILES['txtfoto']["name"]))?$_FILES['txtfoto']:"";


$accion = (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal="false";
$error=array();




    include("../Model/Conexion.php");

   

switch($accion){
    case "btnAgregar":
        
            if($txtnombre==""){
                $error['nombre']="Escribe el nombre";
            }
        if(count($error)>0){
            $mostrarModal=true;
            break;
        }
        
         $sentencia=$pdo->prepare("INSERT INTO empleado(nombre,apellido,puesto,edad,activo,foto,usuario,password,tipo_usuario,area,direccion) VALUES (:nombre,:apellido,:puesto,:edad,:activo,:foto,:usuario,:password,:tipo_usuario,:area,:direccion)");
        
            $sentencia->bindParam(':nombre',$txtnombre);
            $sentencia->bindParam(':apellido',$txtapellido);
            $sentencia->bindParam(':puesto',$txtpuesto);
            $sentencia->bindParam(':edad',$txtedad);
            $sentencia->bindParam(':area',$txtarea);
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':activo',$txtactivo);
            
            $fecha = new DateTime();
            $nombreArchivo=($txtfoto!="")?$fecha->getTimestamp()."_".$_FILES["txtfoto"]["name"]:"default.gif";
            $tmpFoto=$_FILES["txtfoto"]["tmp_name"];
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
            }
            $sentencia->bindParam(':foto',$nombreArchivo);
            $sentencia->bindParam(':usuario',$txtusuario);
            $sentencia->bindParam(':password',$txtpassword);
            $sentencia->bindParam(':tipo_usuario',$txttipo_usuario);
            
        
            $sentencia->execute();
            
            header('Location: ../View/empleado.php');
    
            
    break;
        
        
    case "btnModificar":
        
         $sentencia=$pdo->prepare("UPDATE empleado SET 
         nombre=:nombre,
         apellido=:apellido,
         puesto=:puesto,
         edad=:edad,
         activo=:activo,
         usuario=:usuario,
         password=:password,
         tipo_usuario=:tipo_usuario,
         area=:area,direccion=:direccion WHERE
         id_empleado=:id");
        
            $sentencia->bindParam(':nombre',$txtnombre);
            $sentencia->bindParam(':apellido',$txtapellido);
            $sentencia->bindParam(':puesto',$txtpuesto);
            $sentencia->bindParam(':edad',$txtedad);
            $sentencia->bindParam(':area',$txtarea);
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':activo',$txtactivo);
            $sentencia->bindParam(':usuario',$txtusuario);
            $sentencia->bindParam(':password',$txtpassword);
            $sentencia->bindParam(':tipo_usuario',$txttipo_usuario);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
        
               $fecha = new DateTime();
            $nombreArchivo=($txtfoto!="")?$fecha->getTimestamp()."_".$_FILES["txtfoto"]["name"]:"default.gif";
            $tmpFoto=$_FILES["txtfoto"]["tmp_name"];
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"../imagenes/".$nombreArchivo);
                
                
            $sentencia=$pdo->prepare("SELECT foto FROM empleado WHERE id_empleado=:id");
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
        
                
                
                  $sentencia=$pdo->prepare("UPDATE empleado SET 
          foto=:foto WHERE
         id_empleado=:id");
            $sentencia->bindParam(':foto',$nombreArchivo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
                
            }
        
        
            
            
        
        
        
            header('Location: ../View/empleado.php');
        
    break;
        
    case "btnEliminar":
        
            $sentencia=$pdo->prepare("SELECT foto FROM empleado WHERE id_empleado=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
        
            if(isset($empleado["foto"])&&($empleado['foto']!="default.gif")){
                if(file_exists("../imagenes/".$empleado["foto"])){
                    unlink("../imagenes/".$empleado["foto"]);
                }
            }
        
        
        
         $sentencia=$pdo->prepare("DELETE FROM empleado WHERE id_empleado=:id");
        
           
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
            header('Location: ../View/empleado.php');
        
        
        
    break;
        
        
    case "btnCancelar":
            header('Location: ../View/empleado.php');
        
    break;
        
    case "seleccionar":
        
        $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal="true";
        
         $sentencia=$pdo->prepare("SELECT foto FROM empleado WHERE id_empleado=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
            $txtfoto=$empleado['foto'];
        
        
    break;
        
        
        
}

    $sentencia0 = $pdo->prepare("SELECT * FROM empleado ");
    $sentencia0->execute();

    $listaEmpleados=$sentencia0->fetchAll(PDO::FETCH_ASSOC);
    
    $sentencia_a = $pdo->prepare("SELECT * FROM catalogo_dispositivo");
    $sentencia_a->execute();
    
    $listaAreas=$sentencia_a->fetchAll(PDO::FETCH_ASSOC);


     $sentencia_d = $pdo->prepare("SELECT * FROM equipo_registro");
    $sentencia_d->execute();
    
    $listaDireccion=$sentencia_d->fetchAll(PDO::FETCH_ASSOC);

    














?>

