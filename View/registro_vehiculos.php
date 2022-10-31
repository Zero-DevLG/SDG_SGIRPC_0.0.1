<?php
session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location: ../index.php");
}
//include("../Model/navBar.php");
//$bar = new navBaradmin();
//$bar->construye();
require '../Model/consultas_vehicular.php';
include '../Model/modals.php';
include '../Model/cache.php';
nocache();
require '../Controller/vehiculo_controlador.php';
$accionCancelar = "disabled";
echo $area_usr = $_SESSION['area'];
echo $direccion_usr = $_SESSION['direccion'];
?>
<html>

<head>

</head>

<body style="overflow-x: hidden;">


    <div id="botones">
        <a href="#" id="btn_registro" data-toggle="modal" data-target="#exampleModal2">
            <img id="reg_auto" src="../img/iconos/llanta.png" alt="" title="Registrar Vehiculo">
        </a>
        <img src="../img/iconos/+.png" style="width:35px; position:relative; top:35px; left:20px;" alt="">
    </div>


    <div id="side2">
        <img id="logo_mec" src="../img/logo_mec.jpg" alt="">
    </div>

    <div id="side1">



        <ul class='nav nav-tabs' id="tabs_documentos">

            <li><a data-toggle="tab" href="#menu_g">Activos</a></li>
            <li><a data-toggle="tab" href="#menu_as">Mantenimiento</a></li>
            <li><a data-toggle="tab" href="#menu_as">Baja</a></li>

        </ul>

        <div class="tab-content">
            <div id="menu_g" class="tab-pane fade in active">
                <div id="tabla_info">
                    <table id="table1"
                        class=" table  table-sm table-responsive-md table-striped table-hover AlldataTables">
                        <thead>
                            <tr>
                                <th>Placas</th>
                                <th>Tipo de Vehiculo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Direccion</th>
                                <th>Opciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista_vehiculos as $empleado) { ?>
                            <tr>

                                <td><?php echo $empleado['placas']; ?></td>
                                <td><?php echo $empleado['detalle']; ?></td>
                                <td><?php echo $empleado['marca']; ?></td>
                                <td><?php echo $empleado['modelo']; ?></td>
                                <td><?php echo $empleado['direccion']; ?></td>
                                <td data-valor='<?php echo $empleado['id_vehiculo']; ?>' class='click2'>
                                    <form action="../Controller/vehiculo_controlador.php" method="post">
                                        <input type="hidden" name="txtID"
                                            value="<?php echo $empleado['id_vehiculo']; ?>">

                                        <button class="btn"><img title='Ver vehiculo' src='../img/ver.png'
                                                width='20px'></button>


                                        <!-- <button value="btnEliminar" class="btn"
                        onclick="return Confirmar('Realmente deseas borrar el registro');" type="submit"
                        name="accion"><img src="../img/garbage.png" alt=""
                            style="width: 20px;"></button> -->
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>





</body>
<!-- <iframe id="tabla_ajax" src="tabla1.php" frameborder="0" width="400px" height="500px"></iframe> -->




<script>
$(document).ready(function() {
    $(".click2").click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        //$('#side2').html(
        // "<img id='loading' src='../img/loading1.gif' alt='' style='display: block; border-radius: 25px;'>"
        // );
        $('#side2').empty();
        $('#side2').html(
            "<img id='loading' src='../img/auto.gif' alt=''>"
        );
        setTimeout(function() {
            $(function() {
                $('#side2').empty();
                var textoBusqueda = data;
                if (textoBusqueda != "") {
                    $.post(
                        "../Controller/visualizar_vehiculo.php", {
                            valorBusqueda: textoBusqueda
                        },
                        function(mensaje2) {
                            var c2 = document.querySelector(
                                "#resultadoBusqueda");
                            //console.log("Es:" + textoBusqueda);
                            $("#side2").html(mensaje2);
                        }
                    );
                } else {
                    $("#resultadoBusqueda").html("<p>JQUERY VACIO </p>");
                }
            });



            //alert(data);
        }, 1500);
        //alert("paso 2");



    });
    $('#table1').DataTable({
        responsive: true,
        "pagingType": "full_numbers",

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
        }
    });

});
</script>


</html>