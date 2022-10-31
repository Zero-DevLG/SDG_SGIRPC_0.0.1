function resizeMain(option) {
    option_action = option;
    if (option_action == 1) {
        if (localStorage.getItem("window") == 2) {

            $('#subnav_r').animate({
                top: "80px"
            }, 100);

            $('#subnav_r').animate({
                backgroundColor: "#43464d"
            }, 100);


            $('#close_doc_reg').show(2000);


            if (localStorage.getItem("window") == 2) {
                $('#close_doc_reg').animate({
                    left: "75%"
                })

            } else {
                $('#close_doc_reg').animate({
                    left: "80%"
                })
                

            }
           
            $('#subnav_r').animate({
                width: "800px"
            }, 100);
            $('#subnav_r').animate({
                height: "1000px"
            }, 100);

            $('#show_data').show();

            $('#subnav_r').css("z-index", 1);


        } else {
            $('#subnav_r').animate({
                top: "80px"
            }, 100);

            $('#subnav_r').animate({
                backgroundColor: "#43464d"
            }, 500);


            $('#close_doc_reg').show(2000);

            if (localStorage.getItem("window") == 2) {
                $('#close_doc_reg').animate({
                    left: "75%"
                })

            } else {
                $('#close_doc_reg').animate({
                    left: "90%"
                })
            }
            $('#subnav_r').animate({
                width: "900px"
            }, 1000);
            $('#subnav_r').animate({
                height: "1000px"
            }, 1000);

            $('#show_data').show();
            $('#subnav_r').css("z-index", 1);
        }
    }


}




function recargarLista() {
    console.log("Preparando datos");
    console.log($('#txtdireccion').val());
    $.ajax({
        type: "POST",
        url: "../Model/consultas_ajax.php",
        data: "direccion=" + $('#txtdireccion').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista3').html(r);
            console.log($('#txtdestinatario').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo.php",
        data: "direccion=" + $('#txtdireccion').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista4').html(r);
            console.log($('#txtcargod').val());
        }
    });
};



function recargarLista_2() {
    console.log("Preparando datos");
    console.log($('#txtdireccion_r').val());
    $.ajax({
        type: "POST",
        url: "../Model/consulta_dest_r.php",
        data: "direccion=" + $('#txtdireccion_r').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dr').html(r);
            console.log($('#txtdestinatario_r').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo_r.php",
        data: "direccion=" + $('#txtdireccion_r').val(),
        success: function(r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_cr').html(r);
            console.log($('#txtcargod_r').val());
        }
    });
};

var code;


$(document).ready(function() {
    var id_document = $('#txtid_documento').val();

    $('#er').click(function() {
        swal("Se procedera a eliminar el documento", {
                text: "Esta accion no puede revertirse, desea continuar?",
                icon: "warning",

                buttons: {
                    turn: {
                        text: "no eliminar",
                        value: "cancell",
                    },
                    ofc: {
                        text: "continuar",
                        value: "delete",
                    }
                },
            })
            .then((value) => {
                switch (value) {

                    case "delete":
                        form_data = new FormData();
                        form_data.append('option', 1);
                        form_data.append('id_documento', id_document);
                        $.ajax({
                            type: 'POST',
                            url: '../Controller/delete_doc.php',
                            data: form_data,
                            contentType: false,
                            processData: false,
                            success: function(e) {

                                swal(e);

                            },
                        });
                        break;

                    case "cancell":
                        swal("Accion cancelada");
                        break;

                    default:
                        swal("Accion cancelada");
                }
            });
    });






    var prev_folio = $('#prev_folio').val();
    if (prev_folio) {
        //alert(prev_folio);
        swal("Este documento ya fue turnado y se movio al apartado de generados conservando el mismo folio, por lo que se desactivaran las funciones de turnado");
        $('#ver_res').hide();
        $('#rebuild_3').show();
        $('#subnav_r').animate({
            height: "260px"
        }, 1000)
    } else {
        $('#ver_res').show();
        $('#rebuild_3').hide();
        $('#subnav_r').animate({
            height: "260px"
        }, 1000)
    }

    $('#rebuild_3').click(function() {

        swal("Se procedera a regresar el turno a la seccion de turnados", {
                text: "Se procedera a regresar el turno a la seccion de turnados \n desea continuar?",
                icon: "warning",
                buttons: {
                    cancel: "cancelar",
                    defeat: "Regresar a turnados",
                },
            })
            .then((value) => {
                switch (value) {

                    case "defeat":
                        form_data = new FormData();
                        form_data.append('option', 3);
                        form_data.append('id_documento', id_document);
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
                    default:
                        swal("Accion cancelada");
                }
            });
    })



    if (localStorage.getItem("window") == 2) {
        $('#resize').show();
    } else {
        $('#resize').hide();
    }
    /*
    setTimeout(() => {
        setInterval(() => {

            $.ajax({
                type: 'POST',
                url: '../Controller/num_usr.php',
                data: { 'id_documento': id_document },
                success: function (e) {
                    console.log(e);
                    $('#number_usr').empty();
                    $('#number_usr').html(e);


                },
            });
        }, 2000);
    }, 2000)
*/


    console.log("ID: " + id_document);
    recargarLista();
    recargarLista_2();
    $('#ver_res').click(function() {
        if (id_document != "") {
            $('#edt').hide(500);
            $('#edt2').hide(500);
            resizeMain(1);


            setTimeout(() => {
                $.ajax({
                    type: 'POST',
                    url: '../Controller/as_ins.php',
                    data: { 'id_documento': id_document },
                    success: function(e) {
                        //alert("Correct");
                        //$('#show_data').empty();
                        $('#show_data').html(e);

                    },
                });
                console.log("Tipo" + $('#tipe_doc').val());
                console.log("Type: " + $('#tipe_doc').val());
                type_doc = $('#tipe_doc').val();

                if (type_doc == "Copia de conocimiento") {
                    swal("Se detecto que el documento es del tipo: " + type_doc + " se ha activado la opcion para moverlo a copias de conocimiento sin turnar");

                }
                $('#tipe_doc').val(type_doc);
                setTimeout(() => {
                    console.log("id" + id_document);
                    $.ajax({
                        type: "POST",
                        url: "../Model/validar_instruccion.php",
                        data: {
                            'id_documento': id_document
                        },
                        success: function(r) {
                            $('#btn_asignar').html(r);
                        }
                    });
                }, 500)
                console.log($('#btn_asignar').html());


            }, 1500)


            setTimeout(() => {
                $.ajax({
                    data: {
                        'id_documento': id_document
                    },
                    type: "POST",
                    url: "../Model/participantes.php",
                    success: function(r) {
                        //alert("Datos enviados exitosamente para cargar particip[antes");
                        $('#part').html(r);
                    }
                });

            }, 1800)
        } else {
            swal({
                title: 'Error!',
                text: 'Datos invalidos',
                icon: 'warning',
                button: 'aceptar!',
            });
        }





    });

    $('#close_doc_reg').click(function() {
        if (prev_folio) {
            //alert(prev_folio);
            //swal("Este documento ya fue turnado y se movio al apartado de generados conservando el mismo folio, por lo que se desactivaran las funciones de turnado");
            $('#ver_res').hide();
            $('#rebuild_3').show();
            $('#subnav_r').animate({
                height: "220px"
            }, 1000)
        } else {
            $('#ver_res').show();
            $('#rebuild_3').hide();
            $('#subnav_r').animate({
                height: "190px"
            }, 1000)
        }
        $('#subnav_r').animate({
            width: "60px"
        });
        $('#subnav_r').animate({
            height: "260px"
        });

        $('#subnav_r').animate({
            backgroundColor: "#78a1dd"
        }, 700);

        $('#close_doc_reg').hide();
        $('#close_doc_reg').animate({
            left: "5px"
        });
        if (localStorage.getItem("window") == 2) {
        } else {
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
        //$('#ver_res').show(500);

        $('#subnav_r').css("z-index", 0);
        $('#show_data').empty();

    })

    $('#edt').click(function() {
        $('#ver_res').hide(500);
        $('#edt2').hide(500);
        resizeMain(1);
        $('#edt').animate({
            top: "10px"
        }, 800);
        setTimeout(() => {
            $.ajax({
                type: 'POST',
                url: '../Controller/edt_reg.php',
                data: {
                    'id_documento': id_document
                },
                success: function(e) {
                    $('#show_data').html(e);
                },
            });
        }, 2000)



    });

    $('#min').click(function() {
        $('#resultadoBusqueda').empty();
        $('#img_null').css("width", "50px");
        $('#img_null').css("height", "50px");
        $('#resultadoBusqueda').html('<img id="img_null" src="../img/iconos/preview.png" style="width: 50px; height: 50px;">');
        //$('#img_null').attr("src", "../img/iconos/preview.png");
        $('#img_null').animate({
            left: "35%"
        }, 200);
    });

    $('#edt2').click(function() {
        $('#ver_res').hide(500);
        $('#edt').hide(500);
        resizeMain(1);
        $('#edt2').animate({
            top: "10px"
        }, 800);
        setTimeout(() => {
            $.ajax({
                type: 'POST',
                url: '../Model/validar_archivo_reg.php',
                data: {
                    'id_documento': id_document
                },
                success: function(e) {
                    $('#show_data').html(e);
                },
            });
        }, 2000)

    });


    /*
        $('#edt2').click(function() {
            $('#modalAdjuntar').modal('show');
            var id_document = $('#txtid_documento').val();
            //alert(id_document);
            console.log(id_document);
            $.ajax({
                type: "POST",
                url: "../Model/validar_archivo_reg.php",
                data: {
                    'id_document': id_document
                },
                success: function(r) {
                    console.log(id_document);
                    $('#formArchivo').html(r);
                }
            });
        });
    */

    $('#txtorganismo2').change(function() {
        $('#otro_2').val('');
    });



    $('#txtorganismo2').change(function() {
        var valor_o = $('#txtorganismo2').val();
        console.log(valor_o);
        if (valor_o == 24) {
            console.log("verdadero");
            $("#otro_2").prop('disabled', false);
            swal("Se ha activado la casilla 'otro' para la insercion manual del organismo");
        } else {
            $("#otro_2").prop('disabled', true);
        }
    });




    $('#txtdireccion').change(function() {
        let val = $('#txtdireccion').val();
        if (val == 1) {
            recargarLista();
            $('#target').show();
        } else {
            recargarLista();
            $('#target').hide();

        }
    });


    $('#txtdireccion_r').change(function() {
        recargarLista_2();
        //$('#target').show();

    });

    $('#target').hide();




    $('#btnCC').click(function() {
        let id_document = $('#txtid_documento').val();
        $.ajax({
            type: 'POST',
            url: '../Controller/move_cc.php',
            data: {
                'id_document': id_document
            },
            success: function() {
                swal({
                    title: 'Envio Completado!',
                    text: 'El documento se movio correctamente al apartado de copias de conocimiento',
                    icon: 'success',
                    button: 'aceptar!',
                });
            },
        });
    });



    $('#txtinstruccion').change(function() {
        let ins = $('#txtinstruccion').val();
        if (ins == 11) {
            $("#otro_ins").prop('disabled', false);
            swal(
                "Se ha activado la casilla 'otro' para la insercion manual de la instruccion"
            );
        } else {
            $("#otro_ins").prop('disabled', true);
        }
    });

    $('#op_g').change(function() {
        var dir = $('#txtdireccion').val();
        var opc = $('#op_g').val();

        if (opc == 3) {
            let bis = $('#bis_folio').val();
            $('#folio_gen').val(bis);
        } else {

            if (opc == 1) {
                dir = 100;
            } else {
                dir = $('#txtdireccion').val();
            }
            console.log(dir);
            $.ajax({
                data: {
                    'direccion': dir
                },
                url: '../Controller/folio_dir.php',
                type: 'POST',
                success: function(message) {
                    var new_folio = message.replace(/['"]+/g, '');
                    console.log(new_folio);
                    $('#folio_gen').val(new_folio);
                },
            });
        }

    });

    $('#txtdireccion').change(function() {
        var dir = $('#txtdireccion').val();
        var opc = $('#op_g').val();
        if (opc == 1) {
            dir = 100;
        } else {
            dir = $('#txtdireccion').val();
        }
        console.log(dir);
        $.ajax({
            data: {
                'direccion': dir
            },
            url: '../Controller/folio_dir.php',
            type: 'POST',
            success: function(message) {
                var new_folio = message.replace(/['"]+/g, '');
                console.log(new_folio);
                $('#folio_gen').val(new_folio);
            },
        });
    });


    $('#switch').change(function() {
        if ($('#switch').prop('checked')) {

            $("#txtfolio").prop('disabled', false);
            //alert("Esta seleccionado");
        } else {
            $("#txtfolio").prop('disabled', true);
            //alert("Esta sin seleccionar");
        }


        //alert($('#switch').val());
    });


    //


    $('#as_instruccion').click(function() {
        var id_documento = $('#txtid_documento').val();
        $.ajax({
            type: "POST",
            url: "../Model/validar_instruccion.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                $('#btn_asignar').html(r);
            }
        });



        //alert("Hola");
    });


    $("#myBtn6").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#modalRespuesta').modal('show');
        txtid_documento = $('#txtid_documento').val();
        /*$.ajax({
            type: "POST",
            url: "../Model/validar_archivo.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente para cargar archivo");
                $('#formArchivo').html(r);
            }
        });*/
        //alert(txtid_documento);
        $.ajax({
            data: {
                'id_documento': txtid_documento
            },
            type: "POST",
            url: "../Model/participantes.php",
            success: function(r) {
                //alert("Datos enviados exitosamente para cargar particip[antes");
                $('#part').html(r);
            }
        });



    });


    $('#btnEd').click(function() {
        $('#ModalEd').modal('show');
    });


    $("#myBtn").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $('#myModal').modal('show');
    });

    $("#myBtn2").click(function() {
        event.preventDefault();
        jQuery.noConflict();
        $.ajax({
            type: "POST",
            url: "participantes.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                alert(
                    "Datos enviad2os exitosamente para cargar particip[antes"
                );
                $('#part').html(r);
            }
        });
        $.ajax({
            type: "POST",
            url: "validar_archivo.php",
            data: "id_documento=" + $('#txtid_documento').val(),
            success: function(r) {
                console.log("Datos enviados exitosamente para cargar archivo");
                $('#formArchivo').html(r);
            }
        });






        $('#ModalArchivo').modal('show');


    });




});