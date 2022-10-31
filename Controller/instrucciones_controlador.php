<?php

    session_start();
      date_default_timezone_set("America/Mexico_City");

     //$id_direccion=$_SESSION['id_direccion'];

 include("../Model/Conexion.php");
   
     //$id_documento = $_POST['txtid_documento'];
    echo "este es".$_SESSION['txt_id']."<br>";
     $id_documento = $_SESSION['txt_id'];
        
    
        $Fecha= date('Y-m-d');
        $txtresponsable=(isset($_POST['txtresponsable']))?$_POST['txtresponsable']:"";
        $txtcargo=(isset($_POST['txtcargo']))?$_POST['txtcargo']:"";
        $txtfecha_limite=(isset($_POST['txtfecha_limite']))?$_POST['txtfecha_limite']:"";
        $txtinstruccion=(isset($_POST['txtinstruccion']))?$_POST['txtinstruccion']:"";


        

        $insercion=$pdo->prepare("INSERT INTO documento_instruccion(id_documento,instruccion,destinatario,cargo_d,fecha_limite) VALUES (:id_documento,:instruccion,:destinatario,:cargo_d,:fecha_limite)");

        $insercion->bindParam(':id_documento',$id_documento);
        $insercion->bindParam(':instruccion',$txtinstruccion);
        $insercion->bindParam(':destinatario',$txtresponsable);
        $insercion->bindParam(':cargo_d',$txtcargo);
        $insercion->bindParam(':fecha_limite',$txtfecha_limite);

        $insercion->execute();





       if (isset ($_POST["archivos"])) {

        print_r($_POST["archivos2"])."<br>";
        print_r($_POST["archivos"]);
        print_r($_POST["archivos"][0]);
         //de se asi, para procesar los archivos subidos al servidor solo debemos recorrerlo
         //obtenemos la cantidad de elementos que tiene el arreglo archivos
         $tot = count($_POST["archivos"]);

         echo "<br>".$tot;
         //este for recorre el arreglo
         for ($i = 0; $i < $tot; $i++){
            $name = $_POST["archivos"][$i];
            $cargo = $_POST["archivos2"][$i];
         //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
         //para trabajar con este
           
        $sentencia_0 = $pdo->prepare("INSERT INTO participantes(id_documento,p_nombre,p_cargo) VALUES ('$id_documento','$name','$cargo')");
         $sentencia_0->execute();
            }  
}

             header('Location: ../View/documentos_l.php');
?>