<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("Conexion.php");

$id_document = $_POST['id_documento'];
$Fecha = date('Y-m-d');


$consulta_archivo = $pdo->prepare("SELECT * FROM archivos  where id_documento = '$id_document'");
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


        <input type="hidden" class="form_control" id="id_documento" value="<?php echo $id_document; ?>" disabled>
        <div>
            <button id="exit" class="btn btn-success btn-sm">Aceptar cambios</button>
        </div>
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
                <table style="color: white;" class="table table-sm table-borderless">
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
                            <td data-valor='<?php echo $mostrar['id_archivo']; ?>' class='ea'>
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

        $('#exit').click(function() {
            id_documento = $('#txtid_documento').val();
            $('#show_data').empty();
            $('#subnav_r').animate({
                width: "60px"
            });
            $('#subnav_r').animate({
                height: "190px"
            });

            $('#subnav_r').animate({
                backgroundColor: "#78a1dd"
            }, 700);

            $('#close_doc_reg').hide();
            $('#close_doc_reg').animate({
                left: "5px"
            });
            if (localStorage.getItem("window") == 2) {
            $('#iframeI').animate({
                width: "70%"
            });

        } else {
            $('#iframeI').animate({
                width: "50%"
            });

            $('#iframeD').animate({
                left: "57%"
            }, 1000);

            $('#iframeD').animate({
                width: "42%"
            }, 1000);

        }

           
            $('#subnav_r').animate({
                top: "280px"
            }, 100);

            $('#edt').animate({
                top: "50px"
            })
            $('#edt2').animate({
                top: "110px"
            })

            $('#edt').show(500);
            $('#edt2').show(500);
            $('#ver_res').show(500);

            //$('#cambiar_folio').html(s);
            setTimeout(function() {
                if (id_documento != "") {
                    $.post(
                        "../Model/vista_documento.php", {
                            valorBusqueda: id_documento
                        },
                        function(mensaje2) {
                            $("#resultadoBusqueda").empty();
                            $("#resultadoBusqueda").html(mensaje2);
                        }
                    );
                }
            }, 2000);
        })


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



        $('#subir').click(function() {
            var datos = $('#archivo').prop('files')[0];
            var documento = $('#id_documento').val();
            //alert(JSON.stringify(datos));
            //alert(documento);
            var form_data = new FormData();
            form_data.append('file', datos);
            form_data.append('documento', documento);
            $.ajax({
                data: form_data,
                url: "../Controller/subir_a_reg.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(r) {
                    swal("Archivo vinculado correctamente", "", "success");
                    $('#archivos_registrados').html(r);
                    //alert('' + r);
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