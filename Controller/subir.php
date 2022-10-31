<?php

session_start();
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

$cat = $_POST['cat'];

if (0 < $_FILES['file']['error']) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    #Todo tu codigo si el archivo se recibió correctamente.
    // $documento= $_POST['documento'];
    //echo $documento;
    //print_r($_FILES['file']['name']);


    //var_dump ($_POST);
    //var_dump ($_FILES);

    $op_folio = $_POST["documento"];
    $nombre = $_FILES['file']['name'];
    $nombre_temporal = $_FILES['file']['tmp_name'];
    //echo $nombre_temporal;
    //echo "El documento es: " . $id_documento;
    //echo "El archivo es: " . $nombre;
    //echo "El archivo temp  es: " . $nombre_temporal;

    if ($cat == 20) {
        $urlMove = "../imagenes/";
        $nombre = $nombre . "-T";
        $url = "../imagenes/" . $nombre;
    } else if ($cat == 200) {
        $nombre = $nombre . "-A";
        $urlMove = "../repos/doc_areas/";
        $url = "../repos/doc_areas/" . $nombre;
    }



    $sentencia_ia = $pdo->prepare("INSERT INTO temp_a(op_folio,url,a_nombre) VALUES(:op_folio,:url,:a_nombre)");
    $sentencia_ia->bindParam(':op_folio', $op_folio);
    $sentencia_ia->bindParam(':url', $url);
    $sentencia_ia->bindParam(':a_nombre', $nombre);

    $sentencia_ia->execute();

    move_uploaded_file($nombre_temporal, $url);
}


$consulta_archivo = $pdo->prepare("SELECT * FROM temp_a WHERE op_folio = '$op_folio'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table table-sm table-borderless">
    <thead>
        <th>Archivo Registrados</th>
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
                $('#archivos_registrados').html(r);
            }
        });
    });
});
</script>