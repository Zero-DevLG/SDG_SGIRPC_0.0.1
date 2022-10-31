<?php
    session_start();
    include("../Model/Conexion.php");
        if ($_SESSION['usuario'] == "") {
            header("location:../Controller/cerrar_sesion.php");
        }
    $id_ins=$_POST['id_doc'];

    //Se obtiene el id del documento en general
    $sql = $pdo->prepare("SELECT id_documento,folio_dir  FROM instrucciones_direcciones WHERE id_instruccion = '$id_ins'");
    $sql->execute();
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $get)
    {
        $id_doc = $get['id_documento'];
        $folio_dir_g = $get['folio_dir'];
    }

    //Variables de sesion
    $id_emp     = $_SESSION['id_empleado'];
    $id_dir     = $_SESSION['id_direccion'];
    //Constantes
    $DateAndTime = date(date('Y-m-d H:i:s'));
    $dis = 2;
    $zeroFill = 4;
    $Year = date("Y");
    /// Identificar la direccion 
    $id_dir = $_SESSION['id_direccion'];
    //Obtenemos nombre de la direccion para mostrar
    $sql = $pdo->prepare("SELECT detalle FROM control_sp WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $name_dir = $sql->fetchColumn();
    //Obtenemos el titular de la direccion general
    $sql=$pdo->prepare("SELECT titular FROM equipo_registro WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $titular = $sql->fetchColumn();
    //Obtenemos las direcciones de la direccion general
    $sql = $pdo->prepare("SELECT id_direccion,nombre_direccion FROM direccion WHERE id_direccion_general = '$id_dir'");
    $sql->execute();
    $direcciones = $sql->fetchAll(PDO::FETCH_ASSOC);
    //Obtenemos el folio del documento
    $sql = $pdo->prepare("SELECT folio FROM documentos_externos WHERE id_documento = '$id_doc'");
    $sql->execute();
    $folio = $sql->fetchColumn();
    


       



?>


<head>
    <link rel="stylesheet" href="../css/turn_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller_response_dep.js?v=<?php echo (rand()); ?>"></script>
    <script src="../js/dropzone.js?v=<?php echo (rand()); ?>"></script>
</head>

<div id="main-content-data">
    <div id="head-turn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="logo-sec">
                <img id="logo-head-turn" src="../assets/logos/logo_2022.png" alt="">
                </div>
                <div class="col-md-6">
                    <div id="folio"><h6><?php echo $name_dir ?></h6></div>    
                    <div id="folio">Documento seleccionado: <?php echo $id_doc ?></div>
                    <div id="folio">Folio: <?php echo $folio; ?></div>                    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
                  
                   
                    
                </div>
                <hr>
                <div id="formulario-turno">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="id_documento_r" value="<?php echo $id_doc ?>" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <col-md-4></col-md-4>
                            <col-md-4>
                                <h6>Numero de folio asignado:</h6>
                                <!-- <input id="folio_asignado" type="hidden" class="form-control" value="<?php echo $folio_a ?>" disabled> -->
                                <input id="folio_asignado" type="text" class="form-control" placeholder="<?php echo $folio_dir_g ?>" value="<?php echo $folio_dir_g ?>" disabled>
                            </col-md-4>
                            <col-md-4></col-md-4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <input type="checkbox" name="" id="f_u" checked>Utilizar folio de la direccion para respuesta -->
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="fecha_limite">Fecha de respuesta</label>
                                <input type="date" id="f_r" class="form-control">
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="instruccion">Respuesta</label>
                                <textarea name="instruccion" id="txt_response" placeholder="Escribe una breve descripción de la respuesta" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> 
                            <div id=dropzone>
                                <div id="add_file_database">
                                    <button id="clear_drop" class="btn btn-sm btn-danger optionZone" title="Eliminar todos los archivos">✘</button>
                                </div>

                              
                                <form action="/" class="dropzone" id="fileZoneAt">

                                   <!-- <img src="../img/iconos/cloud.png" id="cloud">-->      
                                </form>

                                <!-- <label for="file">Anexar un archivo</label>
                                <input type="file" name="file"> -->
                            </div>
                        </div>
                        <hr>
                        
                    </div>
                </div>
</div>
<div id="footer">
    <button class="btn btn-sm btn-danger" id="close_response">Salir</button>
    <button class="btn btn-sm btn-success" id="at_doc">Enviar respuesta</button>
</div>

       