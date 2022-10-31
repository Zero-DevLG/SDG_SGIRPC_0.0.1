<?php
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");


$archivo_e = $_POST['archivo'];
$op_folio = $_POST["documento"];

//echo $participante_e;
//echo $id_documento;
//Eliminar archivo
$target = $pdo->prepare("SELECT url FROM temp_a WHERE id_temp = '$archivo_e'");
$target->execute();
$url = $target->fetchColumn();
unlink($url);


$consulta_e = $pdo->prepare("DELETE FROM temp_a WHERE id_temp = '$archivo_e'");
$consulta_e->execute();





$consulta_archivo = $pdo->prepare("SELECT * FROM temp_a WHERE op_folio = '$op_folio'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table table-sm table-borderless">
    <thead>
        <th>Archivo Registrados</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach ($lista_archivo as $mostrar) { ?>
        <tr>
            <td><a href="<?php echo $mostrar['url'];  ?>"
                    download="<?php echo $mostrar['a_nombre']; ?>"><?php echo $mostrar['a_nombre'] ?></a></td>
            <input type="hidden" value="<?php echo $op_folio; ?>" id="op_folio">
            <td td data-valor='<?php echo $mostrar['id_temp']; ?>' class='ea'>
                <button value="btnEliminar" id="eliminar_a" class="btn"><img src="../img/garbage.png" title="Eliminar"
                        style="width: 20px;"></button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
$(document).ready(function() {


    $('.ea').click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        var documento = $('#op_folio').val();
        var form_data = new FormData();
        form_data.append('documento', documento);
        form_data.append('archivo', data);
        //alert(documento);
        //alert(data);
        $.ajax({
            data: form_data,
            url: "../Controller/eliminar_a.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function(r) {
                $('#archivos_registrados').empty();
                $('#archivos_registrados').html(r);
            }
        });
    });
});
</script>