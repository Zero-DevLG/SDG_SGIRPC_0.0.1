<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}
    $tipo = $_SESSION['tipo_rol'];


?>




<head>
    <meta charset="utf-8">
    <title>Documentos</title>

    <meta name="viewport" content="width=device-width,user-scalable=no">
    <meta charset="utf-8">
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" type="text/css" href="../css/vista_documento.css?v=<?php echo (rand()); ?>">
    
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
   
    <script src="../js/doc.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/vd.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/vdas.js?v=<?php echo (rand()); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="../js/dropzone.js"></script>




</head>
<?php
    include("../Model/navi.php");
    include("../Model/Consultas.php");
    //include("../View/side_var_user.php");

    ?>
<body>
    <?php
        if($tipo == 1){
    ?>
    <div class="sidebar-p">
        <div class="option-s">
            <img src="../img/iconos/home.png" class="img-side-sb1" alt="">
            <p class="title-option">Pagina principal</p>
        </div>
        <div class="option-s" id="option-t">
            <img src="../img/iconos/dashboard.png" class="img-side" alt="">
            <p class="title-option">Tablero</p>
        </div>
        <div class="option-s" id="option-de">
            <img src="../img/iconos/buzon1.png" class="img-side" alt="">
            <p class="title-option">Documentación externa</p>
        </div>
        <div class="option-s">
            <img src="../img/iconos/buzon2.png" class="img-side" alt="">
            <p class="title-option">Documentación atendidos</p>
        </div>
        <div class="option-s" id="option-rep">
            <img src="../img/iconos/repos.png" class="img-side" alt="">
            <p class="title-option">Repositorio</p>
        </div>

        <div class="option-s">
            <img src="../img/iconos/support.png" class="img-side" alt="">
            <p class="title-option">Soporte técnico</p>
        </div>
       
        
    </div>

    <?php } ?>

    <div class="sidebar-p">
        <div class="option-s">
            <img src="../img/iconos/home.png" class="img-side-sb1" alt="">
            <p class="title-option">Pagina principal</p>
        </div>
        <div class="option-s" id="option-t">
            <img src="../img/iconos/dashboard.png" class="img-side" alt="">
            <p class="title-option">Tablero</p>
        </div>
        <div class="option-s" id="option-be">
            <img src="../img/iconos/buzon1.png" class="img-side" alt="">
            <p class="title-option">Buzon de entrada</p>
        </div>
        <div class="option-s" id="option-rep">
            <img src="../img/iconos/repos.png" class="img-side" alt="">
            <p class="title-option">Repositorio</p>
        </div>

        <div class="option-s">
            <img src="../img/iconos/support.png" class="img-side" alt="">
            <p class="title-option">Soporte técnico</p>
        </div>
       
        
    </div>


    <div id="loading-data">
        <div id="content-load">
            <img src="../img/cdmx2.gif" alt="">
            <h1>Espere un momento...</h1>
        </div>  
    </div>
    <div id="iframeI">       
    </div>
</body>




<!-- Modal para responder documento  -->
<!-- Modal -->
<div class="modal fade" id="ModalR" role="document">
    <div class="modal-dialog modal-lg modal-sm">

        <!-- Modal content-->
        <div  class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width:600px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div  class="modal-body">
               <div class="form-row">
                   <div class="col-md-12">
                        <center><h3>Registrar respuesta</h3></center>
                        <input id="id_doc" type="text" value="" disabled>
                   </div>
                <div class="col-md-4">
                    <label>Folio del documento de respuesta:</label>
                    <input type="text" class="form-control" id="folio_r">
                </div>
                <div class="col-md-4">
                    <label>Fecha de respuesta</label>
                    <input type="date" class="form-control" id="f_r">
                </div>
               </div>   
               <div class="form-row">
                    <div class="col-md-12">
                        <label>Respuesta:</label>
                        <textarea  id="respuesta" cols="30" rows="10" class="form-control"></textarea>
                    </div>
               </div>
               <div class="form-row">
                    <div class="col-md-12">
                        <label>Adjuntar oficio de respuesta:</label>
                        <input type="file" class="form-control" id="archivo2">
                    </div>
               </div>
               
               <br>
               <div class="form-row">
                   <div class="col-md-4">

                   </div>
                   <div class="col-md-4">
                        <button id="reg_res" class="btn btn-primary btn-sm">Registrar respuesta</button>
                   </div>


               </div>





            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>
</div>
<!--
<div id="test_22">

<title>Prueba de test</title>

</div>
-->

<!-- MODAL VISTA -->



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
            <div id="data_document_p"></div>
      </div>
    </div>
  </div>
</div>


