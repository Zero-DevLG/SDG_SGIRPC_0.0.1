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
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <!-- 
    RTL version
-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/usr_bar.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/historico.css?v=<?php echo (rand()); ?>">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../css/toastr.min.css">
    <link rel="icon" href="../img/iconos/favicon.jpg" />
    <link rel="stylesheet" href="../css/dropzone.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/navi.js"></script>
    <script src="../js/tables.js"></script>
    <script src="../js/control_tables.js"></script>
    <script src="../js/doc.js"></script>
    <script src="../js/vd.js"></script>
    <script src="../js/vdas.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/space.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="../js/notify.js"></script>
    <script src="../js/dropzone.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>




</head>

<body background="../img/fondo_p2.jpg">


    <?php
    include("../Model/navi.php");
    include("../Model/Consultas.php");
    include("../View/side_var_user.php");

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
        <div id="iframeI" style="overflow-y: auto;">
            <div id="cab_doc">
                <img id="banner_cd" src="../img/banners/banner_cd.jpg" alt="">
            </div>
            <div id="contenido">
                <div id="title_cabezera">
                    <h1>Registro de documentos historicos</h1>
                </div>
                <hr>

            </div>



        </div>
        <div id="iframeD" style="overflow-y:scroll">
            <div id="resultadoBusqueda">
                <img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">
            </div>
        </div>


        <div id="btn-content">
         
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




        <div id="menu2">

            <div name="formu" id="formu2" autocomplete="on">
                <label id="enc_filtrar_doc" for="">
                    <h1>Filtrar resultados</h1>
                </label>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha del oficio</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="f_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="f_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha de registro</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="fr_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="fr_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-9">
                            <label>Fecha de recibido</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">

                            Del: <input type="date" id="frec_i" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Al: <input type="date" id="frec_l" class="form-control">
                        </div>
                        <div class="col-md-4">

                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <label>No. de oficio</label>
                            <input type="text" id="n_oficio" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Tipo de Documento</label>
                            <select name="txttipo" id="tipo" class="form-control">
                                <option value="">Todos</option>
                                <?php foreach ($lista_tipo as $mostrartipo) { ?>
                                <option value="<?php echo $mostrartipo['id_tipo_doc']; ?>">
                                    <?php echo $mostrartipo['descripcion']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Direccion:</label>
                            <select class="form-control" id="direccion2">
                                <?php foreach ($lista_sp as $mostrar) { ?>
                                <option value="<?php echo $mostrar['id_direccion'] ?>"><?php echo $mostrar['detalle'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Control de Oficialia:</label>
                            <input type="text" id="oficialia" class="form-control" required>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <br>
                            <dd>
                                <button class="btn btn-success" id="btn_fecha_oficio">Filtrar</button>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div id="menu3">
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
                    <label>Fecha del oficio:</label>
                    <label>Fecha inicial</label>
                    <input type="date" class="form-control" id="fecha_oficio_i">
                </div>

            </div>
        </div>
    </div>
    <div id="temp-screen"></div>
    <div id="rebuild">
        <img src="../img/cdmx2.gif" alt="">
    </div>

    <div id="data_small_device">
        <a href="#"><img src="../img/iconos/close.png" id="close_2" title="cerrar" alt=""></a>
        <div id="get_data">

        </div>
    </div>

</body>

<!-- Modal para responder documento  -->
<!-- Modal -->
<div class="modal fade" id="modalAdjuntar" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div style="background-color:#595a5a" class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width:600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div style="background-color:#595a5a" class="modal-body">
                <ul class='nav nav-tabs'>

                    <li><a data-toggle="tab" href="#menu_a">Adjuntar documento</a></li>

                </ul>
                <div class="tab-content">

                    <div id="menu_a" class="tab-pane fade in active">
                        <input type="hidden" name="txtid_documento" id="txtid_documento"
                            value="<?php echo $id_documento; ?> ">

                        <div id="formArchivo"></div>
                    </div>
                </div>





            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>