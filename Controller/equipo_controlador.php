    <?php

$txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
$txtdireccion = (isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
$txttitular = (isset($_POST['txttitular']))?$_POST['txttitular']:"";


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
        
     
        
         $sentencia=$pdo->prepare("INSERT INTO equipo_registro(direccion,titular) VALUES (:direccion,:titular)");
        
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':titular',$txttitular);
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
        
         $sentencia=$pdo->prepare("UPDATE equipo_registro SET 
         direccion=:direccion,
         titular=:titular
            WHERE
         id_direccion=:id");
        
            $sentencia->bindParam(':direccion',$txtdireccion);
            $sentencia->bindParam(':titular',$txttitular);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
        
        
             
            
        
        
        
            header('Location: ../View/admin_equipos.php');
        
    break;
        
    case "btnEliminar":
        
           
        
        
        
         $sentencia=$pdo->prepare("DELETE FROM equipo_registro WHERE id_direccion=:id");
        
           
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

