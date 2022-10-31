<?php
    require('../Model/Conexion.php');
    $id = $_POST['id_empleado'];
    $get_data = $pdo->prepare("SELECT *,cp.detalle FROM empleado as de INNER JOIN control_sp as cp ON de.id_direccion = cp.id_direccion WHERE id_empleado = $id");
    $get_data->execute();
    foreach($get_data as $get){
        $foto = $get['foto'];
        $nombre = utf8_encode($get['nombre']) ." ". utf8_encode($get['apellido']);
        $n_empleado = $get['n_empleado'];
        $last_conexion = $get['last_login'];
    }

    //echo $foto;

  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <div id="cabezera">
        <img src="../img/LogoPC2.png">
    </div>
    <div id="data_usr">
        <img id="img_usr2" src="../img/user_d.jpg" alt="">
   
        <div id="datos_usuario2">
            <label>Nombre:</label>
            <h5><?php echo  $nombre  ?></h5>
            <hr>
            <label>Numero de empleado:</label>
            <h5><?php echo  $n_empleado;  ?></h5>
            <label>Ultima conexion</label>
            <h5><?php echo $last_conexion  ?></h5>

            
        </div>
        <div id=subnav_r>
        </div>
        

    </div>
    
  </body>
  </html>