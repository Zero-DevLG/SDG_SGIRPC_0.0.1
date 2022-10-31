<?php
           session_start();
            date_default_timezone_set("America/Mexico_City");
            include("../Model/Conexion.php");
try {
    $resultado = $pdo->prepare("SELECT * FROm empleado WHERE usuario=:login and password=:password");
    $login = htmlentities(addslashes($_POST["login"]));
    $password = htmlentities(addslashes($_POST["password"]));
    $resultado->bindValue(":login", $login);
    $resultado->bindValue(":password", $password);
    $resultado->execute();
    $numero_registro = $resultado->rowCount();
    //echo "<br>Numero que se encontro" . $numero_registro;
    $lista = $resultado->fetchall(PDO::FETCH_ASSOC);
    foreach ($lista as $mostrar) {
        $nombre = $mostrar['nombre'];
        $apellido = $mostrar['apellido'];
        $foto = $mostrar['foto'];
        $area = $mostrar['area'];
        $usuario = $mostrar['usuario'];
        $id_empleado = $mostrar['id_empleado'];
        $id_direccion = $mostrar['id_direccion'];
        $n_empleado = $mostrar['n_empleado'];
        $login = $mostrar['last_login'];
        $id_dir_s = $mostrar['id_dir_s'];
        $id_jc = $mostrar['id_jc'];
    }


    $obtener_permisos = $pdo->prepare("SELECT mcd.id_plataforma,mcd.tipo_rol FROM modulo_cd as mcd WHERE mcd.id_empleado = '$id_empleado'");
    $obtener_permisos->execute();
    $lista_privilegios = $obtener_permisos->fetchAll(PDO::FETCH_ASSOC);
    foreach ($lista_privilegios as $obtener) {
        $id_plataforma = $obtener['id_plataforma'];
        $tipo_rol = $obtener['tipo_rol'];
    }

    ///Datos Recolectados
    /*
    echo "<br>Nombre: " . $nombre;
    echo "<br>Apellido: " .  $apellido;
    echo "<br>Foto: " .  $foto;
    echo "<br>Area: " .  $area;
    echo "<br>Username: " .  $usuario;
    echo "<br>ID del empleado: " .  $id_empleado;
    echo "<br>ID de la direccion: " .  $id_direccion;
    echo "<br>Numero de empleado: " .  $n_empleado;
    echo "<br>Ultimo login: " .  $login;
    echo "<br>ID plataforma:" . $id_plataforma;
    echo "<br>Tipo Rol:" . $tipo_rol;
    */
    //

    if ($numero_registro != 0) {
        $Fecha = date('Y-m-d');
        $mDate = new DateTime();
        $hora = $mDate->format("H:i:s");
        $accion = "inicio de sesion";
        $query = "0";
        $id_documento = 0;

        //Verificar que el usuario no este en linea
        $sql = $pdo->prepare("SELECT online FROM empleado WHERE id_empleado = '$id_empleado'");
        $sql->execute();
        $user_active = $sql->fetchColumn();

        if($user_active == 1)
        {
            // header("location:../index.php");
            echo "Su usuario ya tiene una sesion abierta en un dispositivo, favor de cerrar la sesion abierta, si el error persiste, favor de comunicarse con el area de soporte";

        }
        else{

            $sql = $pdo->prepare("UPDATE empleado SET online = 1 WHERE id_empleado = '$id_empleado'");
        $sql->execute();


        $update_log = $pdo->prepare("INSERT INTO logs(id_usr,accion,id_documento,fecha_accion,hora_accion) VALUES(:id_usr,:accion,:id_documento,:fecha_accion,:hora_accion)");
        $update_log->bindParam(':id_usr', $id_empleado);
        $update_log->bindParam(':accion', $accion);
        $update_log->bindParam(':id_documento', $id_documento);
        $update_log->bindParam(':fecha_accion', $Fecha);
        $update_log->bindParam(':hora_accion', $hora);
        $update_log->execute();

        $last_login = $pdo->prepare("UPDATE empleado SET last_login = '$Fecha.$hora' WHERE id_empleado = '$id_empleado'");
        $last_login->execute();
        //echo "<br>Esta es la hora" . $hora;

        $_SESSION["usuario"] = $_POST["login"];
        $_SESSION["foto"] = $foto;
        $_SESSION["area"] = $area;
        $_SESSION["direccion"] = $direccion;
        $_SESSION["id_direccion"] = $id_direccion;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["usuario"] = $usuario;
        $_SESSION["id_empleado"] = $id_empleado;
        $_SESSION["apellido"] = $apellido;
        $_SESSION['n_empleado'] = $n_empleado;
        $_SESSION['last_login'] = $login;
        $_SESSION['tipo_rol'] = $tipo_rol;
        $_SESSION['id_plataforma'] = $id_plataforma;
        $_SESSION['id_dir_s'] = $id_dir_s;
        $_SESSION['id_jc'] = $id_jc;
        //echo "<script>location.href='../View/prueba_localstorage.php';</script>";
        


        switch($tipo_rol)
        {
                case 1:
                    header("Location:../View/doc.php");
                break;
                case 9:
                    header("Location:../View/doc.php");
                break;
                case 7:
                    header("Location:../View/doc_dir.php");
                break;
                case 6:
                    header("Location:../View/doc_dep.php");
                break;
                case 8:
                    header("Location:../View/doc_cj.php");
                break;
        }
        
        
        
        
        
        
        /*
        switch ($id_plataforma) {
            case 0:

                break;


            case 1:

                switch ($tipo_rol) {
                    case 1:
                        # code...
                        $_SESSION["foto"] = $foto;
                        $_SESSION["area"] = $area;
                        $_SESSION["direccion"] = $direccion;
                        $_SESSION["id_direccion"] = $id_direccion;
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["id_empleado"] = $id_empleado;
                        $_SESSION["apellido"] = $apellido;
                        $_SESSION['n_empleado'] = $n_empleado;
                        $_SESSION['last_login'] = $login;
                        $_SESSION['tipo_rol'] = $tipo_rol;
                        $_SESSION['id_plataforma'] = $id_plataforma;
                        //echo "<script>location.href='../View/prueba_localstorage.php';</script>";
                        header("Location:../View/home.php");

                        break;
                    case 2:
                        # code...
                        $_SESSION["foto"] = $foto;
                        $_SESSION["area"] = $area;
                        $_SESSION["direccion"] = $direccion;
                        $_SESSION["id_direccion"] = $id_direccion;
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["id_empleado"] = $id_empleado;
                        $_SESSION["apellido"] = $apellido;
                        $_SESSION['n_empleado'] = $n_empleado;
                        $_SESSION['last_login'] = $login;
                        $_SESSION['tipo_rol'] = $tipo_rol;
                        $_SESSION['id_plataforma'] = $id_plataforma;
                        //echo "<script>location.href='../View/prueba_localstorage.php';</script>";
                        header("Location:../View/home.php");

                        break;
                    case 3: 
                        $_SESSION["foto"] = $foto;
                        $_SESSION["area"] = $area;
                        $_SESSION["direccion"] = $direccion;
                        $_SESSION["id_direccion"] = $id_direccion;
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["id_empleado"] = $id_empleado;
                        $_SESSION["apellido"] = $apellido;
                        $_SESSION['n_empleado'] = $n_empleado;
                        $_SESSION['last_login'] = $login;
                        $_SESSION['tipo_rol'] = $tipo_rol;
                        $_SESSION['id_plataforma'] = $id_plataforma;
                        //echo "<script>location.href='../View/prueba_localstorage.php';</script>";
                        header("Location:../View/home.php");

                }

                break;


            case 2:
                switch ($tipo_rol) {
                    case 1:
                    case 1:
                        # code...
                        $_SESSION["foto"] = $foto;
                        $_SESSION["area"] = $area;
                        $_SESSION["direccion"] = $direccion;
                        $_SESSION["id_direccion"] = $id_direccion;
                        $_SESSION["nombre"] = $nombre;
                        $_SESSION["usuario"] = $usuario;
                        $_SESSION["id_empleado"] = $id_empleado;
                        $_SESSION["apellido"] = $apellido;
                        $_SESSION['n_empleado'] = $n_empleado;
                        $_SESSION['last_login'] = $login;
                        $_SESSION['tipo_rol'] = $tipo_rol;
                        $_SESSION['id_plataforma'] = $id_plataforma;
                        //header("Location: ../View/vehicular2.php");
                        // header("Location: ../View/doc.php");
                        break;
                }

                break;
        }*/

        }
     
         

        
    } else {
        header("location:../index.php");
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

