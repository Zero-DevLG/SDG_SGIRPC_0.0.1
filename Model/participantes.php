<?php

include("Conexion.php");
include('Consultas.php');

$id_documento = $_POST['id_documento'];
$Fecha = date('Y-m-d');

$consulta_participantes = $pdo->prepare("SELECT * FROM participantes  where  id_documento = '" . $id_documento . "'");
$consulta_participantes->execute();
$count2 = $consulta_participantes->rowCount();
$lista_participantes = $consulta_participantes->fetchAll(PDO::FETCH_ASSOC);

$consulta_archivo_adj = $pdo->prepare("SELECT * FROM archivos  where tipo_archivo=2 and id_documento = '" . $id_documento . "'");
$consulta_archivo_adj->execute();
$count3 = $consulta_archivo_adj->rowCount();




?>



<div>

</div>
<div id="formulario_participantes">

    <div id="datos_participante">
        <h3>Registrar Participante: </h3>
        <form action="" id="form_subir_p">
            <input type="hidden" value="<?php echo $id_documento; ?>" id="id_documento">

            <!-- child 0 -->
            <label for="">Nombre Completo:</label>
            <div id="nombre"></div>



            <label for="">Cargo:</label>
            <div id="cargo"></div>



            <label for="">Direccion:</label>
            <select class="form-control" name="txtdireccion" id="direccion_p" required>
                <?php foreach ($lista_sp as $mostrar) { ?>
                <option value="<?php echo $mostrar['id_direccion']; ?>">
                    <?php echo utf8_encode($mostrar['detalle']); ?></option>
                <?php } ?>
            </select>
            <br>
            <input type="button" id="subir_participante" class="btn btn-sm btn-info" value="Agregar">
        </form>
    </div>
</div>


<div id="participantes_registrados">
    <?php if ($count2 == 0) { ?>
    <h5>No hay participantes registrados para este documento</h5>
    <?php } else { ?>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th></th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($lista_participantes as $mostrar_p) { ?>
            <tr>
                <td><?php echo $mostrar_p['p_nombre']; ?></td>
                <td data-valor='<?php echo $mostrar_p['id_participante']; ?>' class='ep'>
                    <input type="hidden" value="<?php echo $id_documento; ?>" id="id_documento">
                    <button value="btnEliminar" id="eliminar_p" class="btn"
                        onclick="return Confirmar('Realmente deseas borrar el registro');" type="submit"
                        name="accion"><img src="../img/garbage.png" title="Eliminar" style="width: 20px;"></button>
                </td>
            </tr>
        </tbody>
        <?php }
            } ?>
    </table>
</div>





<script>
$(document).ready(function() {

    recargarLista_3();


    $('#direccion_p').change(function() {
        recargarLista_3();
    });



    function recargarLista_3() {
        console.log("Preparando datos");
        console.log($('#txtdireccion_r').val());
        $.ajax({
            type: "POST",
            url: "../Model/consulta_dest_r.php",
            data: "direccion=" + $('#direccion_p').val(),
            success: function(r) {
                console.log("Enviado exitosamente para llenar select");
                $('#nombre').html(r);
                console.log($('#txtdestinatario_r').val());
            }
        });
        $.ajax({
            type: "POST",
            url: "../Model/consulta_cargo_r.php",
            data: "direccion=" + $('#direccion_p').val(),
            success: function(r) {
                console.log("Enviado exitosamente para llenar select");
                $('#cargo').html(r);
                console.log($('#txtcargod_r').val());
            }
        });
    };

    $('#subir_participante').click(function() {
        var nombre = $('#txtdestinatario_r').val();
        var cargo = $('#txtcargod_r').val();
        var direccion = $('#direccion_p').val();
        var documento = $('#id_documento').val();
        var tipo = 1;
        //alert(documento);
        var form_data = new FormData();
        form_data.append('nombre', nombre);
        form_data.append('cargo', cargo);
        form_data.append('direccion', direccion);
        form_data.append('documento', documento);
        $.ajax({
            data: form_data,
            url: "../Controller/subir_p.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function(r) {
                $('#participantes_registrados').html(r);
                //alert('' + r);
            }
        });


    });

    $('.ep').click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        var documento = $('#id_documento').val();
        var form_data = new FormData();
        form_data.append('documento', documento);
        form_data.append('participante', data);
        //alert(documento);
        //alert(data);
        $.ajax({
            data: form_data,
            url: "../Controller/eliminar_p.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function(r) {
                $('#participantes_registrados').html(r);
            }
        });
    });


});
</script>