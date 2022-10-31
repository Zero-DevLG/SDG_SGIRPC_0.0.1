<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}
    $id_dir = $_SESSION["id_direccion"];
    $sql = $pdo -> prepare("SELECT detalle FROM control_sp WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $direccion = $sql->fetchColumn();
?>

<head>
    <meta charset="utf-8">
    <title>Documentos</title>

    <meta name="viewport" content="width=device-width,user-scalable=no">
    <link href="css/style.css" rel="stylesheet">
    <meta charset="utf-8">
    <!-- CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css?v=<?php echo (rand()); ?>"> -->
    <link rel="stylesheet" type="text/css" href="../css/doc_dir.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="../css/navi.css?v=<?php echo (rand()); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="icon" href="../img/iconos/favicon.jpg" />
    <link rel="stylesheet" href="../css/dropzone.css" />
    <link rel="" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
    <script src="..js/dataTables.fixedColumns.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="../js/navi.js"></script> -->
    <script src="../js/doc_dir.js?v=<?php echo (rand()); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/dropzone.js"></script>
</head>

<body background="../img/fondo_p2.jpg">


    <?php
    include("../Model/navi.php");
    include("../Model/Consultas.php");
    include("modals.php");
    //include("../View/side_var_user.php");

    ?>

    <div class="sidebar-p">
        <div class="option-s">
            <img src="../img/iconos/home.png" id="home-option" class="img-side-sb1" alt="">
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
            <p class="title-option">Documentación interna</p>
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
    <div id="contenido_dinamico">
            <div id="iframeI-2" style="overflow-y: auto;">    
            </div>
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="modalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
            <img id="loading-modal" src="../img/loader26.gif" alt="">
      </div>
    </div>
  </div>
</div>

