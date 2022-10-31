<?php


    include("../Model/Conexion.php");
    
    $consulta=$pdo->prepare("SELECT * FROM instrucciones");
    $consulta->execute();
    $lista_instrucciones=$consulta->fetchAll(PDO::FETCH_ASSOC);

    $consulta_d=$pdo->prepare("SELECT * FROM equipo_registro");
    $consulta_d->execute();
    $lista_direcciones=$consulta_d->fetchAll(PDO::FETCH_ASSOC);


    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtn_instruccion=(isset($_POST['txtn_instruccion']))?$_POST['txtn_instruccion']:"";
    $txtdireccion=(isset($_POST['txtdireccion']))?$_POST['txtdireccion']:"";
    
    
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";

    
    $accionAgregar="";
    $accionModificar=$accionEliminar=$accionCancelar="disabled";
    $mostrarModal="false";
    $error=array();

    switch($accion){
            
        case "btnAgregar":
            
            if($txtdireccion=="todas"){
                $general=1;
            }else {
                $general=0;
            }
            
        echo $accion."<br>";
        echo $txtn_instruccion."<br>";
        echo $txtdireccion."<br>";
        echo $general."<br>";
       // */    
        $sentencia=$pdo->prepare("INSERT INTO instrucciones(n_instruccion,dir_instruccion,general) VALUES(:n_instruccion,:dir_instruccion,:general)");    
        $sentencia->bindParam(':n_instruccion',$txtn_instruccion);
        $sentencia->bindParam(':dir_instruccion',$txtdireccion);
        $sentencia->bindParam(':general',$general);
            
        $sentencia->execute();
            
        header('Location: ../View/admin_instrucciones.php');
        
        break;
            
            
        case "btnEliminar":
          
            
                $sentencia_e=$pdo->prepare("DELETE  FROM instrucciones WHERE id_instruccion=:id_instruccion");
            
                $sentencia_e->bindParam(':id_instruccion',$txtID);
            
                $sentencia_e->execute();
            
              header('Location: ../View/admin_instrucciones.php');
            
            break;
            
    }
    







?>