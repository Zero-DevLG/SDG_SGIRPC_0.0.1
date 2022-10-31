<?php

session_start();
date_default_timezone_set("America/Mexico_City");
include("Conexion.php");
$cat = $_POST['top_c'];
$op_folio = $_POST['op_folio'];
$Fecha = date('Y-m-d');


$consulta_archivo = $pdo->prepare("SELECT * FROM temp_a  where  op_folio = '" . $op_folio . "'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
$count2 = $consulta_archivo->rowCount();

/*
$consulta_archivo = $pdo->prepare("SELECT * FROM archivos  where tipo_archivo=1 and id_documento = '" . $id_documento . "'");
$consulta_archivo->execute();
$count2 = $consulta_archivo->rowCount();

$consulta_archivo_adj = $pdo->prepare("SELECT * FROM archivos  where tipo_archivo=2 and id_documento = '" . $id_documento . "'");
$consulta_archivo_adj->execute();
$count3 = $consulta_archivo_adj->rowCount();

$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$id_documento'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);
echo $id_documento;
*/



?>



<div id="documento_original">
    <div id="content_uploadFile">
        <h4> Los archivos adjuntos se vincularan con el siguiente numero de control:</h4>
        </h4>
        <input type="text" class="form_control" id="op_folio" style="color: black;" value="<?php echo $op_folio; ?>" disabled>
        <input type="hidden" class="form-control" id="cat" value="<?php echo $cat; ?>" disabled>
        <hr>
        <h4>Subir Documento Digitalizado:</h4>
        <form action="#" id="form_subir">
            <input type="hidden" value="<?php echo $id_documento; ?>" id="id_documento">
            <div id="archivo_entrada">
                <!-- child 0 -->

                <input name="archivos" id="archivo" type="file">
            </div>


            <div class="acciones">
                <!-- child 2 -->
                <input type="button" id="subir" class="btn btn-primary btn-sm" value="Subir">
            </div>
        </form>
        <div id="seccion_2">
            <div id="archivos_registrados">
                <?php if ($count2 == 0) { ?>
                <h5>No hay Documentos registrados</h5>
                <?php } else { ?>
                <table style="color: black;" class="table table-sm table-borderless">
                    <thead>

                        <th>Archivo Registrados</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_archivo as $mostrar) { ?>
                        <tr>

                            <td><a href="<?php echo $mostrar['url'];  ?>"
                                    download="<?php echo $mostrar['a_nombre']; ?>"><?php echo $mostrar['a_nombre'] ?></a>
                            </td>
                            <input type="hidden" value="<?php echo $op_folio; ?>" id="op_folio">
                            <td data-valor='<?php echo $mostrar['id_temp']; ?>' class='ea'>
                                <button value="btnEliminar" id="eliminar_a" class="btn"><img src="../img/garbage.png"
                                        title="Eliminar" style="width: 20px;"></button>
                            </td>
                        </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>






    <script>
    $(document).ready(function() {


        $('.ea').click(function(e) {
            e.preventDefault();
            var data = $(this).attr("data-valor");
            //alert(data);
            var documento = $('#op_folio').val();
            var form_data = new FormData();
            form_data.append('documento', documento);
            form_data.append('archivo', data);
            //alert(documento);
            alert(data);
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



        $('#subir').click(function() {
            var datos = $('#archivo').prop('files')[0];
            var documento = $('#op_folio').val();
            var cat = $('#cat').val();
            //alert(JSON.stringify(datos));
            //alert(documento);
            var form_data = new FormData();
            form_data.append('file', datos);
            form_data.append('documento', documento);
            form_data.append('cat', cat);
            $.ajax({
                data: form_data,
                url: "../Controller/subir.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(r) {
                    swal("Archivo vinculado correctamente", "", "success");
                    $('#archivos_registrados').html(r);
                    //alert('' + r);
                }
            });


        });

        $('#subir_adj').click(function() {
            var datos = $('#archivo2').prop('files')[0];
            var documento = $('#id_documento').val();
            var tipo = 2;
            //alert(documento);
            var form_data = new FormData();
            form_data.append('file', datos);
            form_data.append('documento', documento);
            form_data.append('tipo', tipo);
            $.ajax({
                data: form_data,
                url: "../Controller/subir.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(r) {
                    //alert('' + r);
                    $('#documento_anexo').html(r);
                }
            });
        });

    });
    </script>