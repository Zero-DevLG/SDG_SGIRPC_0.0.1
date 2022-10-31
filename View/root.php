<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] ==""){
    header("location:../Controller/cerrar_sesion.php");
}
?>
    <head>
    <meta charset="utf-8">
    <title>Administrador</title>
    
    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/usr_bar.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/admin.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/space.js"></script>
    <script src="../js/toastr.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/admin.js"></script>

    
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
            <div id="cab_doc"></div>
                <div id="contenido">

                    <ul class='nav nav-tabs' id="tabs_documentos">
                    <li><a data-toggle="tab" id="loadGen" href="#menu_u">Usuarios</a></li>
                    <li><a data-toggle="tab" id="loadAss" href="#menu_t">Tickets</a></li>
                    <li><a data-toggle="tab" id="loadEs" href="#menu_es">Tareas asignadas</a></li>
                    <li><a data-toggle="tab" id="loadEs" href="#menu_es">Inventario</a></li>
                    <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>
                    </ul>

                        <div class="tab-content">
                            <div id="menu_u" class="tab-pane fade in active">
                                    <div id="list_usr">
                                        <table id="usr" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Nombre</th>
                                                        <th>Direccion</th>
                                                        <th>Fecha registro</th>
                                                        <th>Correo</th>
                                                        <th>No. empleado</th>
                                                        <th>activo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                    </div>
                            </div>
                            <div id="menu_t" class="tab-pane fade in">
                            <div id="subPage">
                            <ul class='nav nav-tabs' id="tabs_documentos">
                                    <li><a data-toggle="tab" id="loadGen" href="#menu_a">Abiertos</a></li>
                                    <li><a data-toggle="tab" id="loadAss" href="#menu_c">Cerrados</a></li>
                                    <li><a data-toggle="tab" id="loadEs" href="#menu_es">Resultado filtrados</a></li>
                                    <li><a data-toggle="tab" id="loadIns" href="#menu_ins" style="display: none;">Bienvenida</a></li>

                                </ul>
                            <div class="tab-content">
                                <div id="menu_a" class="tab-pane fade in active">
                                    <div id="ticket_open_pos">
                                        <table id="ticket_open" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>No.Ticket</th>
                                                        <th>Direccion</th>
                                                        <th>Tema</th>
                                                        <th>Fecha registro</th>
                                                        <th>Estatus</th>
                                                        <th>Atiende</th>
                                                        <th>Fecha limite</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                    </div>
            
                                </div>   
                                <div id="menu_es" class="tab-pane fade in">
                                <div id="table_filtro">
                                        Prueba
                                    </div>
                            </div>    
                            </div>
                            
                        </div>   

                </div>
            </div>


               
    
        </div>
    </div>

    <div id="iframeD" style="overflow-y:scroll">
            <div id="resultadoBusqueda">
                <img id="img_null" src="../img/null.jpg" width="450px" height="510px" alt="">
            </div>
        </div>

       
        <div id="btn-content">
            <img src="../img/iconos/add.png" id="add" alt="">
            <img src="../img/iconos/search_es.png" id="search" alt="">
            <img src="../img/iconos/close.png" alt="" id="close_add">
            <div id=filt>
            
                
            </div>
              
        </div>
        <script>
            var arrayFiles = [];
           Dropzone.options.drop2 = {
                
                addRemoveLinks: true,
                aceptedFile: ".pdf",
                maxFilesize: 2,
                maxFiles:20,
                    init: function(){
                        $('.dz-remove').text("Remover archivo");
                        this.on("addedfile",function(file){
                            $('#add_file_database').show();
                            $('#clear_drop').show();
                            arrayFiles.push(file);
                            console.log("arrayFiles", arrayFiles);
                        });
                        this.on("removedfile",function(file){
                           var index = arrayFiles.indexOf(file);
                            arrayFiles.splice(index, 1);
                            console.log("arrayFiles",arrayFiles);
                        });
                    }        

            }
            $('#clear_drop').click(function(){
                Dropzone.forElement("#drop2").removeAllFiles(true);
            });

            $("#up_database").click(function(){
                var cat = $('#top_c').val();
                let folio = $('#txtfolio2').val();
                //alert(folio);
                if(folio == ""){
                    swal("Por favor genera un folio para subir los archivos")
                }else{
                    //swal("Folio detectado");
                        if(arrayFiles.length > 0)
                        {
                            var listaFiles = [];
                            var finalFor = 0;
                            for(var i = 0; i < arrayFiles.length; i++ ){
                                var datosFiles = new FormData();
                                    datosFiles.append("file",arrayFiles[i]);
                                    datosFiles.append("folio",folio);
                                    datosFiles.append("cat",cat);
                                
                                $.ajax({
                                type: 'POST',
                                url: '../Controller/up_database.php',
                                data: datosFiles,
                                contentType: false,
                                processData: false,
                                success: function(e){
                                    listaFiles.push({"foto":e});
                                    l_files = JSON.stringify(listaFiles);
                                    if((finalFor + 1) == arrayFiles.length){
                                        //addFile(l_files);
                                        finalFor = 0;
                                    }
                                    finalFor ++;
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

<!-- Modal para responder documento  -->
<!-- Modal -->
<div class="modal fade" id="modalAdjuntar" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div style="background-color:#595a5a"  class="modal-content">
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