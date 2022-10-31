<?php
    session_start();
    $_SESSION['id_doc_pdf']= $_POST['id'];
    date_default_timezone_set("America/Mexico_City");

include("../model/Conexion.php");

//$_SESSION['id_doc_pdf']= $_POST['id'];
$id_document = $_SESSION['id_doc_pdf'];
$Fecha = date('Y-m-d');


$consulta_archivo = $pdo->prepare("SELECT * FROM doc_resp  where id_documento = '$id_document'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

$consulta_archivo_a = $pdo->prepare("SELECT * FROM archivos  where id_documento = '$id_document' AND tipo_archivo='3'");
$consulta_archivo_a->execute();
$lista_archivo_a = $consulta_archivo_a->fetchAll(PDO::FETCH_ASSOC);

$count2 = $consulta_archivo_a->rowCount();

?>

                <?php
                    echo $id_document;
                ?>

                <h4>Subir Documento Digitalizado:</h4>
                <form action="#" id="form_subir">
                    <input type="hidden" value="<?php echo $id_document; ?>" id="id_documento">
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
                        <div id="archivos_registrado">
                            <table style="color: white;" class="table table-sm table-borderless">
                                <tbody>
                                    <?php foreach ($lista_archivo_a as $mostrar) { ?>
                                    <tr>

                                        <td><a href="../repos_resp/<?php echo $mostrar['a_nombre'];  ?>"  target="_blank"><?php echo $mostrar['a_nombre']; ?></a>
                                        </td>
                                        <td data-valor='<?php echo $mostrar['id_archivo']; ?>' class='ea'>
                                        <?php echo $mostrar['id_archivo']; ?><button value="btnEliminar" id="eliminar_a" class="btn"><img src="../img/garbage.png"
                                                    title="Eliminar" style="width: 20px;"></button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
                let data = $(this).attr("data-valor");
                let option = '2';
                var documento = $('#id_documento').val();
                console.log('test');
                var form_data = new FormData();
                console.log('test');
                form_data.append('id',data);
                form_data.append('option',option);
                console.log('test');
                // alert(form_data);
                $.ajax({
                    type:       'POST',
                    url:        '../Controller/funciones_archivo_resp.php',
                    data:       form_data,
                    contentType: false,
                    processData: false,
                    success:    function(e){
                        console.log(e);
                       
                        $('#modal-file').modal('hide');
                        swal(e);
                        setTimeout(function() {
                    
                            $.post(
                                "../View/vista_atendido.php", {
                                    valorBusqueda: documento
                                },
                                function(mensaje2) {
                                    $("#resultadoBusqueda").empty();
                                    $("#resultadoBusqueda").html(mensaje2);
                                }
                            );
                        
                    }, 100);
                        
                    }
                });

        //     var documento = $('#id_documento').val();
        //     var form_data = new FormData();
        //     form_data.append('documento', documento);
        //     form_data.append('archivo', data);
        //     //alert(documento);
        //     //alert(data);
        //     $.ajax({
        //         data: form_data,
        //         url: "../Controller/eliminar_a_reg.php",
        //         type: "POST",
        //         contentType: false,
        //         processData: false,
        //         success: function(r) {
        //             $('#archivos_registrados').empty();
        //             $('#archivos_registrados').html(r);
        //         }
        //     });
        //     /*
        //     setTimeout(function() {
        //         if (documento != "") {
        //             $.post(
        //                 "../Model/vista_documento.php", {
        //                     valorBusqueda: documento
        //                 },
        //                 function(mensaje2) {
        //                     $("#resultadoBusqueda").empty();
        //                     $("#resultadoBusqueda").html(mensaje2);
        //                 }
        //             );
        //         }
        //     }, 900);
        // */
        });



        $('#subir').click(function() {
            var datos = $('#archivo').prop('files')[0];
            if(datos)
            {
                var documento = $('#id_documento').val();
            // alert(JSON.stringify(datos));
            // alert(documento);
            var form_data = new FormData();
            var tipo = '3';
            form_data.append('file', datos);
            form_data.append('tipo',tipo);
            form_data.append('documento', documento);
            $.ajax({
                data: form_data,
                url: "../Controller/upload_resp.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(r) {
                    swal('Completado','archivo vinculado correctamente','success');
                    $('#modal-file').modal('hide');
                    //$('#archivos_registrados').html(r);
                    //alert('' + r);
                    setTimeout(function() {
                if (documento != "") {
                    $.post(
                        "../View/vista_atendido.php", {
                            valorBusqueda: documento
                        },
                        function(mensaje2) {
                            $("#resultadoBusqueda").empty();
                            $("#resultadoBusqueda").html(mensaje2);
                        }
                    );
                }
            }, 100);
                }
            });
           
            }else{
                swal('Error','Por favor adjunte un archivo para continuar','error')
            }
           
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
