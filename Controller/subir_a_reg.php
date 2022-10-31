<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");


if (0 < $_FILES['file']['error']) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
} else {
    #Todo tu codigo si el archivo se recibió correctamente.
    // $documento= $_POST['documento'];
    //echo $documento;
    //print_r($_FILES['file']['name']);


    //var_dump ($_POST);
    //var_dump ($_FILES);

    $id_documento = $_POST["documento"];
    $consulta_cat = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$id_documento'");
    $consulta_cat->execute();
    $row_cat = $consulta_cat->rowCount();
    $consulta_cat3 = $pdo->prepare("SELECT num FROM op_control_ac WHERE id_documento = '$id_documento'");
    $consulta_cat3->execute();
    $row_cat3 = $consulta_cat3->rowCount();
    if ($row_cat3 != 0) {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-AC";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../repos/doc_AC/" . $nombre;


        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES(:id_documento,:url,:a_nombre)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);

        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../repos/doc_AC/' . $nombre);
    }else if ($row_cat != 0) {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-A";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../repos/doc_areas/" . $nombre;


        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES(:id_documento,:url,:a_nombre)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);

        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../repos/doc_areas/' . $nombre);
    } else {
        $nombre = $_FILES['file']['name'];
        $nombre = $nombre . "-T";
        //$nombre = $_FILES['file']['name'];
        $nombre_temporal = $_FILES['file']['tmp_name'];

        //echo "El documento es: " . $id_documento;
        //echo "El archivo es: " . $nombre;
        //echo "El archivo temp  es: " . $nombre_temporal;


        $url = "../imagenes/" . $nombre;


        $sentencia_ia = $pdo->prepare("INSERT INTO archivos(id_documento,url,a_nombre) VALUES(:id_documento,:url,:a_nombre)");
        $sentencia_ia->bindParam(':id_documento', $id_documento);
        $sentencia_ia->bindParam(':url', $url);
        $sentencia_ia->bindParam(':a_nombre', $nombre);

        $sentencia_ia->execute();

        move_uploaded_file($nombre_temporal, '../imagenes/' . $nombre);
    }
}


$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$id_documento'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);


?>

<table style="color: white;" class="table table-sm table-borderless">
    <thead>
        <th>Archivo Registrados</th>
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
});
</script>