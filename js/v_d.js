$(document).ready(function(){
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
    
    
    $('#txtorganismo2').change(function() {
        $('#otro_2').val('');
    });
    $('#btn_edt_dir').click(function() {
        let d1 = $('#direccion_edt_doc').val();
        let txtid_documento = $('#txtid_documento').val();
        var textoBusqueda = txtid_documento;
        console.log(textoBusqueda, d1);
        let form_data = new FormData();
        form_data.append('id_documento', txtid_documento);
        form_data.append('direccion', d1);
        $.ajax({
            data: form_data,
            url: '../Controller/edt_dir.php',
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(message) {
                swal("Direccion editada");
    
            },
        });
    
    });
    
    
    
    
    
    
        $('#target').hide();
    
        $('#txtinstruccion').change(function() {
            let ins = $('#txtinstruccion').val();
            if (ins == 11) {
                $("#otro_ins").prop('disabled', false);
                swal("Se ha activado la casilla 'otro' para la insercion manual de la instruccion");
            } else {
                $("#otro_ins").prop('disabled', true);
            }
        });
    
        $('#op_g').change(function() {
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
    
        $('#btnED').click(function() {
            txtid_documento = $('#txtid_documento').val();
            txtorganismo = $('#txtorganismo2').val();
            otro_o = $('#otro_2').val();
            txtfolio = $('#txtfolio2').val();
            txtoficio = $('#txtoficio2').val();
            txttipo = $('#txttipo2').val();
            txtremitente = $('#txtremitente2').val();
            txtcargor = $('#txtcargor2').val();
            txtasunto = $('#txtanexos2').val();
            txtcomentarios = $('#txtcomentarios2').val();
            //alert ("Asunto: " + txtasunto);
            //alert(txtorganismo + otro_o + txtfolio + txtoficio + txttipo + txtremitente + txtcargor + txtasunto);
            var form_data = new FormData();
            form_data.append('id_documento', txtid_documento);
            form_data.append('organismo', txtorganismo);
            form_data.append('otro', otro_o);
            form_data.append('folio', txtfolio, );
            form_data.append('oficio', txtoficio);
            form_data.append('tipo', txttipo);
            form_data.append('remitente', txtremitente);
            form_data.append('cargor', txtcargor);
            form_data.append('asunto', txtasunto);
            form_data.append('anexos', txtasunto);
            form_data.append('comentarios', txtcomentarios);
            var textoBusqueda = txtid_documento;
            console.log(JSON.stringify(form_data));
            $.ajax({
                data: form_data,
                url: "../Model/editar_documento.php",
                type: "POST",
                contentType: false,
                processData: false,
                success: function(s) {
                    swal(s);
                },
            });
    
            $("#ModalEd").modal('hide');
    
    
    
            //$('#cambiar_folio').html(s);
            setTimeout(function() {
                if (textoBusqueda != "") {
                    $.post(
                        "../Model/vista_documento.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            $("#resultadoBusqueda").empty();
                            $("#resultadoBusqueda").html(mensaje2);
                        }
                    );
                }
            }, 900);
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
    
        //Validar Formulario
        $('#txtfolio').keyup(function() {
            var folio = $('#txtfolio').val();
            console.log(folio);
            $.ajax({
                url: "../Model/comprobar_folio.php",
                type: "POST",
                data: "folio=" + $('#txtfolio').val(),
                dataType: 'json',
                success: function(response) {
                    console.log("el folio es: " + folio);
                    console.log(response);
    
                    if (response >= 1) {
                        $('#respuesta_folio').empty();
                        $('#respuesta_folio').html("<h5 style='color:red;'>El folio: " +
                            folio +
                            " esta ocupado <img src='../img/iconos/-.png' style='width:35px;'></h5>"
                        );
                        $('#btnED').attr("disabled", true);
                        //alert("Folio ocupado");
                    } else {
                        //no hacer nada
                        $('#respuesta_folio').empty();
                        $('#respuesta_folio').html("<h5 style='color:green;'>El folio: " +
                            folio +
                            " esta disponible <img src='../img/iconos/success.png' style='width:15px;'></h5>"
                        );
                        $('#btnED').attr("disabled", false);
                    }
                },
            });
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
                    alert("Datos enviad2os exitosamente para cargar particip[antes");
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
    
    
    
    
        $("#myBtn5").click(function() {
            event.preventDefault();
            jQuery.noConflict();
            $('#Modalv_i').modal('show');
            console.log("Enviando datos al control de instrucciones");
            console.log("Dato enviado: " + $('#id_doc').val(), );
            $.ajax({
                type: "POST",
                url: "../js/ver_i.php",
                data: "id_documento=" + $('#id_doc').val(),
                success: function(r) {
                    console.log("Datos enviados exitosamente para ver instruccion");
                    $('#tableIns').html(r);
                }
            });
    
    
        });
    
    
    
        $("#myBtn3").click(function() {
            event.preventDefault();
            jQuery.noConflict();
            $('#ModalGPS').modal('show');
            console.log("Enviando datos al GPS");
            console.log("Dato enviado: " + $('#id_doc').val(), );
            $.ajax({
                type: "POST",
                url: "../Model/gps.php",
                data: "id_documento=" + $('#id_doc').val(),
                success: function(r) {
                    console.log("Datos enviados exitosamente");
                    $('#contenido-gps').html(r);
                }
            });
    
    
        });
    
    
        $("#area").click(function() {
            var isChecked = document.getElementById("area").checked;
            console.log(isChecked);
            document.getElementById("area2").disabled = !isChecked;
        });
    
    
    
        recargarLista();
        recargarLista_2();
    
    
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
    
    
    
    
    
})

