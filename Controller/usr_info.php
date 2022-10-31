<?php
error_reporting(E_ERROR);
session_start();
include("../Model/Conexion.php");
$id_usr = $_SESSION['id_empleado'];
$last_login = $_SESSION['last_login'];
$nombre = $_SESSION['nombre'] . " " . $_SESSION['apellido'];
$direccion = $_SESSION['id_direccion'];
$Fecha = date('Y-m-d');

$total_reg = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE id_empleado_r = '$id_usr'");
$total_reg->execute();
$nT = $total_reg->fetchColumn();

$total_reg = $pdo->prepare("SELECT COUNT(id_documento) FROM documento_instruccion WHERE id_empleado = '$id_usr'");
$total_reg->execute();
$nT2 = $total_reg->fetchColumn();


$total_reg = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE id_empleado_r = '$id_usr' AND fecha_registro='$Fecha'");
$total_reg->execute();
$FT = $total_reg->fetchColumn();


$total_reg = $pdo->prepare("SELECT COUNT(id_documento) FROM documento_instruccion  WHERE id_empleado = '$id_usr' AND fecha_instruccion = '$Fecha'");
$total_reg->execute();
$FT2 = $total_reg->fetchColumn();

$list_doc = $pdo->prepare("SELECT de.id_documento,op.num,de.folio,de.fecha_registro from documentos_externos as de INNER JOIN op_control as op ON op.id_documento = de.id_documento WHERE de.id_empleado_r = '$id_usr'");
$list_doc->execute();
$list_doc_usr = $list_doc->fetchAll(PDO::FETCH_ASSOC);

$data_usr = $pdo->prepare("SELECT sp.detalle FROM empleado as e INNER JOIN control_sp as sp ON e.id_direccion = sp.id_direccion WHERE e.id_empleado = '$id_usr'");
$data_usr->execute();
$dir = $data_usr->fetchcolumn();
//$list_usr_data = $data_usr->fetchAll(PDO::FETCH_ASSOC);


?>

<div id="info_usr">
    <h4>Datos del usuario</h4>
    <br>
    <label>Nombre:</label>
    <h5><?php echo $nombre  ?></h5>
    <label>Ultima fecha de acceso:</label>
    <h5><?php echo $last_login;  ?></h5>
    <hr>
    <label>Direccion:</label>
    <h5><?php echo $dir;  ?></h5>
    <hr>
    <div id="report_usr">
        <p>Generar reporte</p>
        <div class="form-row">
            <div class="col-md-6">
       
        <label>Del:</label>
        <input id="f_i" type="date" class="form-control">
            </div>
            <div class="col-md-6">
            <label> hasta:</label>
            <input id="f_f" type="date" class="form-control">
            </div>
           
        </div>
         <br>
        <button id="gen_report" class="btn btn-sm btn-primary">Generar reporte </button>
    </div>
    
    <hr id="v">
    <ul class='nav nav-tabs' id="tabs_documentos5">
        <li><a data-toggle="tab" id="" href="#tt">Titular</a>
        </li>
        <li><a data-toggle="tab" id="" href="#dir">Direcciones</a></li>
    </ul>
    <div id="table_reg">
        <div class="tab-content">
            <div id="tt" class="tab-pane fade in active">
                <table id="table_tt" class="table table-sm table-borderless">
                    <thead>
                        <th>Id</th>
                        <th>Folio</th>
                        <th>Numero Oficialia</th>
                        <th>Fecha registro</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <div id="dir" class="tab-pane fade in">
                <table id="table_dir" class="table table-sm table-borderless">
                    <thead>
                        <th>Id</th>
                        <th>Folio</th>
                        <th>Numero Oficialia</th>
                        <th>Fecha registro</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
    $(document).ready(function() {

        $('#gen_report').click(function(){
            //alert("Hola");
             let f1 = $('#f_i').val();
             let f2 = $('#f_f').val();

             form_data = new FormData();
            form_data.append('fi',f1);
            form_data.append('ff',f2);
            console.log(f1,f2);

            $.ajax({
        type: 'POST',
        url: '../Controller/report_usr.php',
        data: form_data,
        contentType: false,
        processData: false,
        success: function(e){
            console.log(e);
            console.log("prueba open");
            
           
        },
        });

        });

        var table_areas = $('#table_tt').dataTable({
            destroy: true,
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar registros: _MENU_",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "",
                "sInfoEmpty": "",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "<<",
                    "sLast": ">>",
                    "sNext": ">",
                    "sPrevious": "<"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": "../funciones_usr_t.php",
            "columns": [{
                    "data": "id_documento"
                },
                {
                    "data": "folio"
                },
                {
                    "data": "num"
                },
                {
                    "data": "fecha_registro"
                }

            ],

            rowCallback: function(row, data) {
                if (data['estatus'] == 6) {
                    $($(row).find("td")[1]).css("color", "#000000");
                    $($(row).find("td")[2]).css("color", "#000000");
                    $($(row).find("td")[3]).css("color", "#000000");
                    $($(row).find("td")[4]).css("color", "#000000");
                    $($(row).find("td")[5]).css("color", "#000000");
                    $($(row).find("td")[6]).css("color", "#000000");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "#000000");
                }


                if (data['estatus'] == 303) {
                    $($(row).find("td")[1]).css("color", "red");
                    $($(row).find("td")[2]).css("color", "red");
                    $($(row).find("td")[3]).css("color", "red");
                    $($(row).find("td")[4]).css("color", "red");
                    $($(row).find("td")[5]).css("color", "red");
                    $($(row).find("td")[6]).css("color", "red");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "red");

                }
                if (data['bis'] == 1) {
                    $($(row).find("td")[1]).css("color", "blue");
                    $($(row).find("td")[2]).css("color", "blue");
                    $($(row).find("td")[3]).css("color", "blue");
                    $($(row).find("td")[4]).css("color", "blue");
                    $($(row).find("td")[5]).css("color", "blue");
                    $($(row).find("td")[6]).css("color", "blue");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "blue");

                }

                var fecha_limite = new Date(data['fecha_limite']);
                var fecha = new Date();

                if (fecha > fecha_limite && data['estatus'] == 2) {
                    $($(row).find("td")[1]).css("color", "#e04914");
                    $($(row).find("td")[2]).css("color", "#e04914");
                    $($(row).find("td")[3]).css("color", "#e04914");
                    $($(row).find("td")[4]).css("color", "#e04914");
                    $($(row).find("td")[5]).css("color", "#e04914");
                    $($(row).find("td")[6]).css("color", "#e04914");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "#e04914");
                }


            }

        });
        var table_dir = $('#table_dir').dataTable({
            "bAutoWidth": false,
            language: {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar registros: _MENU_",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "",
                "sInfoEmpty": "",
                "sInfoFiltered": "",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "<<",
                    "sLast": ">>",
                    "sNext": ">",
                    "sPrevious": "<"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            "ajax": "../funciones_usr_dir.php",
            "columns": [{
                    "data": "id_documento"
                },
                {
                    "data": "folio"
                },
                {
                    "data": "num"
                },
                {
                    "data": "fecha_registro"
                }

            ],

            rowCallback: function(row, data) {
                if (data['estatus'] == 6) {
                    $($(row).find("td")[1]).css("color", "#000000");
                    $($(row).find("td")[2]).css("color", "#000000");
                    $($(row).find("td")[3]).css("color", "#000000");
                    $($(row).find("td")[4]).css("color", "#000000");
                    $($(row).find("td")[5]).css("color", "#000000");
                    $($(row).find("td")[6]).css("color", "#000000");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "#000000");
                }


                if (data['estatus'] == 303) {
                    $($(row).find("td")[1]).css("color", "red");
                    $($(row).find("td")[2]).css("color", "red");
                    $($(row).find("td")[3]).css("color", "red");
                    $($(row).find("td")[4]).css("color", "red");
                    $($(row).find("td")[5]).css("color", "red");
                    $($(row).find("td")[6]).css("color", "red");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "red");

                }
                if (data['bis'] == 1) {
                    $($(row).find("td")[1]).css("color", "blue");
                    $($(row).find("td")[2]).css("color", "blue");
                    $($(row).find("td")[3]).css("color", "blue");
                    $($(row).find("td")[4]).css("color", "blue");
                    $($(row).find("td")[5]).css("color", "blue");
                    $($(row).find("td")[6]).css("color", "blue");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "blue");

                }

                var fecha_limite = new Date(data['fecha_limite']);
                var fecha = new Date();

                if (fecha > fecha_limite && data['estatus'] == 2) {
                    $($(row).find("td")[1]).css("color", "#e04914");
                    $($(row).find("td")[2]).css("color", "#e04914");
                    $($(row).find("td")[3]).css("color", "#e04914");
                    $($(row).find("td")[4]).css("color", "#e04914");
                    $($(row).find("td")[5]).css("color", "#e04914");
                    $($(row).find("td")[6]).css("color", "#e04914");
                    $($(row).find("td")[0]).css("color", "white");
                    $($(row).find("td")[0]).css("background-color", "#e04914");
                }


            }

        });
    })
    </script>