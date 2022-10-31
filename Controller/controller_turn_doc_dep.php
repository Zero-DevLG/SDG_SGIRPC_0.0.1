<?php
    session_start();
    include("../Model/Conexion.php");

    //CONSTANTES
    $DateAndTime = date(date('Y-m-d H:i:s'));
    $arrayIdDir = array();
    //Variables POST
    $id_ins = $_POST['id_ins'];
    $arrayNames = array();
    $arrayNames = json_decode($_POST['arrayNames']);
    //var_dump($arrayNames);    

    $instruccion = $_POST['instruccion'];

    //Variables de sesion
    $id_dir_gen =  $_SESSION["id_direccion"];
    $id_dir_s = $_SESSION['id_dir_s'];
    $id_emp = $_SESSION["id_empleado"];
    
    

    try {
        //code...
         //Obtenemos el id del documento
        $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_ins'");
        $sql->execute();
        $id_documento = $sql->fetchColumn();

        //Obtenemos los id de las direcciones
        $max = sizeof($arrayNames);
        for($i = 0; $i < $max; $i++)
        {
            $sql = $pdo->prepare("SELECT id_departamento FROM departamentos WHERE  nombre_departamento = '$arrayNames[$i]'");
            $sql->execute();
            $data = $sql->fetchColumn();
            array_push($arrayIdDir,$data);
        }

        //var_dump($arrayIdDir);

        //Inserta segun el nuevo array
        $max = sizeof($arrayIdDir);
        for($i=0;$i<$max;$i++)
        {
            $sql = $pdo->prepare("INSERT INTO instruccion_direccion_p(id_instruccion_g,id_documento,id_direccion_g,id_direccion_p,id_jc,instruccion,date_reg,id_emp) VALUES('$id_ins','$id_documento','$id_dir_gen','$id_dir_s',$arrayIdDir[$i],'$instruccion','$DateAndTime','$id_emp')");
            $sql->execute();
        }

        //Se cambia el estatus del documento
        $sql = $pdo->prepare("UPDATE documentos_externos SET estatus = 5 WHERE id_documento='$id_documento'");
        $sql->execute();

        echo "Operacion Completada";
        

    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
   

?>