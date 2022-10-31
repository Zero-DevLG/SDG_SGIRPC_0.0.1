<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}
?>

<head>
    <meta charset="utf-8">
    <title>Documentos</title>

    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="utf-8">
-¿

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/usr_bar.css?v=<?php echo (rand()); ?>">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="icon" href="../img/iconos/favicon.jpg" />
    <link rel="stylesheet" href="../css/dropzone.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/doc.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/dropzone.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>




</head>

<body background="../img/fondo_p2.jpg">


    <?php
    include("../Model/Consultas.php");
    //include("../View/side_var_user.php");

    ?>

    <div class="container-fluid">
        <div class="row align-content-lg-end">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">

            </div>

        </div>
    </div>





    <div id="contenido_dinamico">
        <div id="btn-content">
            <img src="../img/iconos/add.png" id="add" alt="">
            <!--<img src="../img/iconos/search_es.png" id="search" alt="">-->
            <img src="../img/iconos/close.png" alt="" id="close_add">
                <div id="formu">
                    <div class="row">
                        <div class="col-md-9">
                        <div id="num_oficialia"></div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            
                                <h1 id="title_reg">Registrar documento</h1>
                            <label id="enc_reg_doc" for="">
                            </label>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Organismo:</label>
                                        <select class="form-control" name="txtorganismo" id="org" required>
                                            <option value="0">Selecciona una opcion</option>
                                            <?php foreach ($lista_organismo as $mostrar) { ?>
                                            <option value="<?php echo $mostrar['id_organismo']; ?>">
                                                <?php echo $mostrar['nombre_organismo']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Otro:</label>
                                        <div class="ui-widget">
                                            <input type="text" id="otro" class="form-control" disabled>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>No. de oficio</label>
                                        <input type="text" name="n_oficio" class="form-control" id="n_oficio">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Tipo de Documentos</label>
                                        <select name="txttipo" id="txttipo" class="form-control">
                                            <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                            <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                                <?php echo $mostrartipo['descripcion']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Direccion:</label>
                                        <select class="form-control" id="direccion_cat">
                                            <option value="0">Selecciona una opcion</option>
                                            <?php foreach ($lista_sp as $mostrar) { ?>
                                            <option value="<?php echo $mostrar['id_direccion'] ?>">
                                                <?php echo $mostrar['detalle']; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label>Categoria</label>
                                            <select name="txtop_c" id="top_c" class="form-control">
                                                <option value="">Selecciona una opcion</option>
                                                <option value="200">Documento para direcciones</option>
                                                <option value="20">Documento para la Titular</option>
                                                <option value="52">Documento de Resolucion a la demanda ciudadana</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="hidden" name="txtfolio2" id="txtfolio2" value="" class="form-control"
                                                disabled>

                                            <input type="hidden" name="txtfolio" id="txtfolio" value="" class="form-control">
                                        </div>
                                    </div>

                                
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Fecha del oficio</label>
                                        <input name="txtfecha_o" id="txtfecha_o" class="form-control" type="date">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Fecha de recibido</label>
                                        <input name="txtfecha_r" id="txtfecha_r" class="form-control" type="date">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="txtremitente">Remitente: </label>
                                        <div class="ui-widget">
                                            <input type="text" id="txtremitente" class="form-control">
                                        </div>
                                        <!--
                                                <label>Remitente</label>
                                                <input name="txtremitente" id="txtremitente" class="form-control" type="text">
                                                -->
                                    </div>
                                    <div class="col-md-6">
                                        <label>Cargo</label>
                                        <div class="ui-widget">
                                            <input type="text" id="txtcargo_r" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Anexos:</label>
                                        <textarea class="form-control" name="txtAnexos" id="txtanexos" cols="30"
                                            rows="2"></textarea>

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Comentario:</label>
                                        <textarea class="form-control" name="txtcomentario" id="txtcomentario" cols="30"
                                            rows="5"></textarea>

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4">


                                        <input class="btn btn-success" value="Registrar documento" id="reg_doc" name="envia" />

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id=dropzone>
                                <div id="add_file_database">
                                    <button id="up_database" class="btn btn-sm btn-success" title="Subir archivos">✔</button>

                                </div>

                                    <button id="clear_drop" class="btn btn-sm btn-danger" title="Eliminar todos los archivos">✘</button>
                                    <form action="/" class="dropzone" id="drop2">

                                    <!-- <img src="../img/iconos/cloud.png" id="cloud">-->      
                                    </form>
                            </div>
                        </div>                       
                    </div>

                </div>
            
          
        </div>

        <script>
        var arrayFiles = [];
        Dropzone.options.drop2 = {

            addRemoveLinks: true,
            aceptedFile: ".pdf",
            maxFilesize: 2,
            maxFiles: 20,
            init: function() {
                $('.dz-remove').text("Remover archivo");
                this.on("addedfile", function(file) {
                    $('#add_file_database').show();
                    $('#clear_drop').show();
                    arrayFiles.push(file);
                    console.log("arrayFiles", arrayFiles);
                });
                this.on("removedfile", function(file) {
                    var index = arrayFiles.indexOf(file);
                    arrayFiles.splice(index, 1);
                    console.log("arrayFiles", arrayFiles);
                });
            }

        }
        $('#clear_drop').click(function() {
            Dropzone.forElement("#drop2").removeAllFiles(true);
        });

        $("#up_database").click(function() {
            var cat = $('#top_c').val();
            let folio = $('#txtfolio2').val();
            //alert(folio);
            if (folio == "") {
                swal("Por favor genera un folio para subir los archivos")
            } else {
                //swal("Folio detectado");
                if (arrayFiles.length > 0) {
                    var listaFiles = [];
                    var finalFor = 0;
                    for (var i = 0; i < arrayFiles.length; i++) {
                        var datosFiles = new FormData();
                        datosFiles.append("file", arrayFiles[i]);
                        datosFiles.append("folio", folio);
                        datosFiles.append("cat", cat);

                        $.ajax({
                            type: 'POST',
                            url: '../Controller/up_database.php',
                            data: datosFiles,
                            contentType: false,
                            processData: false,
                            success: function(e) {
                                listaFiles.push({
                                    "foto": e
                                });
                                l_files = JSON.stringify(listaFiles);
                                if ((finalFor + 1) == arrayFiles.length) {
                                    //addFile(l_files);
                                    finalFor = 0;
                                }
                                finalFor++;
                                Dropzone.forElement("#drop2").removeAllFiles(true);
                                swal({
                                    title: 'Archivos cargados correctamente!',
                                    text: 'Los archivos fueron vinculados correctamente al folio seleccionado ',
                                    icon: 'success',
                                    button: 'aceptar!',
                                });
                            },
                        });

                    }
                }
            }
        });
        </script>


</body>

<script>
    $(document).ready(()=>
    {
        
        var close_url = '../Controller/cerrar_sesion.php';
var base_url = '../View/doc.php';
var timeout;

function getHeight()
{
    var h = 0;
    h = $(window).height() + 15;
    $('.sidebar-p').css('height',h);
}
document.onmousemove = function(){ 

   
    clearTimeout(timeout); 
} 

// function contadorSesion() {
//    timeout = setTimeout(function () {
//         swal({
//             title: 'Alerta de Inactividad!',
//             text: 'La sesión esta a punto de expirar.',
//             autoClose: 'expirar|10000',//cuanto tiempo necesitamos para cerrar la sess automaticamente
//             icon: 'warning',
//             dangerMode:true,
//         }).then(()=>{
//             salir();
//         });
//     },800000);//3 segundos para no demorar tanto 
// }

function salir() {
    window.location.href = close_url; //esta función te saca
}


function LoadingData()
{
    $('#loading-data').show();
    setTimeout(() => {
        $('#loading-data').hide();
    }, 1000);
}   













function check_data_send() {
    let op_c = $('#top_c').val();
    let organismo = $('#org').val();
    let otro = $('#otro').val();
    let n_oficio = $('#n_oficio').val();
    let direccion_cat = $('#direccion_cat').val();
    let tipo_documento = $('#txttipo').val();
    let op_control = $('#txtfolio2').val();
    let fecha_oficio = $('#txtfecha_o').val();
    let fecha_recibido = $('#txtfecha_r').val();
    let remitente = $('#txtremitente').val();
    let cargo_r = $('#txtcargo_r').val();
    let anexos = $('#txtanexos').val();
    let comentarios = $('#txtcomentario').val();



    return [op_c, organismo, tipo_documento, fecha_oficio, fecha_recibido, remitente, cargo_r, op_control, otro, anexos, comentarios, n_oficio, direccion_cat];
    //re_sending_data(op_c,organismo,tipo_documento,fecha_oficio,fecha_recibido,remitente,cargo_r,op_control,otro);

}

function validate_data() {
    //check_data_send();
    var values = check_data_send();
    var op_c = values[0];
    var organismo = values[1];
    var tipo_documento = values[2];
    var fecha_oficio = values[3];
    var fecha_recibido = values[4];
    var remitente = values[5];
    var cargo_r = values[6];
    var op_control = values[7];
    var otro = values[8];
    var anexos = values[9];
    var comentarios = values[10];
    var n_oficio = values[11];
    var direccion_cat = values[12];


    console.log(op_c, organismo, tipo_documento, fecha_oficio, fecha_recibido, remitente, cargo_r, op_control, otro, anexos, comentarios, n_oficio, direccion_cat);



    if (op_c == 0 || organismo == 0 || tipo_documento == 0 || fecha_oficio == '' ||
        fecha_recibido == '' || remitente == '' || cargo_r == '' || op_control == '') {

        return false;

        if (organismo == 24) {
            if (otro == '') {
                return false;
            }
        }
    } else {
        let form_data = new FormData();
        form_data.append('txtorganismo', organismo);
        form_data.append('otro', otro);
        form_data.append('direccion_cat', direccion_cat);
        form_data.append('n_oficio', n_oficio);
        form_data.append('txttipo', tipo_documento);
        form_data.append('txtfolio', op_control);
        form_data.append('txtfecha_o', fecha_oficio);
        form_data.append('txtfecha_r', fecha_recibido);
        form_data.append('txtremitente', remitente);
        form_data.append('txtcargo_r', cargo_r);
        form_data.append('txtAnexos', anexos);
        form_data.append('txtcomentario', comentarios);
        form_data.append('top_c', op_c);
        //alert(op_control);
        $.ajax({
            type: "POST",
            url: "../View/upload2.php",
            data: form_data,
            contentType: false,
            processData: false,
            success: function(e) {
                swal(e);

                if(e=="Error al registrar documento")
                {
                    swal("Hubo un error en tu sesión, vuelve a iniciar sesión para registrar el documento", {
                        buttons: {
                          confirm: {
                            text: "Entendido",
                            value: "confirm",
                          }
                        },
                      })
                      .then((value) => {
                        switch (value) {
                            
                          case "confirm":
                            window.location.href = "/SGIRPC_US_dev_2022/index.php";
                            break;


                            default:
                                window.location.href = "/SGIRPC_US_dev_2022/index.php";
                        }
                      })
                   
                }else{
                    $('#toggle').toggleClass('active');
                    $('#overlay').toggleClass('active');
                    $('#menu').toggleClass('active');
                }

               
            }
        })


        $('#top_c').val('');
        $('#org').val(0);
        $('#otro').val(0);
        $('#n_oficio').val('');
        $('#txttipo').val(1);
        $('#txtfolio').val('');
        $('#txtfecha_o').val('');
        $('#txtfecha_r').val('');
        $('#txtremitente').val('');
        $('#txtcargo_r').val('');
        $('#txtanexos').val('');
        $('#txtcomentario').val('');



        return true;
    }

}


function sending_data() {
    let state = validate_data();

    for (let i = 0; i < 3; i++) {

        if (state == true) {
            /*
                        swal({
                            title: "Datos validados correctamente!",
                            text: "Datos comprobados, se procede a realizar el registro",
                            icon: "success",
                            button: "aceptar!",
                          });
                          */
            break;
        } else {
            state = validate_data();
            if (i == 2) {
                //alert("Error");
                // swal("Error");
                swal({
                    title: "Error(501):No se pudieron enviar correctamente los datos!",
                    text: "Verifique que ha llenado correctamente los campos, si el problema persiste contacte con el personal de soporte indicado",
                    icon: "warning",
                    button: "aceptar!",
                });

                //alert("Error,intentando enviar datos, Favor de revisar que los campos esten llenos correctamente, si el problema persiste pongase en contacto con el area de Soporte");
            }
            //alert("Error,intentando enviar datos de nuevo");

        }
    }
}

var data = "";
var arrayFiles = [];

function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9_\n-]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
/* Optimizar recursos
function get_develop() {

    $.ajax({
        type: 'POST',
        url: '../Controller/find_update.php',
        data: '',
        contentType: false,
        processData: false,
        success: function(e) {
            localStorage.setItem("message", e);
        },
    });
}
*/

/*
function get_message() {

    $.ajax({
        type: 'POST',
        url: '../Controller/find_update.php',
        data: '',
        contentType: false,
        processData: false,
        success: function(e) {

        },
    });
}
*/
var usr = "";



var consulta = "";
var consulta_fecha_i = "";
var consulta_fecha_l = "";

var consulta_fecharec_i = "";
var consulta_fecharec_l = "";
var consulta_tipo = "";
var consulta_direccion = "";

// ///DETECTAR CONEXIÓN
// function validateC(){
//     console.log('preparando................');
//     setInterval(() => {
//         console.log('validando...');
//         $.ajax({
//             type:   'POST',
//             url:    '../Controller/live.php',
//             success: function(e){
//                 console.log(e);
//                 switch(e){
//                     case "1":
//                         console.log('Conexion viva');
//                     break;
//                     case "2":
                       
//                     break;  
//                 }
//             }
//         }); 
//     }, 1000);
// }


$(document).ready(function() {

    //NAVEGACION

    //USR TURN
    $('#option-de').click(()=>
    {
        LoadingData();
        $.ajax({
            type:      'POST',
            url:        '../View/view_doc_ext.php',
            success:    function(e)
            {
                $('#iframeI').empty();
                $('#iframeI').html(e);
            }
        });
    });


    //USR REG
    $('#option-be').click(()=>
    {
        LoadingData();
        $.ajax({
            type:      'POST',
            url:        '../View/view_doc_reg.php',
            success:    function(e)
            {
                $('#iframeI').empty();
                $('#iframeI').html(e);
            }
        });
    });



    //END



     // Sidebar
     getHeight();
 $('.sidebar-p').hover(()=>{
    $('.sidebar-p').css('width','250px');
    // $('.img-side').hide();
    $('.title-option').show(300);
},()=>
{
    $('.title-option').hide();
    $('.sidebar-p').css('width','40px');
    // $('.img-side').show();
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





    $('#reg_res').click(function(){
        let id = $('#id_doc').val();
        let folio = $('#folio_r').val();
        let date_r = $('#f_r').val();
        let res = $('#respuesta').val();
        let form_data = new FormData();
        form_data.append('id',id);
        form_data.append('folio',folio);
        form_data.append('date_r',date_r);
        form_data.append('res',res);

        var datos = $('#archivo2').prop('files')[0];
        //alert(JSON.stringify(datos));
        //alert(documento);
        var form_data2 = new FormData();
        form_data2.append('file', datos);
        form_data2.append('documento', id);
        $.ajax({
            data: form_data2,
            url: "../Controller/subir_a_res.php",
            type: "POST",
            contentType: false,
            processData: false,
            success: function(r) {
                //swal("Archivo vinculado correctamente", "", "success");
                //$('#archivos_registrados').html(r);
                //alert('' + r);
            }
        });
        
        
        $.ajax({
            type: 'POST',
            url: '../Controller/reg_res.php',
            data: form_data,
            contentType:false,
            processData: false,
            success: function(e) {
                swal(e);
            }
        });


        $('#ModalR').modal('hide');


        //alert(id + folio + date_r + res);
    });





    $('#search').click(function() {
        $('#iframeD').css("z-index", "0");
        $('#btn-content').animate({
            backgroundColor: "#5c5c5c"
        }, 700);
        $('#btn-content').animate({
            width: "90%"
        }, 400);
        $('#btn-content').animate({
            height: "85%"
        }, 400);
        $('#add').hide();
        $('#close_add').show();
        setTimeout(() => {
            //$('#dropzone').show(200);
            $('#formu2').show(200);
        }, 1600);
        consulta = "SELECT de.folio,de.op_control,de.estatus,de.id_documento,de.fecha_oficio,de.n_oficio,de.fecha_recibido,de.fecha_oficio,di.asunto,di.fecha_limite FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE 1  ";






        //if (localStorage.getItem("window") == 2) {
        //  $('#reg_doc').css("top", "10px");
        //}
    });


    $('#f_i').change(function() {
        //alert($('#f_i').val());
        let f_i = $('#f_i').val();
        if (f_i != "") {

            consulta_fecha_i = " AND de.fecha_oficio BETWEEN '" + f_i + "'";
            //consulta = consulta + consulta_fecha_i;
            //alert(consulta_fecha);
        }
    });
    $('#f_l').change(function() {
        //alert($('#f_i').val());
        let f_l = $('#f_l').val();
        if (f_l != "") {
            consulta_fecha_l = " AND '" + f_l + "'";
            //consulta = consulta + consulta_fecha_l;
            //alert(consulta);
        }
    });

    $('#frec_i').change(function() {
        //alert($('#f_i').val());
        let frec_i = $('#frec_i').val();
        if (frec_i != "") {
            //$('#frec_l').show(200);
            consulta_fecharec_i = " AND de.fecha_recibido BETWEEN '" + frec_i + "'";
            //consulta = consulta + consulta_fecha_i;
            //alert(consulta_fecha);
        }
    });
    $('#frec_l').change(function() {
        //alert($('#f_i').val());
        let frec_l = $('#frec_l').val();
        if (frec_l != "") {

            consulta_fecharec_l = " AND '" + frec_l + "'";
            //consulta = consulta + consulta_fecha_l;
            //alert(consulta);
        }
    });

    $('#tipo').change(function() {
        tipo = $('#tipo').val()
        if (tipo != 0) {
            consulta_tipo = " AND de.tipo_documento = " + tipo;
        }
    })


    $('#direccion2').change(function() {
        dir = $('#direccion2').val()
        if (dir != 0) {
            consulta_direccion = " AND di.direccion = " + dir;
        }
    })

    $('#btn_f').click(function() {
        consulta = consulta + consulta_fecha_i + consulta_fecha_l + consulta_fecharec_i + consulta_fecharec_l + consulta_tipo + consulta_direccion;
        //alert(consulta);
        $.ajax({
            type: 'POST',
            url: '../js/table_f.php',
            data: { 'sql': consulta },
            success: function(e) {
                consulta = "SELECT de.folio,de.op_control,de.estatus,de.id_documento,de.fecha_oficio,de.n_oficio,de.fecha_recibido,de.fecha_oficio,di.asunto,di.fecha_limite FROM documentos_externos as de INNER JOIN documento_instruccion as di ON di.id_documento = de.id_documento WHERE 1 ";
                consulta_fecha_i = "";
                consulta_fecha_l = "";
                consulta_tipo = "";
                consulta_fecharec_i = "";
                consulta_fecharec_l = "";
                consulta_direccion = "";
                swal("La busqueda aparecera en el apartado de resultados filtrados")
                $('#table_filtro').html(e);
                $('#f_l').val("");
                $('#f_i').val("")
                $('#frec_l').val("");
                $('#frec_i').val("")
                $('#tipo').val("0")

            },
        });

    });




    $('#btn_esp').click(function() {
        setTimeout(() => {
            $('#poof').show();
        }, 500);
        $('#message_development').hide(500)
    });

    $.ajax({
        type: 'POST',
        url: '../Controller/get_usr.php',
        data: '',
        contentType: false,
        processData: false,
        success: function(e) {
            usr = e;
            localStorage.setItem("00", usr);
            console.log(usr);
        },
    });

    usr = localStorage.getItem("00");
    localStorage.removeItem("00");
    //alert(usr);





   







    /*
        $("#drop2").on("drop", function() {
            alert("Hola mundo");
        });
    */



    //$('.dz-button').text("Arrastra y suelta aqui tus archivos o da click para subir");

    $('#add').hover(function() {
        $('#add').attr("src", "../img/iconos/add_on.png");
    }, function() {
        $('#add').attr("src", "../img/iconos/add.png");
    });


    $('#add').click(function() {
       
        $('#btn-content').animate({
            width: "60%"
        }, 400);
        
        $('#add').hide();
        $('#search').hide();
        $('#close_add').show();
        $('#close_add').animate({
            left: '95%'
        });
        setTimeout(() => {
            $('#dropzone').show(200);
            $('#formu').show(200);
        }, 200);
    });


    /*
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    */





    $('#close_add').click(function() {
        //$('#search').show(200);
        $('#close_add').hide();
           
        $('#btn-content').animate({
            height: "1000px",
            width:'60px'
        }, 500);
        $('#dropzone').hide(100);
        $('#formu').hide(200);
        $('#formu2').hide(200);
        $('#add').show();


        /*$('#formu2').hide(200);
        if (localStorage.getItem("window") == 2) {
            $('#btn-content').animate({
                top: "9%"
            }, 500);
           
            $('#btn-content').animate({
                left: "1.5%"
            }, 200);
            $('#btn-content').animate({
                width: "60px"
            }, 400);
            $('#btn-content').animate({
                backgroundColor: "white"
            }, 700);
            $('#add').show();
            $('#close_add').hide();
            $('#dropzone').hide(1200);
            $('#formu').hide(200);
            $('#formu2').hide(200);



        } else {
            $('#btn-content').animate({
                backgroundColor: "white"
            }, 700);
            $('#btn-content').animate({
                width: "60px"
            }, 400);
            $('#btn-content').animate({
                height: "200px"
            }, 400);
            $('#add').show();
            $('#close_add').hide();
            $('#dropzone').hide(1200);
            $('#formu').hide(200);
        }*/
    });


   


   



    $('#txttipo').change(function() {
        console.log("Iniciando");
        var tipo = $('#txttipo').val();
        console.log(tipo);
    });

    //generar_op_control();



    $('#reg_doc').click(function() {
        sending_data();

    });


    $('#btnAdj').click(function() {
        $('#modalAdjuntar').modal('show');
        var top_c = $('#top_c').val();
        var op_folio = $('#txtfolio').val();
        form_data = new FormData();
        form_data.append('top_c', top_c);
        form_data.append('op_folio', op_folio);
        alert(op_folio);
        console.log(op_folio);
        $.ajax({
            type: 'POST',
            url: '../Model/validar_archivo.php',
            data: form_data,
            contentType: false,
            processData: false,
            success: function(r) {
                console.log(op_folio);
                $('#formArchivo').html(r);
            },
        });
    });



    $('#btn_fecha_oficio').click(function() {
        var f_i = $('#f_i').val();
        var f_l = $('#f_l').val();
        var fr_i = $('#fr_i').val();
        var fr_l = $('#fr_l').val();
        var frec_i = $('#frec_i').val();
        var frec_l = $('#frec_l').val();
        var tipo = $('#tipo').val();
        var oficio = $('#n_oficio').val();
        var direccion = $('#direccion2').val();
        //alert(frec_i + frec_l);
        clearInterval(it);
        //clearInterval(it3);
        //clearInterval(it4);
        form_data = new FormData();
        form_data.append('f_i', f_i);
        form_data.append('f_l', f_l);
        form_data.append('fr_i', fr_i);
        form_data.append('fr_l', fr_l);
        form_data.append('frec_i', frec_i);
        form_data.append('frec_l', frec_l);
        form_data.append('tipo', tipo);
        form_data.append('oficio', oficio);
        form_data.append('direccion', direccion);
        $('#contenido').empty();
        $.ajax({
                data: form_data,
                type: "POST",
                url: "../Controller/filtros.php",
                contentType: false,
                processData: false,
                success: function(message) {

                    $('#toggle_f').toggleClass('active');
                    $('#toggle').toggleClass('disabled');
                    $('#overlay').toggleClass('disabled');
                    $('#overlay2').toggleClass('active');
                    $('#menu2').toggleClass('active');
                    $('#contenido').html(message);
                    //alert("Exito");
                }
            })
            //table.destroy();
            //table4.destroy();
            //table5.destroy();
    })





   

    var direccion = $('#id_direccion').val();
    //notificaciones

    $('#toggle_f').click(function() {
        $('#toggle_f').toggleClass('active');
        $('#toggle').toggleClass('disabled');
        $('#overlay').toggleClass('disabled');
        $('#overlay2').toggleClass('active');
        $('#menu2').toggleClass('active');


    });
    var totalTime = 10;

    $('#toggle').click(function() {
        $('#toggle').toggleClass('active');
        $('#toggle_f').toggleClass('disabled');
        $('#overlay2').toggleClass('disabled');
        $('#overlay').toggleClass('active');
        $('#menu').toggleClass('active');

    });

    $('#tabs_documentos').on("click", "li", function(e) {
        e.preventDefault();
        var li = $(this);
        var campo;
        $(this).children("a").each(function(i) {
                switch (i) {
                    case 0:
                        campo = $(this).attr("id");
                        break;
                }
            })
            //console.log(campo);
        id = "#" + campo;
        if (id == "#loadGen") {
            $('#loadAss').css("background-color", "white");
            $('#loadAss').css("color", "#6b6c6c");
            $('#loadAt').css("background-color", "white");
            $('#loadAt').css("color", "#6b6c6c");
            $(id).css("background-color", "#424242");
            $(id).css("color", "white");
        } else if (id == "#loadAss") {
            $('#loadGen').css("background-color", "white");
            $('#loadGen').css("color", "#6b6c6c");
            $('#loadAt').css("background-color", "white");
            $('#loadAt').css("color", "#6b6c6c");
            $(id).css("background-color", "#424242");
            $(id).css("color", "white");
        }
        if(id == "#loadAt"){
            $('#loadGen').css("background-color", "white");
            $('#loadGen').css("color", "#6b6c6c");
            $('#loadAss').css("background-color", "white");
            $('#loadAss').css("color", "#6b6c6c");
            $(id).css("background-color", "#39d549");
            $(id).css("color", "white");

            }

    });


    $('#tabs_documentos2').on("click", "li", function(e) {
        e.preventDefault();
        var li = $(this);
        var campo;
        $(this).children("a").each(function(i) {
                switch (i) {
                    case 0:
                        campo = $(this).attr("id");
                        break;
                }
            })
            //console.log(campo);
        id = "#" + campo;
        //console.log(id);
        if(id == "#loadAreasRes" ){
            $('#loadTitularRes').css("background-color", "white");
            $('#loadTitularRes').css("color", "#6b6c6c");
            $(id).css("background-color", "#39d549");
            $(id).css("color", "white");
        }
        if(id == "#loadTitularRes" ){
            $('#loadAreasRes').css("background-color", "white");
            $('#loadAreasRes').css("color", "#6b6c6c");
            $(id).css("background-color", "#39d549");
            $(id).css("color", "white");
        }
        if (id == "#loadAreas") {
            $('#loadTitular').css("background-color", "white");
            $('#loadTitular').css("color", "#6b6c6c");
            $('#loadCopias').css("background-color", "white");
            $('#loadCopias').css("color", "#6b6c6c");
            $('#loadGen').css("background-color", "#424242");
            $('#loadGen').css("color", "white");
            $('#loadac').css("background-color", "white");
            $('#loadac').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        } else if (id == "#loadTitular") {
            $('#loadAreas').css("background-color", "white");
            $('#loadAreas').css("color", "#6b6c6c");
            $('#loadCopias').css("background-color", "white");
            $('#loadCopias').css("color", "#6b6c6c");
            $('#loadGen').css("background-color", "#424242");
            $('#loadGen').css("color", "white");
            $('#loadac').css("background-color", "white");
            $('#loadac').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        }
        if (id == "#loadCopias") {
            $('#loadTitular').css("background-color", "white");
            $('#loadTitular').css("color", "#6b6c6c");
            $('#loadAreas').css("background-color", "white");
            $('#loadAreas').css("color", "#6b6c6c");
            $('#loadGen').css("background-color", "#424242");
            $('#loadGen').css("color", "white");
            $('#loadac').css("background-color", "white");
            $('#loadac').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        }
        if (id == "#loadac") {
            $('#loadTitular').css("background-color", "white");
            $('#loadTitular').css("color", "#6b6c6c");
            $('#loadAreas').css("background-color", "white");
            $('#loadAreas').css("color", "#6b6c6c");
            $('#loadGen').css("background-color", "#424242");
            $('#loadGen').css("color", "white");
            $('#loadCopias').css("background-color", "white");
            $('#loadCopias').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        }

    });

    $('#tabs_documentos3').on("click", "li", function(e) {
        e.preventDefault();
        var li = $(this);
        var campo;
        $(this).children("a").each(function(i) {
                switch (i) {
                    case 0:
                        campo = $(this).attr("id");
                        break;
                }
            })
            //console.log(campo);
        id = "#" + campo;
        //console.log(id);
        if (id == "#loadtt") {
            $('#loadat').css("background-color", "white");
            $('#loadat').css("color", "#6b6c6c");
            $('#loadAss').css("background-color", "#424242");
            $('#loadAss').css("color", "white");
            $('#loadac_t').css("background-color", "white");
            $('#loadac_t').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        } else if (id == "#loadat") {
            $('#loadtt').css("background-color", "white");
            $('#loadtt').css("color", "#6b6c6c");
            $('#loadAss').css("background-color", "#424242");
            $('#loadAss').css("color", "white");
            $('#loadac_t').css("background-color", "white");
            $('#loadac_t').css("color", "#6b6c6c");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        }
        if (id == "#loadac_t") {
            $('#loadat').css("background-color", "white");
            $('#loadat').css("color", "#6b6c6c");
            $('#loadtt').css("background-color", "white");
            $('#loadtt').css("color", "#6b6c6c");
            $('#loadAss').css("background-color", "#424242");
            $('#loadAss').css("color", "white");
            $(id).css("background-color", "#6b6c6c");
            $(id).css("color", "white");
        }
    });


});
    });
</script>