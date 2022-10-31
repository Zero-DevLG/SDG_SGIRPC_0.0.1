
function resizeMain_turn(option) {
    option_action = option;
    if (option_action == 1) {
       
            $('#subnav_r_as').animate({
                top: "80px"
            }, 100);

            $('#subnav_r_as').animate({
                backgroundColor: "#43464d"
            }, 500);


            $('#close_doc_turn').show(2000);

            if (localStorage.getItem("window") == 2) {
                $('#close_doc_turn').animate({
                    left: "75%"
                })

            } else {
                $('#close_doc_turn').animate({
                    left: "90%"
                })
            }
            $('#subnav_r_as').animate({
                width: "900px"
            }, 1000);
            $('#subnav_r_as').animate({
                height: "1100px"
            }, 1000);

            $('#show_data_turn').show();
            $('#subnav_r_as').css("z-index", 1);


        
    }


}


$('#submit_d_in').click(function() {
    swal({
        title: 'Error!!',
        text: 'Este documento ya ha sido enviado',
        icon: 'warning',
        button: 'aceptar',
    });
});
$('#submit_d').click(function() {
    swal("Deseas enviar este documento a la direccion turnada?", {
            buttons: {
                catch: {
                    text: "Enviar documento a direccion",
                    value: "catch",
                },
                cancel: "no, seguir editando documento!",

            },
        })
        .then((value) => {
            switch (value) {

                case "catch":
                    txtid_documento = $('#txtid_documento').val();
                    alert(txtid_documento);
                    $.ajax({
                        type: 'POST',
                        url: '../Controller/submit_doc.php',
                        data: {
                            'id_documento': txtid_documento
                        },
                        success: function(e) {
                            swal(e);
                            swal("Enviado",
                                "El documento ha sido enviado correctamente a la direccion correspondiente",
                                "success");
                        },
                    });
                    break;

                default:
                    swal("El documento no se ha enviado");
            }
        });
});

function recargarLista_33() {
    console.log("Preparando datos");
    console.log($('#txtdireccion_r2').val());
    $.ajax({
        type: "POST",
        url: "../Model/consulta_dest_r2.php",
        data: "direccion=" + $('#txtdireccion_r2').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dr2').html(r);
            console.log($('#txtdestinatario_r').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo_r2.php",
        data: "direccion=" + $('#txtdireccion_r2').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_cr2').html(r);
            console.log($('#txtcargod_r').val());
        }
    });
};


function recargarLista22() {
    console.log("Preparando datos");
    console.log($('#txtdireccion2').val());
    $.ajax({
        type: "POST",
        url: "../Model/consulta_ajax2.php",
        data: "direccion=" + $('#txtdireccion2').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dest').html(r);
            // console.log($('#txtdestinatario').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo2.php",
        data: "direccion=" + $('#txtdireccion2').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_cargo').html(r);
            // console.log($('#txtcargod').val());
        }
    });
};



$('#txtdireccion_r2').change(function() {
    recargarLista_33();
    //$('#target').show();

});

function HideMenu()
{
    $('#content-icons').hide();
}

function ShowMenu()
{
    $('#content-icons').show();
}



$('#cancell_doc').click(function() {
    $('#ModalCancell').modal('show');
});

$('#btnCancell').click(function() {
    let justify = $('textarea#justify').val();
    console.log(justify);
    if (justify == "") {
        swal("El campo de justificacion no puede ir vacio");
    } else {
        //swal("Documento cancelado !!!");
        let id_document = $('#txtid_documento').val();
        let form_data = new FormData();
        form_data.append('justify', justify);
        form_data.append('id_document', id_document);
        $.ajax({
            type: 'POST',
            url: '../Controller/cancell_document.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(e) {
                swal({
                    title: 'Datos validados correctamente!',
                    text: 'Datos comprobados, se ha cancelado el documento',
                    icon: 'success',
                    button: 'aceptar!',
                });
                location.reload();
            },
        });

    }
});

function recargarLista() {
    console.log("Preparando datos");
    console.log($('#txtdireccion').val());
    $.ajax({
        type: "POST",
        url: "../Model/consultas_ajax.php",
        data: "direccion=" + $('#txtdireccion').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista2').html(r);
        }
    });
};


$(document).ready(function() {
    recargarLista();

    $('#cancell_doc').click(function() {

        swal("Motivo por el cual se cancelara este documento(recuerde que una vez cancelado para deshacer esta accion se debe notificar al area de Informatica):", {
                icon: "warning",
                content: "input",
            })
            .then((value) => {
                var m = value;
                var id = $('#id_documento').val();
                form_data = new FormData();
                form_data.append('j', m);
                form_data.append('id', id);
                $.ajax({
                    type: 'POST',
                    url: '../Controller/c_doc.php',
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(e) {
                        swal(e);
                    },
                });

            });
    });



    $('#gen_bis').click(function() {
        swal("Que tipo de bis deseas generar?", {
                text: "Se procedera a generar un bis de este documento \n que folio desea usar para el bis?",
                icon: "warning",

                buttons: {
                    turn: {
                        text: "Bis del folio de turno",
                        value: "turn",
                    },
                    ofc: {
                        text: "Bis del folio de oficialia",
                        value: "ofc",
                    }
                },
            })
            .then((value) => {
                switch (value) {

                    case "turn":
                        form_data = new FormData();
                        form_data.append('option', 1);
                        form_data.append('id_documento', $('#id_documento').val());
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/gen_bis.php',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(e) {

                                swal(e);

                            },
                        });
                        break;

                    case "ofc":
                        form_data = new FormData();
                        form_data.append('option', 2);
                        form_data.append('id_documento', $('#id_documento').val());
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/gen_bis.php',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(e) {

                                swal(e);

                            },
                        });

                        break;

                    default:
                        swal("Accion cancelada");
                }
            });
    });

    


    $('#txtdireccion').change(function() {
        recargarLista();
    });

    $('#close_doc_turn').click(function() {

        if (localStorage.getItem("window") == 2) {
            $('#subnav_r_as').animate({
                width: "60px"
            });
            $('#subnav_r_as').animate({
                height: "400px"
            });

            $('#subnav_r_as').animate({
                backgroundColor: "#7d2b41"
            }, 700);

            $('#close_doc_turn').hide();
            $('#close_doc_turn').animate({
                left: "5px"
            });
            $('#subnav_r_as').animate({
                top: "280px"
            }, 100);
           
            ShowMenu();
           
          

            $('#subnav_r_as').css("z-index", 0);
            $('#show_data_turn').empty();
        } else {
            $('#subnav_r_as').animate({
                width: "60px"
            });
            $('#subnav_r_as').animate({
                height: "400px"
            });

            $('#subnav_r_as').animate({
                backgroundColor: "#7d2b41"
            }, 700);

            $('#close_doc_turn').hide();
            $('#close_doc_turn').animate({
                left: "5px"
            });

           
            $('#subnav_r_as').animate({
                top: "280px"
            }, 100);
            $('#subnav_r_as').css("z-index", 0);
            $('#show_data_turn').empty();
            ShowMenu();
        }




    })

    $('#rebuild_2').click(function() {
        /* resizeMain_turn(1);
         $('#cancell_doc').hide(500);
         $('#gen_pdf').hide(500);
         $('#submit_d').hide(500);
         $('#submit_d_in').hide(500);
         $('#history').hide(500);
         $('#response').hide(500);
         $('#edt_turn').hide(500);
         */

        swal("Se procedera a regresar el turno a la seccion de generados", {
                text: "Se procedera a regresar el turno a la seccion de generados \n desea conservar el folio actual?",
                icon: "warning",
                buttons: {
                    cancel: "cancelar",
                    catch: {
                        text: "Conservar folio",
                        value: "catch",
                    },
                    defeat: "Liberar folio",
                },
            })
            .then((value) => {
                switch (value) {

                    case "defeat":
                        form_data = new FormData();
                        form_data.append('option', 1);
                        form_data.append('id_documento', $('#id_documento').val());
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/re_folio.php',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(e) {
                                $('#resultadoBusqueda').empty();
                                swal(e);

                            },
                        });
                        break;

                    case "catch":
                        form_data = new FormData();
                        form_data.append('option', 2);
                        form_data.append('id_documento', $('#id_documento').val());
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/re_folio.php',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(e) {
                                $('#resultadoBusqueda').empty();
                                swal(e);

                            },
                        });
                        break;

                    default:
                        swal("Accion cancelada");
                }
            });

    });


    // $('#response').click(function(){
    //     $('#ModalR').modal('show');
    //     doc_in = localStorage.getItem("id_doc");
    //     $('#id_doc').val(doc_in);
    //     //$('#ModalR').remove('.modal-backdrop fade in');
    // })

    

    $('#reply_doc').click(function(){
        console.log('Click reply');
        id_documento = $('#id_documento').val();
        $.ajax({
            type: 'POST',
            url: '../Controller/reply_doc_data.php',
            data: { 'id_documento': id_documento},
            success: function(e){
                $('#modal_reply').modal('show');
                $('#data_modal_d').html(e);
            }
        });
    });



    $('#edt_turn').click(function() {
        resizeMain_turn(1);
        HideMenu();
        id_documento = $('#id_documento').val();
        setTimeout(() => {


            $.ajax({
                type: 'POST',
                url: '../Controller/edt_turn.php',
                data: { 'id_documento': id_documento },
                success: function(e) {
                    console.log(e);
                    $('#show_data_turn').empty();
                    $('#show_data_turn').html(e);
                },
            });
            setTimeout(() => {
                $.ajax({
                    data: {
                        'id_documento': id_documento
                    },
                    type: "POST",
                    url: "../Model/participantes.php",
                    success: function(r) {
                        //swal("exito")
                        //alert("Datos enviados exitosamente para cargar particip[antes");
                        $('#part').html(r);
                    }
                });
            }, 1000);
        }, 2000)
    })







    $('#edt_turn3').click(function() {
        //alert($('#edt_turn').attr("alt"));
        $('#modalEdtT').modal('show');


    })





    recargarLista22();
    recargarLista_33();


    $('#ModalArchivo').modal('show');

    $("#enviar_m").click(function() {
        event.preventDefault();
        jQuery.noConflict();

        var mensaje = $("#mensaje").val();
        var txtid_documento = $('#txtid_documento').val();


        $.post(
            "../Controller/mensajes.php", {
                id_documento: txtid_documento,
                mensaje: mensaje
            },
            function(historial) {
                console.log(historial);
                $('#contenidoMensaje').html(historial);
            }
        )



    });

    $("#myBtn7").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        var txtid_documento = $('#txtid_documento').val();

        $.post(
            "../Controller/ver_mensajes.php", {
                id_documento: txtid_documento,
            },
            function(historial) {
                console.log(historial);
                $('#contenidoMensaje').html(historial);


            }
        )


        $('#ModalMensaje').modal('show');
        var div = document.getElementById('modal_mensaje');
        div.scrollTop = '9999';
    });










    $("#area").click(function() {
        var isChecked = document.getElementById("area").checked;
        console.log(isChecked);
        document.getElementById("area2").disabled = !isChecked;
    });
});