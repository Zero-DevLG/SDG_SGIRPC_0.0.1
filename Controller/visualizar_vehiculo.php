<?php


session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
}

include '../Model/conexion_vehicular.php';
require '../Model/consultas_vehicular.php';
$id_vehiculo = $_POST['valorBusqueda'];

$consulta_vehiculo = $pdo->prepare("SELECT v.id_vehiculo,v.placas,t.detalle,v.marca,v.modelo,v.foto,d.direccion FROM vehiculo as v INNER JOIN direccion as d INNER JOIN catalogo_vehiculo as t WHERE v.direccion = d.id_direccion AND t.id_catalogo = v.tipo_vehiculo  AND id_vehiculo = '$id_vehiculo'");
$consulta_vehiculo->execute();
$datos_vehiculo = $consulta_vehiculo->fetchAll(PDO::FETCH_ASSOC);


$consulta_bit = $pdo->prepare("SELECT d.nombre,d.apellido,d.tipo_licencia,d.foto,di.direccion FROM bitacora_unidad as bu INNER JOIN drivers as d ON bu.id_driver = d.id_driver INNER JOIN direccion as di ON di.id_direccion = d.direccion  WHERE id_vehiculo='$id_vehiculo'");
$consulta_bit->execute();
$datos_bit = $consulta_bit->fetchAll(PDO::FETCH_ASSOC);
$count_bit= $consulta_bit->rowCount();

foreach ($datos_vehiculo as $mostrar) {
    $placas = $mostrar['placas'];
    $tipo = $mostrar['detalle'];
    $marca = $mostrar['marca'];
    $modelo = $mostrar['modelo'];
    $direccion = $mostrar['direccion'];
}


?>

<!DOCTYPE html>
<html lang="en">


<body>
    <div id="botones_opciones">

    </div>
    <div id="panel_datos">
        <div id="cabezera">
            <div id="datos_cabezera">
                <table class="table table-sm" id="tabla_vehiculo" CELLSPACING="2">
                    <tbody>
                        <tr>
                            <td>
                                IDENTIFICADOR: <?php echo $id_vehiculo; ?>
                            </td>
                            <td>
                                PLACAS: <?php echo $placas; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TIPO: <?php echo $tipo; ?>
                            </td>
                            <td>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                MARCA: <?php echo $marca; ?>
                            </td>
                            <td>
                                MODELO: <?php echo $modelo; ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div id="detalles">
                    <a id="img_detalles" href="#"><img src="../img/iconos/mecanica.png" alt=""></a>
                    <h5>REGISTRAR DETALLES MECANICOS</h5>
                    
                </div>

            </div>

            <div id="pagos_programados">
                <img src="../img/calendario_pagos.png"  alt="">
                 <div id="datos_pagos">
                 
                        <h5>No hay pagos registrados, extiende de la seccion programar pagos</h5>
                 </div>
            </div>

            <div id="salud_vehiculo">
                <img src="../img/salud.png"  alt="">
                 <div id="datos_salud">
                 
                        <h5>No hay datos visualizables, extiende de la seccion Gasolina, Mantenimientos, Conductores</h5>
                 </div>
            </div>


        </div>
       
    </div>

</body>



  
</html>


<script>
    $(document).ready(function(){

        $('.ep').click(function(){
            var id_vehiculo = $('#id_vehiculo').val();
             var data = $(this).attr("data-valor");

             var form_data = new FormData();
             form_data.append('id_vehiculo',id_vehiculo);
             form_data.append('id_driver',data);

            //alert(id_vehiculo);
            $.ajax({
                data: form_data ,
                url: "../Controller/drivers_reg.php",
                type:"POST",
                contentType: false,
                processData: false,
                success:
                    function(r){
                        $('#tabla_drivers2').empty();
                        $('#tabla_drivers2').html(r);
                    }
            });
        });


    });

</script>