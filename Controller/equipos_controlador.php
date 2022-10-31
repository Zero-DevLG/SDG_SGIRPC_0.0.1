<?php 

include("../Model/Conexion.php");
$consulta = $pdo->prepare("SELECT * FROM equipo_registro");
    $consulta->execute();

    $direccion=$consulta->fetchAll(PDO::FETCH_ASSOC);

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtcontador = (isset($_POST['txtcontador']))?$_POST['txtcontador']:"";
$txtcodigo = (isset($_POST['txtcodigo']))?$_POST['txtcodigo']:"";
    

$accion = (isset($_POST['accion']))?$_POST['accion']:"";


    $accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal="false";
$error=array();


    switch($accion){
   
        case "btnAgregar":
            
            
        
        
         $sentencia=$pdo->prepare(" UPDATE equipo_registro SET contador=:contador , codigo=:codigo WHERE id_direccion=:id_direccion");
        
            $sentencia->bindParam(':id_direccion',$txtID);
            $sentencia->bindParam(':contador',$txtcontador);
            $sentencia->bindParam(':codigo',$txtcodigo);
            $sentencia->execute();
           
            
            
            header('Location: ../View/equipos.php');   
        
            
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
        
            $sentencia=$pdo->prepare("SELECT foto FROM catalogo_dispositivo WHERE id_catalogo=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $empleado=$sentencia->fetch(PDO::FETCH_LAZY);
         
        
            if(isset($empleado["foto"])&&($empleado['foto']!="default.gif")){
                if(file_exists("../imagenes/".$empleado["foto"])){
                    unlink("../imagenes/".$empleado["foto"]);
                }
            }
        
        
        
         $sentencia=$pdo->prepare("DELETE FROM catalogo_dispositivo WHERE id_catalogo=:id");
        
           
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

    $consulta_d = $pdo->prepare("SELECT * FROM equipo_registro");
    $consulta_d->execute();
    $conteo=$consulta_d->fetchAll(PDO::FETCH_ASSOC);

?>

    