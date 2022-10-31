<?php

error_reporting(0);
date_default_timezone_set("America/Mexico_City");
require('conexion.php');
require('sessiones.php');

$dir_local = $_SESSION["id_direccion"];

$Fecha = $_POST['fecha'];
//echo $Fecha; 
$consulta_atendidos = $pdo->prepare("SELECT e.foto,a.destacado,a.id_actividad,a.asunto,e.nombre,e.apellido,a.fecha_registro,a.fecha_finalizacion,a.estado FROM actividades as a INNER JOIN empleado as e ON e.id_empleado = a.id_empleado WHERE a.fecha_publicacion = '$Fecha' AND a.id_direccion = '$dir_local' AND a.publicado = 1 ORDER BY a.destacado DESC");
$consulta_atendidos->execute();
$lista_actividades = $consulta_atendidos->fetchAll(PDO::FETCH_ASSOC);
$count = $consulta_atendidos->rowCount();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($count != 0) { ?>
    <table id="actividades" class="table table-borderless table-hover" style="cursor:pointer;">
        <thead>
            <th></th>
            <th></th>
            <th>id</th>
            <th>Registro</th>
            <th>Asunto</th>
            <th>Estado</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach ($lista_actividades as $mostrar) { ?>
            <tr>
                <td> <?php if ($mostrar['destacado'] == 1) { ?>
                    <img src="../img/iconos/star_on.png" alt="" style="width: 45px;">
                    <?php } ?>

                </td>
                <td><img id="img_usr" width="35px" height="40" src="../imagenes/<?php echo $mostrar['foto']; ?>" /></td>
                <td><?php echo $mostrar['id_actividad'] ?></td>
                <td><?php echo $mostrar['nombre'] . " " . $mostrar['apellido'] ?></td>
                <td><?php echo $mostrar['asunto'] ?></td>
                <td><?php if ($mostrar['estado'] == 1) { ?>
                    <img src="../img/iconos/success.png" alt="" style="width: 30px;">
                    <?php } else { ?>
                    <img src="../img/iconos/pendiente2.png" alt="" style="width: 35px;">
                </td>
            </tr>
            <?php }
                        } ?>
        </tbody>
    </table>
    <?php } else { ?>
    <img id="no_resultados" src="../img/no_resultados2.png" alt="">
    <div id="mensaje">
        <h3>No se encontraron registros!!!</h3>
        <h4>Intente de nuevo con otra fecha</h4>
    </div>
    <?php } ?>
</body>

</html>




<script>
$(document).ready(function() {
    $("#actividades").on('click', 'tr', function(e) {
        e.preventDefault();
        var renglon = $(this);
        var campo1;
        $(this).children("td").each(function(i) {
            switch (i) {
                case 2:
                    campo1 = $(this).text();
                    break;

            }
            $(this).css("background-color", "#ECF8E0");
        })
        var textoRenglon = campo1;
        console.log(textoRenglon);
        var id = textoRenglon;
        alert(id);
        var data = id;
        //alert(data);
        console.log('iniciando');
        console.log(data);



    });


});
</script>