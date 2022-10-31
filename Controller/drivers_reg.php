
<script>
    function mensaje_error(){
        alert("Error: Esta conductor ya esta registrado en esta unidad");
    };
</script>

<?php 


include("../Model/conexion_vehicular.php");
$id_vehiculo = $_POST['id_vehiculo'];
$id_driver = $_POST['id_driver'];
$Fecha = date('Y-m-d');

$verifica = $pdo->prepare("SELECT * FROM bitacora_unidad WHERE id_driver = '$id_driver'");
$verifica->execute();
$Count = $verifica->rowCount();
$consulta_bit = $pdo->prepare("SELECT d.nombre,d.apellido,d.tipo_licencia,d.foto,di.direccion FROM bitacora_unidad as bu INNER JOIN drivers as d ON bu.id_driver = d.id_driver INNER JOIN direccion as di ON di.id_direccion = d.direccion  WHERE id_vehiculo='$id_vehiculo'");
$consulta_bit->execute();
$datos_bit = $consulta_bit->fetchAll(PDO::FETCH_ASSOC);
$count_bit= $consulta_bit->rowCount();



if($Count !=0){
    echo "<script>";
     echo   "mensaje_error();";    
    echo "</script>";
   
}else{
    $insertar_bit = $pdo->prepare("INSERT INTO bitacora_unidad(id_driver,id_vehiculo,fecha_registro) VALUES('$id_driver','$id_vehiculo','$Fecha') ");
    $insertar_bit->execute();

    $consulta_bit = $pdo->prepare("SELECT d.nombre,d.apellido,d.tipo_licencia,d.foto,di.direccion FROM bitacora_unidad as bu INNER JOIN drivers as d ON bu.id_driver = d.id_driver INNER JOIN direccion as di ON di.id_direccion = d.direccion  WHERE id_vehiculo='$id_vehiculo'");
$consulta_bit->execute();
$datos_bit = $consulta_bit->fetchAll(PDO::FETCH_ASSOC);
$count_bit= $consulta_bit->rowCount();

}




?>


<table class="table table-borderless" style="font-size: 12px;">
                                <tbody>
                                    <?php foreach($datos_bit as $mostrar){ ?>
                                     <tr>
                                         <td><img style="width: 40px;" src="../imagenes/<?php echo $mostrar['foto']; ?>"></td>
                                         <td><?php echo $mostrar['nombre'] . " " . $mostrar['apellido']; ?></td>
                                         <td><?php echo $mostrar['direccion']; ?></td>
                                         <td>Tipo de licencia: <?php echo $mostrar['tipo_licencia']; ?></td>
                                         <td data-valor='<?php echo $mostrar['id_driver']; ?>' class='ep'>
                                         <input type="hidden"  id="id_vehiculo" value="<?php echo $id_vehiculo; ?>">
                                         <a href="#"><img id="reg_driver2" style="width: 40px;" src="../img/iconos/-.png" title="Eliminar este conductor de esta unidad"></a></td>

                                     </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>



