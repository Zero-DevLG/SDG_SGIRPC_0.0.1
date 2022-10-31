<?php
error_reporting(E_ERROR);
session_start();
date_default_timezone_set("America/Mexico_City");
include("Conexion.php");


$id_documento = $_POST['id_documento'];

$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$id_documento'");
$consulta_archivo->execute();
$count = $consulta_archivo->rowCount();



?>


<button type="submit" style="position:relative;top:30px; left:310px;" class="btn btn-success btn-sm" id="btnIns">Asignar
    instruccion</button>
<input type="text" id="id" class="form-control" value=" <?php echo $id_documento; ?>" disabled>

<script>
$(document).ready(function() {
    console.log($('#id').val());
    $("#btnIns").click(function(e) {
        event.preventDefault(e);
        var op_g = $('#op_g').val();
        var folio = $('#folio_gen').val();
        var folio2 = $('#folio_gen2').val();
        var op_folio = $('#f_open').val();
        var txtdireccion = $('#txtdireccion').val();
        var txtid_documento = $('#txtid_documento').val();
        var txtdestinatario = $('#txtdestinatario').val();
        var txtcargod = $('#txtcargod').val();
        var txtinstruccion = $('#txtinstruccion').val();
        //var txtasunto = $('textarea#txtasunto').val();
        var txtasunto = $('textarea#txtasunto').val().replace(/(\r\n|\n|\r)/gm, "");
        var txtasunto = txtasunto.replace(/['"]+/g, '')
        var txtprioridad = $('#txtprioridad').val();
        var txtfecha_limite = $('#txtfecha_limite').val();
        var txtdireccion_r = $('#txtdireccion_r').val();
        var txtdestinatario_r = $('#txtdestinatario_r').val();
        var txtcargod_r = $('#txtcargod_r').val();
        var otro = $('#otro_ins').val();
        console.log(txtdireccion);
        console.log(txtinstruccion, txtasunto);
        console.log(folio, txtdireccion, txtcargod);
        swal(txtfecha_limite);
  
        if(txtfecha_limite == null || txtdireccion == null || txtdestinatario == null || txtcargod == null || txtinstruccion == null || txtasunto == null ){
            swal({
            title: 'Error',
            text: 'Favor de llenar todos los campos',
            icon: 'error',
            button: 'aceptar!',
            });
        }else{
            $.post(
            "../Controller/i_e.php", {
                op_g: op_g,
                f_open: op_folio,
                folio: folio,
                folio2: folio2,
                id_documento: txtid_documento,
                direccion: txtdireccion,
                destinatario: txtdestinatario,
                cargo_d: txtcargod,
                instruccion: txtinstruccion,
                asunto: txtasunto,
                prioridad: txtprioridad,
                fecha_limite: txtfecha_limite,
                direccion_r: txtdireccion_r,
                cargod_r: txtcargod_r,
                destinatario_r: txtdestinatario_r,
                otro: otro
            },
            function(mensaje2) {
                console.log(mensaje2);
                swal(mensaje2);
                swal({
                    title: "Documento asignado correctamente",
                    text: mensaje2,
                    icon: "success",
                    type: "success"
                }).then(function() {
                    //location.reload();
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
                            $('#resultadoBusqueda').empty();
                            $('#img_null').css("width", "50px");
                            $('#img_null').css("height", "50px");
                            $('#resultadoBusqueda').html('<img id="img_null" src="../img/iconos/preview.png" style="width: 50px; height: 50px;">');
                            //$('#img_null').attr("src", "../img/iconos/preview.png");
                            $('#img_null').animate({
                                left: "35%"
                            }, 800);
                            $('#iframeD').animate({
                                height: "19%"
                                }, 1000);
                            $('#iframeD').animate({
                                width: "19%"
                            }, 1000);
                            $('#iframeD').animate({
                                top: "10px"
                                }, 1000);
                            $('#iframeD').animate({
                                left: "80%"
                            }, 200);

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
                    $('#resultadoBusqueda').html(
                        '<img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">'
                    )
                    }
                   
                    $('#subnav_r').animate({
                        top: "280px"
                    }, 100);

                    
                });
            },
        );
        }


       
    });

});
</script>