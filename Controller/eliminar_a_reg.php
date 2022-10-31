<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");


$archivo_e = $_POST['archivo'];
$id_documento = $_POST["documento"];

//echo $participante_e;
//echo $id_documento;
$target = $pdo->prepare("SELECT url FROM archivos WHERE id_archivo = '$archivo_e'");
$target->execute();
$url = $target->fetchColumn();
unlink($url);


$consulta_e = $pdo->prepare("DELETE FROM archivos WHERE id_archivo = '$archivo_e'");
$consulta_e->execute();




$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$id_documento'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

?>

<table style="color: white;" class="table table-sm table-borderless">
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
            <td td data-valor='<?php echo $mostrar['id_archivo']; ?>' class='ea'>
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
        //alert(data);
        var documento = $('#id_documento').val();
        var form_data = new FormData();
        form_data.append('documento', documento);
        form_data.append('archivo', data);
        //alert(documento);
        //alert(data);
        console.log(documento)
        $.ajax({
            data: form_data,
            url: "../Controller/eliminar_a_reg.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function(r) {
                $('#archivos_registrados').empty();
                $('#archivos_registrados').html(r);
            }
        });
    });
    /*
    setTimeout(function() {
        if (documento != "") {
            $.post(
                "../Model/vista_documento.php", {
                    valorBusqueda: documento
                },
                function(mensaje2) {
                    $("#resultadoBusqueda").empty();
                    $("#resultadoBusqueda").html(mensaje2);
                }
            );
        }
    }, 900);
    */
});
</script>