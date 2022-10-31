<body>
    <ul class='nav nav-tabs'>
        <li><a data-toggle="tab" href="#menu_participantes">Participantes</a></li>
        <!--<li>modulo inhabilitado en caso de ser necesario
                            <a data-toggle="tab" href="#menu_a">Adjuntar documento</a></li>-->
        <li><a data-toggle="tab" href="#menu_datos" id="as_instruccion">Datos</a></li>

    </ul>
    <?php

    require('../Model/Conexion.php');
    require('../Model/Consultas.php');


    $consultaBusqueda = $_POST['id_documento'];
    $op_bis = $pdo->prepare("SELECT folio,active FROM op_bis WHERE id_documento = '$consultaBusqueda'");
    $op_bis->execute();
    $list_bis_op = $op_bis->fetchAll(PDO::FETCH_ASSOC);
    $count_bis = $op_bis->rowCount();
    foreach ($list_bis_op as $show) {
        $folio_bis = $show['folio'];
        $active = $show['active'];
    }



    $cat_op = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$consultaBusqueda'");
    $cat_op->execute();
    $row_cat = $cat_op->rowCount();
    $num = $cat_op->fetchColumn();


    if ($row_cat != 0) {
        $consulta = $pdo->prepare("SELECT d.estatus,d.folio,d.id_documento,d.id_organismo,d.op_control,d.comentario,d.anexos,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.fecha_registro, e.nombre, e.apellido, d.id_organismo,d.remitente, d.cargo_r,d.asunto,d.tipo_documento,td.descripcion,d.id_organismo,o.nombre_organismo FROM documentos_externos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN empleado as e ON d.id_empleado_r = e.id_empleado INNER JOIN organismo as o ON o.id_organismo = d.id_organismo WHERE d.id_documento  =  '$consultaBusqueda'");
        $consulta->execute();
        //Obtiene la cantidad de filas que hay en la consulta
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $filas = $consulta->rowCount();
    } else {
        $consulta = $pdo->prepare("SELECT d.estatus,d.folio,d.id_documento,d.id_organismo,d.op_control,d.comentario,d.anexos,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.fecha_registro, e.nombre, e.apellido, d.id_organismo,d.remitente, d.cargo_r,d.asunto,d.tipo_documento,td.descripcion,d.id_organismo,o.nombre_organismo FROM documentos_externos as d INNER JOIN tipo_documentos as td ON td.id_tipo_doc = d.tipo_documento INNER JOIN empleado as e ON d.id_empleado_r = e.id_empleado INNER JOIN organismo as o ON o.id_organismo = d.id_organismo WHERE d.id_documento  =  '$consultaBusqueda'");
        $consulta->execute();
        //Obtiene la cantidad de filas que hay en la consulta
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $filas = $consulta->rowCount();
    }
    foreach ($datos as $mostrar) {
        # code...

        $id_documento = $mostrar['id_documento'];
        $tipo_documento = $mostrar['descripcion'];
    }

    ?>
    <div id="data">
        <div class="tab-content">


            <div id="menu_participantes" class="tab-pane fade in active">
                <input type="hidden" name="txtid_documento" id="txtid_documento" value="<?php echo $id_documento; ?> ">

                <div id="part">

                </div>

            </div>
            <div id="menu_datos" class="tab-pane fade">
                <div id="mostrar_datos">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div id="cab_ai">
                                    <h2> Asignar Instrucciones</h2>
                                    <input type="hidden" name="in_id_doc" id="txtid_documento"
                                        value="<?php echo $id_documento; ?> " disabled>
                                    <input type="hidden" name="fol_id_doc" id="folio" value="<?php echo $folio; ?> "
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Tipo de documento</label>
                                <input type="text" class="form-control" id="tipe_doc"
                                    value="<?php echo $tipo_documento; ?>" disabled>
                            </div>
                            <?php if ($tipo_documento == "Copia de conocimiento") {  ?>
                            <div id="move_copy" class="col-md-6">
                                <button id="btnCC" class="btn btn-sm btn-primary">Mover documento a copias de
                                    conocimiento</button>
                            </div>
                            <?php } ?>

                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="">Generar folio:</label>
                                <input type="hidden" id="bis_folio" value="<?php echo $folio_bis; ?>">
                                <?php if ($count_bis != 0) { ?>
                                <select class="form-control" name="op_g" id="op_g">
                                    <option value="1">Folio unico</option>
                                    <option value="2">Folio por direccion</option>
                                    <option value="3">Usar bis</option>
                                </select>
                                <?php } else if ($count_bis == 0) { ?>

                                <select class="form-control" name="op_g" id="op_g" disabled>
                                    <option value="0">Selecciona una opcion</option>
                                    <option value="2" selected>Folio por direccion</option>
                                </select>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                               
                                    <div id="zone_open">

                                    </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-7">
                                <label>
                                    Direccion:
                                </label>
                                <select class="form-control" name="txtdireccion" id="txtdireccion" required>
                                    <option value="100">Seleccione una direccion</option>
                                    <?php foreach ($lista_dir as $mostrar) { ?>
                                    <option value="<?php echo $mostrar['id_direccion']; ?>">
                                        <?php echo $mostrar['detalle']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <?php

                                if ($op_control == "BIS") { ?>
                                <label for="">Folio:</label>
                                <input type="text" id="folio_gen2" value="<?php echo $folio; ?>" class="form-control" disabled>
                                <?php } else { ?>
                                <label for="">Folio:</label>
                                <input type="text" id="folio_gen" value="" class="form-control" disabled>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Destinatario:</label>
                                <div id="selectlista3"></div>

                            </div>
                            <div class="col-md-6">
                                <label>Cargo destinatario</label>
                                <div id="selectlista4"></div>

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
                                    <select class="form-control" name="txtdireccion" id="txtdireccion_r" required>
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
                                    <div id="selectlista_dr"></div>

                                </div>
                                <div class="col-md-6">
                                    <label>Cargo destinatario</label>
                                    <div id="selectlista_cr"></div>

                                </div>
                            </div>

                            <hr>

                        </div>
                        <div class="form-row">

                            <div class="col-md-4">
                                <label>Prioridad:</label>
                                <select class="form-control" name="txtprioridad" id="txtprioridad" required>
                                    <option value="2">Extra urgente</option>
                                    <option value="1">Urgente</option>
                                    <option value="0">Normal</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label>Fecha limite</label>
                                <input type="date" class="form-control" value="2030-12-01" id="txtfecha_limite" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Instruccion:</label>
                                <select name="txtinstruccion" id="txtinstruccion" class="form-control">
                                    <?php foreach ($lista_ins as $show) { ?>
                                    <option value="<?php echo $show['id_instruccion']; ?>">
                                        <?php echo $show['n_instruccion']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Otro:</label>
                                <input type="text" id="otro_ins" class="form-control" disabled>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Asunto:</label>
                                <textarea class="form-control" name="txtasunto" id="txtasunto" cols="30"
                                    rows="3"></textarea>
                            </div>
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


</body>

<script>
$(document).ready(function() {

   /* $('#txtasunto').on('paste',function(e){
        e.preventDefault();
        swal('Esta acción esta prohibida');
    });
*/
    id_document = $('#txtid_documento').val();

        $('#txtasunto').keyup(function(){
            let asunto = $('#txtasunto').val();
            array = ['"','\n'];
            console.log(array);
            if(asunto.includes(array[0]) || asunto.includes(array[1]) ){
                //alert("NO USAR COMILLAS");
                swal("Error no se puede usar comillas ni saltos de linea, favor de eliminarlos para poder turnar el documento");
                $('#txtasunto').css("color", "red");
                $('#btn_asignar').hide();
            }else {
                $('#btn_asignar').show();
                $('#txtasunto').css("color", "green");
            }
            console.log(asunto);
        });
    

    $('#btnCC').click(function () {
        let id_document = $('#txtid_documento').val();
        $.ajax({
            type: 'POST',
            url: '../Controller/move_cc.php',
            data: {
                'id_document': id_document
            },
            success: function () {
                swal({
                    title: 'Envio Completado!',
                    text: 'El documento se movio correctamente al apartado de copias de conocimiento',
                    icon: 'success',
                    button: 'aceptar!',
                });
            },
        });
    });




    recargarLista();
    recargarLista_2();
    $('#target').hide();

    //Selecciona bis, folio unico, folio direccion
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
    //genera folio cuando cambia la direccion
    $('#txtdireccion').change(function() {
        var dir = $('#txtdireccion').val();
        var opc = $('#op_g').val();
        form_data = new FormData();
        form_data.append('direccion',dir);
        form_data.append('id_documento',id_document);
        if (opc == 1) {
            dir = 100;
        } else {
            dir = $('#txtdireccion').val();
        }
        console.log(dir);
        $.ajax({
        type: 'POST',
        url: '../Controller/fin_open.php',
        data: form_data,
        contentType: false,
        processData: false,
        success: function(e){
            //console.log("prueba open");
            if(e !=0)
            {
                swal("Existe un folio libre para esta direccion.\n Recuerda los folios libres expiraran al dia siguiente si no son usados \n Al usar un folio libre se inhabilitara el folio generado automaticamente y no sera usado en este documento");
                $('#zone_open').html(e);
            }else{
                $('#zone_open').empty();
            }
           
        },
        });


       i_f = setInterval(() => {
            $.ajax({
            data: form_data,
            url: '../Controller/folio_dir.php',
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(message) {
                var new_folio = message.replace(/['"]+/g, '');
                console.log(new_folio);
                $('#folio_gen').val(new_folio);
            },
        });  
        }, 1000);
      
    });

    //Carga responsable y cargo

    $('#txtdireccion_r').change(function() {
        recargarLista_2();
        //$('#target').show();

    });
    //Carga destinatario y cargo
    $('#txtdireccion').change(function() {
        let val = $('#txtdireccion').val();
        if (val == 1 || val == 51) {
            recargarLista();
            $('#target').show();
        } else {
            recargarLista();
            $('#target').hide();

        }
    });

    //Activar otro

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




});
</script>