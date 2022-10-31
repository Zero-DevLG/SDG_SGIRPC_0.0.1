<?php
session_start();
error_reporting(E_ERROR);
include("../Model/Conexion.php");
if ($_SESSION['usuario'] == "") {
    header("location:../Controller/cerrar_sesion.php");
}

    $id_dir = $_SESSION["id_direccion"];
    $id_dir_s = $_SESSION['id_dir_s'];
    $sql = $pdo -> prepare("SELECT detalle FROM control_sp WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $direccion = $sql->fetchColumn();

    //Se obtiene la direccion
    $sql = $pdo ->prepare("SELECT nombre_direccion FROM direccion WHERE id_direccion = '$id_dir_s'");
    $sql->execute();
    $direccion_s = $sql->fetchColumn();

    ////Se obtienen si tiene C/J
    $sql = $pdo->prepare("SELECT id_departamento FROM departamentos WHERE id_direccion_general = '$id_dir'");
    $sql->execute();
    $data_dep = $sql->fetchAll(PDO::FETCH_ASSOC);



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
    <script src="../js/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="../js/navi.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/doc_dep.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/tables_dep.js"></script>
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
       <div id="view_data">
            <div id="iframeI-2" style="overflow-y: auto;">    
                <div id="title-dir">
                <h5><?php echo $direccion.'/'.$direccion_s; ?></h5>
                </div>
                <hr id="sep-main">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Documentos recibidos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <!-- <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Documentos archivados</button> -->
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#doc_dep_tr" type="button" role="tab" aria-controls="contact" aria-selected="false">Documentos turnados</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#doc_dep_at" type="button" role="tab" aria-controls="contact" aria-selected="false">Documentos atendidos</button>
                    </li>
                </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">  
                                <table id="doc_dep" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                                    <thead>
                                        <tr>
                                            <th id="td-id">id</th>
                                            <th>Folio</th>
                                            <th>Folio dirección general</th>
                                            <th>N.Oficio</th>
                                            <th>Asunto</th>
                                            <th>Fecha limite</th>
                                            <th>Instruccion dirección general</th>
                                            <th>Prioridad</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Documentos archivados</div>
                        <div class="tab-pane fade" id="doc_dep_tr" role="tabpanel" aria-labelledby="contact-tab">
                        <table id="table_dep_tr" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <th>id</th>
                                            <th>Folio SP</th>
                                            <th>Folio dirección</th>
                                            <th>Numero de oficio</th>
                                            <th>Fecha limite</th>
                                            <th>Turnado a</th>
                                            <th>Prioridad</th>
                                        </thead>
                                    </table>


                        </div>
                        <div class="tab-pane fade" id="doc_dep_at" role="tabpanel" aria-labelledby="contact-tab">
                            <table id="table_dep_at" style="cursor:pointer;" class="table table-sm table-borderedless table-hover">
                                        <thead>
                                            <th>id</th>
                                            <th>Folio SP</th>
                                            <th>Folio respuesta</th>
                                            <th>Numero de oficio</th>
                                            <th>Fecha oficio</th>
                                            <th>Fecha respuesta</th>
                                            <th>Respondio</th>
                                            <th>respuesta</th>
                                        </thead>
                            </table>
                        </div>
                    </div>
    
            </div>
       </div>
       
    </div>
</body>

