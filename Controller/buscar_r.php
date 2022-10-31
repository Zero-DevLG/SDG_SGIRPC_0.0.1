<?php
//Archivo de conexion a la base de datos
require('../Model/conexion.php');
include('../Model/consultas.php');



//variable de busqueda que se recibe desde el index con JQUERY
$consultaBusqueda = $_POST['valorBusqueda'];


//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable que mostrara el contenido, se generara vacia para evitar los E-notice

//Comprueba si $consultaBusqueda esta seteado
if (isset($consultaBusqueda)) {
    $consulta = $pdo->prepare("SELECT d.id_documento,d.fecha_oficio,d.n_folio,d.remitente,d.cargo_r,td.descripcion,d.asunto,di.instruccion,i.n_instruccion,di.direccion,di.area,a.area,dir.direccion,di.id_instruccion FROM documentos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN catalogo_dispositivo as a ON di.area = a.id_area INNER JOIN equipo_registro as dir ON dir.id_direccion = di.direccion INNER JOIN instrucciones as i ON di.instruccion = i.id_instruccion WHERE d.id_documento = '$consultaBusqueda'");
    $consulta->execute();
    //Obtiene la cantidad de filas que hay en la consulta
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $filas = $consulta->rowCount();

    if ($filas === 0) {
        $mensaje = "";
    } else {

        //Si existen filas 

        //La variable resultado almacena el array que se generara en la connsulta 

        foreach ($datos as $mostrar) {
            # code...
            $id_documento = $mostrar['id_documento'];
            $fecha_o = $mostrar['fecha_oficio'];
            $folio = $mostrar['n_folio'];
            $remitente = $mostrar['remitente'];
            $cargo_r = $mostrar['cargo_r'];
            $tipo_documento = $mostrar['descripcion'];
            $asunto = $mostrar['asunto'];
            $instruccion = $mostrar['n_instruccion'];
            $direccion = $mostrar['direccion'];
            $area = $mostrar['area'];
        } ?>

<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!--
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    -->
</head>

<body background="../img/fondo_hoja2.jpg">
    <div id="cabezera">
        <img src="../img/LogoPC2.png">
    </div>
    <div id="load">

    </div>
    <h4 id="t_d">Tipo de documento:</h4>
    <h5 id="t_d1"><?php echo $tipo_documento; ?></h5>
    <h4 id="stf1">Fecha del oficio:</h4>
    <h5 id="f1"><?php echo $fecha_o; ?></h5>
    <h4 id="stf2">Fecha limite:</h4>
    <h5 id="f2"><?php echo $fecha_l; ?></h5>
    <table id="t-mostrar" class="table table-sm">
        <tr>
            <td>
                <h4>Folio:</h4>
            </td>
            <td>
                <h5><?php echo $folio; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Remitente:</h4>
            </td>
            <td>
                <h5><?php echo $remitente; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Cargo:</h4>
            </td>
            <td>
                <h5><?php echo $cargo_r; ?><span></span></h5>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Asunto:</h4>
            </td>
            <td>
                <h5><?php echo $asunto; ?><span></span></h5>
            </td>
            <td>
                <h4>Instruccion:</h4>
            </td>

            <td>
                <h5><?php echo $instruccion; ?></h5>
            </td>
        </tr>
        <tr>
        </tr>

    </table>

    <div id="subnav">
        <a href="#" id="myBtn5"><img id="ver_ins" src="../img/iconos/ver_instruccion.png"
                title="Ver instrucciones asignadas"></a>
        <a href="#" id="myBtn6"><img id="ver_res" src="../img/iconos/respuesta.png"
                title="Ver respuesta del documento"></a>
        <a href="#" id="myBtn4"><img id="resp2" src="../img/iconos/enviar-m.png"
                title="Asignar instrucciones multiples"></a>
        <a href="#" id="myBtn"><img id="resp" src="../img/iconos/enviar.png" title="Asignar instrucciones"></a>
        <a href="#"><img id="edt" src="../img/iconos/editar.png" title="Editar"></a>
        <a href="#" id="myBtn2"><img id="ver_a" src="../img/iconos/ver_a.png" title="Ver Archivos"></a>
        <a href="#" id="myBtn3"><img id="gps" src="../img/iconos/gps.png" title="Ubicacion del documento"></a>
        <a href="#" id="myBtn7"><img id="chat" src="../img/iconos/chat.png" title="Anotaciones del documento"></a>

    </div>

</body>

<?php



    } // fin del else

} //fin del isset
//Devolvemos el mensaje que tomara Jquery


?>

<body>



    <!-- Modal para agregar Instrucciones a los documentos  -->
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="document">
        <div class="modal-dialog modal-lg modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../img/LogoPC2.png">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <center>
                                    <h2 style="color: forestgreen;"> Asignar Instrucciones</h2>
                                    <input type="text" name="in_id_doc" id="txtid_documento"
                                        value="<?php echo $id_documento; ?> " disabled>
                                    <input type="text" name="fol_id_doc" id="folio" value="<?php echo $folio; ?> "
                                        disabled>

                                </center>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <label>
                                    Direccion:
                                </label>
                                <select class="form-control" name="txtdireccion" id="txtdireccion" required>
                                    <?php foreach ($lista_dir as $mostrar) { ?>
                                    <option value="<?php echo $mostrar['id_direccion']; ?>">
                                        <?php echo $mostrar['direccion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <!--
                                <label for="">Dirigir especificamente a:</label>
                                <input type="checkbox" name="area" id="area" value="1"> -->
                                <label>Area:</label>
                                <div id="selectlista2"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Destinatario:</label>
                                <input type="text" class="form-control" id="txtdestinatario" name="txtdestinatario"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label>Cargo destinatario</label>
                                <input type="text" class="form-control" id="txtcargod" name="txtcargodes" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label>Instruccion:</label>
                                <select class="form-control" name="txtinstruccion" id="txtinstruccion" required>
                                    <?php foreach ($lista_ins as $mostrar2) { ?>
                                    <option value="<?php echo $mostrar2['id_instruccion']; ?>">
                                        <?php echo $mostrar2['n_instruccion'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Prioridad:</label>
                                <select class="form-control" name="txtprioridad" id="txtprioridad" required>
                                    <option value="extra urgente">Extra urgente</option>
                                    <option value="urgente">Urgente</option>
                                    <option value="normal">Normal</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Fecha limite</label>
                                <input type="date" class="form-control" id="txtfecha_limite" required>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" id="btnIns">Asignar instruccion</button>
                </div>
            </div>

        </div>
    </div> <!-- Fin del modal instruccion individual -->


    <!-- Modal ver archivos -->
    <div class="modal fade" id="ModalArchivo" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../img/LogoPC2.png">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </button>
                </div>
                <div class="modal-body" id="modal_archivo">
                    <ul class='nav nav-tabs'>
                        <li class='active'><a data-toggle="tab" href="#home">Instrucciones</a></li>
                        <li><a data-toggle="tab" href="#menu1">Subir archivos</a></li>
                        <li><a data-toggle="tab" href="#menu5">Ver archivos</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h1>Selecciona una opcion</h1>
                        </div>

                        <div id="menu1" class="tab-pane fade">
                            <br>
                            <form action="../Controller/archivos.php" method="POST" enctype="multipart/form-data">
                                <input type="text" name="txtid_documento" id="txtid_documento"
                                    value="<?php echo $id_documento; ?> " hidden>

                                <div id="formArchivo"></div>
                                <input type="submit" class="btn btn-sm btn-info" value="Guardar Cambios">
                            </form>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <input type="text" value="<?php echo $folio;  ?>" disabled>
                            <br>
                            <br>
                            <div id="contenidoArchivo">
                                <input type="text" name="id_doc2" id="id_doc2" value="<?php echo $id_documento; ?> "
                                    disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Final modal archivos -->

    <!-- Modal GPS a los documentos  -->
    <!-- Modal -->
    <div class="modal fade" id="ModalGPS" role="document">
        <div class="modal-dialog modal-lg modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../img/LogoPC2.png">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="modal_body_gps">
                    <input type="text" name="id_doc" id="id_doc" value="<?php echo $id_documento; ?> " disabled>
                    <div id="contenido-gps"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> <!-- Fin del modal instruccion individual -->

    <!-- Modal Ver_Instrucciones a los documentos  -->
    <!-- Modal -->
    <div class="modal fade" id="Modalv_i" role="document">
        <div class="modal-dialog modal-lg modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../img/LogoPC2.png">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="modal_body_gps">
                    <input type="text" name="id_doc" id="id_doc" value="<?php echo $id_documento; ?> " disabled>
                    <div id="tableIns"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div> <!-- Fin del modal instruccion individual -->


    <!-- Modal ver mensajes -->
    <div class="modal fade" id="ModalMensaje" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-8">
                                <img src="../img/LogoPC2.png" width="600px">

                            </div>
                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <ul class='nav nav-tabs' id="tabs">
                                    <li class='active'><a data-toggle="tab" href="#home2">Instrucciones</a></li>
                                    <li><a data-toggle="tab" href="#menuM">Mensajes</a></li>
                                    <li><a data-toggle="tab" href="#menuO">Otros</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="modal_mensaje" style="overflow-y:auto;">
                    <div class="tab-content">
                        <div id="home2" class="tab-pane fade in active">
                            <h1>Selecciona una opcion</h1>
                        </div>

                        <div id="menuM" class="tab-pane fade">
                            <br>
                            <input type="text" name="txtid_documento" id="txtid_documento"
                                value="<?php echo $id_documento; ?> " hidden>
                            <div id="contenidoMensaje"></div>

                        </div>
                        <div id="menuO" class="tab-pane fade">
                            <input type="text" value="<?php echo $folio;  ?>" disabled>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-9">
                                <div id="texto_in">
                                    <input type="text" class="form-control" id="mensaje" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button id="enviar_m" class="btn btn-success btn-sm">Enviar mensaje</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Final modal mensajes -->



    <script>
    $(document).ready(function() {
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
                url: "../Model/validar_archivo.php",
                data: "id_documento=" + $('#txtid_documento').val(),
                success: function(r) {
                    console.log("Datos enviados exitosamente para cargar archivo");
                    $('#formArchivo').html(r);
                }
            });

            $.ajax({
                type: "POST",
                url: "../Model/ver_archivo.php",
                data: "id_documento=" + $('#txtid_documento').val(),
                success: function(r) {
                    console.log("Datos enviados exitosamente para ver archivo");
                    $('#contenidoArchivo').html(r);
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

        $("#btnIns").click(function() {
            event.preventDefault();
            jQuery.noConflict();
            var folio = $('#folio').val();
            var txtdireccion = $('#txtdireccion').val();
            var txtarea = $('#txtarea').val();
            var txtid_documento = $('#txtid_documento').val();
            var txtdestinatario = $('#txtdestinatario').val();
            var txtcargod = $('#txtcargod').val();
            var txtinstruccion = $('#txtinstruccion').val();
            var txtprioridad = $('#txtprioridad').val();
            var txtfecha_limite = $('#txtfecha_limite').val();
            console.log(txtdireccion);
            console.log(txtarea);
            $.post(
                "../Controller/i_e.php", {
                    id_documento: txtid_documento,
                    direccion: txtdireccion,
                    area: txtarea,
                    destinatario: txtdestinatario,
                    cargo_d: txtcargod,
                    instruccion: txtinstruccion,
                    prioridad: txtprioridad,
                    fecha_limite: txtfecha_limite
                },
                function(mensaje2) {
                    console.log(mensaje2);
                    alert(mensaje2);
                    location.reload();
                },
            );
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
    });
    </script>





    <script>
    $(document).ready(function() {
        recargarLista();
        $('#txtdireccion').change(function() {
            recargarLista();
        });
    });
    </script>

    <script>
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
    </script>
    <?php clearstatcache();  ?>


    <script type="text/javascript">
    var numero = 0; //Esta es una variable de control para mantener nombres
    //diferentes de cada campo creado dinamicamente.
    evento = function(evt) { //esta funcion nos devuelve el tipo de evento disparado
        return (!evt) ? event : evt;
    }

    //Aqui se hace la magia... jejeje, esta funcion crea dinamicamente los nuevos campos file
    addCampo = function() {
        //Creamos un nuevo div para que contenga el nuevo campo
        nDiv = document.createElement('div');
        //con esto se establece la clase de la div
        nDiv.className = 'archivo';
        //este es el id de la div, aqui la utilidad de la variable numero
        //nos permite darle un id unico
        nDiv.id = 'file' + (++numero);
        //creamos el input para el formulario:
        nCampo = document.createElement('input');
        //le damos un nombre, es importante que lo nombren como vector, pues todos los campos
        //compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
        nCampo.name = 'archivos[]';
        //Establecemos el tipo de campo
        nCampo.type = 'file';
        //Ahora creamos un link para poder eliminar un campo que ya no deseemos
        a = document.createElement('a');
        //El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
        a.name = nDiv.id;
        //Este link no debe ir a ningun lado
        a.href = '#';
        //Establecemos que dispare esta funcion en click
        a.onclick = elimCamp;
        //Con esto ponemos el texto del link
        a.innerHTML = 'Eliminar';
        //Bien es el momento de integrar lo que hemos creado al documento,
        //primero usamos la función appendChild para adicionar el campo file nuevo
        nDiv.appendChild(nCampo);
        //Adicionamos el Link
        nDiv.appendChild(a);
        //Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
        //con esta función obtenemos una referencia a ella para usar de nuevo appendChild
        //y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
        container = document.getElementById('adjuntos');
        container.appendChild(nDiv);
    }
    //con esta función eliminamos el campo cuyo link de eliminación sea presionado
    elimCamp = function(evt) {
        evt = evento(evt);
        nCampo = rObj(evt);
        div = document.getElementById(nCampo.name);
        div.parentNode.removeChild(div);
    }
    //con esta función recuperamos una instancia del objeto que disparo el evento
    rObj = function(evt) {
        return evt.srcElement ? evt.srcElement : evt.target;
    }
    </script>


</html>