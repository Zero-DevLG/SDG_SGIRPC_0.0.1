<?php
require('../Model/Conexion.php');
require("../Model/modals_dvas.php");
include('../Model/Consultas.php');
session_start();



//variable de busqueda que se recibe desde el index con JQUERY
$consultaBusqueda = $_POST['id_documento'];
//echo "VALOR: " . $consultaBusqueda;

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

$consulta_archivo = $pdo->prepare("SELECT * FROM archivos WHERE id_documento = '$consultaBusqueda'");
$consulta_archivo->execute();
$lista_archivo = $consulta_archivo->fetchAll(PDO::FETCH_ASSOC);

//Variable que mostrara el contenido, se generara vacia para evitar los E-notice

//Comprueba si $consultaBusqueda esta seteado
if (isset($consultaBusqueda)) {
    //$consulta = $pdo->prepare("SELECT d.id_documento,d.fecha_oficio,d.n_folio,d.remitente,d.cargo_r,td.descripcion,d.asunto FROM documentos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento  WHERE d.id_documento = '$consultaBusqueda'");

    $consulta = $pdo->prepare("SELECT de.estatus,de.id_documento,de.folio,de.remitente,di.inst_otro,di.asunto,de.cargo_r,de.n_oficio,de.tipo_documento,td.descripcion,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,de.id_empleado_r,e.nombre,e.apellido,de.id_organismo,di.instruccion,di.destinatario,di.cargo_d,di.fecha_limite,di.fecha_instruccion,di.direccion,dir.direccion,di.area,a.area FROM documentos_externos as de INNER JOIN documento_instruccion as di ON de.id_documento = di.id_documento INNER JOIN tipo_documentos as td ON de.tipo_documento = td.id_tipo_doc INNER JOIN empleado as e ON e.id_empleado = de.id_empleado_r  INNER JOIN equipo_registro as dir ON dir.id_direccion = di.direccion INNER JOIN catalogo_dispositivo as a ON a.direccion = di.area WHERE  de.id_documento = '$consultaBusqueda'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $filas = $consulta->rowCount();

    $consulta2 = $pdo->prepare("SELECT i.n_instruccion,di.instruccion,di.direccion FROM documento_instruccion as di INNER JOIN instrucciones as i ON di.instruccion = i.id_instruccion WHERE di.id_documento ='$consultaBusqueda'");
    $consulta2->execute();
    $datos_ins = $consulta2->fetchAll(PDO::FETCH_ASSOC);



    if ($filas === 0) {
        $mensaje = "";
    } else {

        foreach ($datos_ins as $mostrar) {
            $nombre_instruccion = $mostrar['n_instruccion'];
            $id_instruccion = $mostrar['instruccion'];
            $id_direccion = $mostrar['direccion'];
        }

        //Si existen filas 

        //La variable resultado almacena el array que se generara en la connsulta 

        foreach ($datos as $mostrar) {
            # code...
            $id_documento = $mostrar['id_documento'];
            $fecha_o = $mostrar['fecha_oficio'];
            $fecha_registro = $mostrar['fecha_registro'];
            $fecha_r = $mostrar['fecha_recibido'];
            $fecha_l = $mostrar['fecha_limite'];
            $folio = $mostrar['folio'];
            $registro_n = $mostrar['nombre'];
            $registro_a = $mostrar['apellido'];
            $remitente = $mostrar['remitente'];
            $cargo_r = $mostrar['cargo_r'];
            $tipo_documento = $mostrar['descripcion'];
            $asunto = $mostrar['asunto'];
            $instruccion = $mostrar['inst_otro'];
            $direccion = $mostrar['direccion'];
            $estatus = $mostrar['estatus'];
            $area = $mostrar['area'];
        } 
    }
}

?>



<ul class='nav nav-tabs'>
                        <li><a data-toggle="tab" href="#menu_participantes">Participantes</a></li>
                        <!--<li>modulo inhabilitado en caso de ser necesario
                            <a data-toggle="tab" href="#menu_a">Adjuntar documento</a></li>-->
                        <li><a data-toggle="tab" href="#menu_datos" id="as_instruccion">Datos</a></li>

                    </ul>
                    <div class="tab-content">


                        <div id="menu_participantes" class="tab-pane fade in active">
                            <input type="hidden" name="txtid_documento" id="txtid_documento"
                                value="<?php echo $id_documento; ?> ">

                            <div id="part">
                            </div>

                        </div>
                        <!--
                        <div id="menu_a" class="tab-pane fade">
                            <input type="hidden" name="txtid_documento" id="txtid_documento"
                                value="<?php //echo $id_documento; 
                                        ?> ">
                            <div id="formArchivo"></div>
                        </div>
                        -->
                        <div id="menu_datos" class="tab-pane fade">
                            <div id="mostrar_datos">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div id="cab_ai">
                                                <h2 id="title_ai"> Editar Instruccion</h2>
                                                <input type="hidden" name="in_id_doc" id="txtid_documento"
                                                    value="<?php echo $id_documento; ?> " disabled>
                                                <input type="hidden" name="fol_id_doc" id="folio"
                                                    value="<?php echo $folio; ?> " disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label>Tipo de documento</label>
                                            <input type="text" class="form-control" id="tipe_doc"
                                                value="<?php echo $tipo_documento; ?>" disabled>
                                        </div>
                                        <?php if ($tipo_documento == "Copia de conocimiento") { ?>
                                        <div class="col-md-6">
                                            <button id="btnCC" class="btn btn-sm btn-primary">Mover documento a copias
                                                de
                                                conocimiento</button>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="">Folio:</label>
                                            <input type="text" id="bis_folio" class="form-control"
                                                value="<?php echo $folio; ?>" disabled>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-7">
                                                <label>
                                                    Direccion:
                                                </label>
                                                <select class="form-control" name="txtdireccion2" id="txtdireccion2"
                                                    disabled>
                                                    <option style="background-color:green; color:white;" value="<?php echo $id_direccion ?>" selected="selected">
                                                        <?php echo $direccion; ?></option>
                                                    <?php foreach ($lista_dir as $mostrar) { ?>
                                                    <option value="<?php echo $mostrar['id_direccion']; ?>">
                                                        <?php echo $mostrar['detalle']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Destinatario:</label>
                                                <div id="selectlista_dest"></div>

                                            </div>
                                            <div class="col-md-12">
                                                <label>Cargo destinatario</label>
                                                <div id="selectlista_cargo"></div>

                                            </div>
                                        </div>
                                        <div id="target">
                                            <hr>
                                            <h5 id="data_resp">Datos del responsable</h5>
                                            <div class="form-row">
                                                <div class="col-md-7">
                                                    <label>
                                                        Direccion:
                                                    </label>
                                                    <select class="form-control" name="txtdireccion"
                                                        id="txtdireccion_r2" required>
                                                        <option value="0">Seleccione una direccion</option>
                                                        <?php foreach ($lista_dir as $mostrar) { ?>
                                                        <option value="<?php echo $mostrar['id_direccion']; ?>">
                                                            <?php echo $mostrar['detalle']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label>Destinatario:</label>
                                                    <div id="selectlista_dr2"></div>

                                                </div>
                                                <div class="col-md-6">
                                                    <label>Cargo destinatario</label>
                                                    <div id="selectlista_cr2"></div>

                                                </div>
                                            </div>

                                            <hr>

                                        </div>
                                        <div class="form-row">

                                            <div class="col-md-6">
                                                <label>Prioridad:</label>
                                                <select class="form-control" name="txtprioridad" id="pr2" required>
                                                    <option value="2">Extra urgente</option>
                                                    <option value="1">Urgente</option>
                                                    <option value="0">Normal</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Fecha limite</label>
                                                <input type="date" value="<?php echo $fecha_l ?>" class="form-control"
                                                    id="fecha_limite2" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <label>Instruccion:</label>
                                                <select name="txtinstruccion" id="inst2" class="form-control">
                                                    <option value="<?php echo $id_instruccion; ?>" selected>
                                                        <?php echo $nombre_instruccion; ?></option>
                                                    <?php foreach ($lista_ins as $show) { ?>
                                                    <option value="<?php echo $show['id_instruccion']; ?>">
                                                        <?php echo $show['n_instruccion']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="">Otro:</label>
                                                <input type="text" value="<?php echo $instruccion; ?>" id="inst_otro2"
                                                    class="form-control" disabled>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Asunto:</label>
                                                <textarea class="form-control" name="txtasunto" id="asunto2" cols="30"
                                                    rows="3"><?php echo $asunto; ?></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <br>
                                                <button class="btn btn-sm btn-success" id="editar_turno">Guardar cambios</button>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4">
                                                <div id="btn_asignar">

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>

                   <script>
                   function recargarLista_33() {
    console.log("Preparando datos");
    console.log($('#txtdireccion_r2').val());
    $.ajax({
        type: "POST",
        url: "../Model/consulta_dest_r2.php",
        data: "direccion=" + $('#txtdireccion_r2').val(),
        success: function (r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dr2').html(r);
            console.log($('#txtdestinatario_r').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo_r2.php",
        data: "direccion=" + $('#txtdireccion_r2').val(),
        success: function (r) {
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
        success: function (r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_dest').html(r);
            // console.log($('#txtdestinatario').val());
        }
    });
    $.ajax({
        type: "POST",
        url: "../Model/consulta_cargo2.php",
        data: "direccion=" + $('#txtdireccion2').val(),
        success: function (r) {
            console.log("Enviado exitosamente para llenar select");
            $('#selectlista_cargo').html(r);
            // console.log($('#txtcargod').val());
        }
    });
};
$('#txtdireccion2').change(function () {
    let val = $('#txtdireccion2').val();
    //alert(val);
    if (val == 1) {
        recargarLista22();
        $('#target').show();
    } else {
        recargarLista22();
        $('#target').hide();

    }
});


$('#txtdireccion_r2').change(function () {
    recargarLista_33();
    //$('#target').show();

});

$(document).ready(function(){
    //$('#target').hide();
    recargarLista22();
    recargarLista_33();
  

    let direccion = $('#txtdireccion2').val();
    if(direccion == 1)
    {
        $( "#txtdireccion2" ).prop( "disabled", false ) 
    }


    $('#inst2').change(function(){
        let instruccion = $('#inst2').val();
        console.log(instruccion);
        if(instruccion == 11)
        {
            swal("Se activo el campo de OTRO para insertar manualmente la instruccion");
            $( "#inst_otro2" ).prop( "disabled", false );
        }else{
            $( "#inst_otro2" ).prop( "disabled", true );
        }
    });


    $('#txtdireccion2').change(function () {
    let val = $('#txtdireccion2').val();
    //alert(val);
    if (val == 1) {
        recargarLista22();
        $('#target').show();
    } else {
        recargarLista22();
        $('#target').hide();

    }
});

    
    $('#editar_turno').click(function () {
        let id_documento = $('#txtid_documento').val();
        let direccion = $('#txtdireccion2').val();
        let instruccion = $('#inst2').val();
        let inst_otro = $('#inst_otro2').val();
        let destinatario = $('#txtdestinatario2').val();
        let cargo_d = $('#txtcargod2').val();
        let asunto = $('#asunto2').val();
        let fecha_limite = $('#fecha_limite2').val();
        let prioridad = $('#pr2').val();
        let dest_res = $('#destinatario_r2').val();
        let cargo_res = $('#txtcargod_r2').val();
        let direccion_r2 = $('#txtdireccion_r2').val();
        /*
        alert("id doc" + id_documento)
        alert("direccion" + direccion)
        alert("instruccion" + instruccion)
        alert("otro"+inst_otro)
        alert("dest"+destinatario)
        alert("cargo" + cargo_d)
        alert("asunto"+asunto)
        alert("fecha_limite" + fecha_limite)
        alert("prioridad"+prioridad)
        alert("dest r " + dest_res)
        alert("cargo res " + cargo_res)
        */
        let form_data = new FormData();
        form_data.append('id_documento', id_documento);
        form_data.append('direccion', direccion);
        form_data.append('instruccion', instruccion);
        form_data.append('inst_otro', inst_otro);
        form_data.append('destinatario', destinatario);
        form_data.append('cargo_d', cargo_d);
        form_data.append('asunto', asunto);
        form_data.append('fecha_limite', fecha_limite);
        form_data.append('prioridad', prioridad);
        form_data.append('dest_res', dest_res);
        form_data.append('cargo_res', cargo_res);
        form_data.append('direccion_r2', direccion_r2)
        $.ajax({
            data: form_data,
            type: "POST",
            url: "../Controller/edt_turno.php",
            contentType: false,
            processData: false,
            success: function (message) {
                swal(message);
                $('#show_data').empty();
                $('#subnav_r_as').animate({
            width: "60px"
        });

        if (localStorage.getItem("window") == 2)
         {
            $('#subnav_r_as').animate({
                width: "60px"
            });
            $('#subnav_r_as').animate({
                height: "290px"
            });

            $('#subnav_r_as').animate({
                backgroundColor: "#5dc45a"
            }, 700);

            $('#close_doc_turn').hide();
            $('#close_doc_turn').animate({
                left: "5px"
            });
            $('#subnav_r_as').animate({
                top: "280px"
            }, 100);
            $('#edt').animate({
                top: "50px"
            })
            $('#edt2').animate({
                top: "110px"
            })

            $('#edt_turn').show(500);
            $('#cancell_doc').show(500);
            $('#gen_pdf').show(500);
            $('#submit_d').show(500);
            $('#submit_d_in').show(500);
            $('#history').show(500);
            $('#response').show(500);

            $('#subnav_r_as').css("z-index", 0);
            $('#show_data_turn').empty();
        
        }else{
            $('#subnav_r_as').animate({
            height: "290px"
        });

        $('#subnav_r_as').animate({
            backgroundColor: "#5dc45a"
        }, 700);

        $('#close_doc_turn').hide();
        $('#close_doc_turn').animate({
            left: "5px"
        });

        $('#iframeI').animate({
            width: "50%"
        });

        $('#iframeD').animate({
            left: "57%"
        }, 1000);

        $('#iframeD').animate({
            width: "42%"
        }, 1000);
        $('#subnav_r_as').animate({
            top: "280px"
        }, 100);
        $('#edt').animate(
            {
                top: "50px"
            }
        )
        $('#edt2').animate(
            {
                top: "110px"
            }
        )

        $('#edt_turn').show(500);
        $('#cancell_doc').show(500);
        $('#gen_pdf').show(500);
        $('#submit_d').show(500);
        $('#submit_d_in').show(500);
        $('#history').show(500);
        $('#response').show(500);

        $('#subnav_r_as').css("z-index", 0);
        $('#show_data_turn').empty();
        }

        

    //$('#cambiar_folio').html(s);
    setTimeout(function() {
        if (id_documento != "") {
            $.post(
                "../Model/vista_documento_as.php", {
                    valorBusqueda: id_documento
                },
                function(mensaje2) {
                    $("#resultadoBusqueda").empty();
                    $("#resultadoBusqueda").html(mensaje2);
                }
            );
        }
    }, 2000);
            }


        })


    });

})
                   
                   </script> 