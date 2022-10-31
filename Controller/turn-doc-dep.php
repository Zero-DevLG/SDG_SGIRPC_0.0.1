<?php
    session_start();
    include("../Model/Conexion.php");
        if ($_SESSION['usuario'] == "") {
            header("location:../Controller/cerrar_sesion.php");
        }
    $id_ins=$_POST['id_ins'];
    //Obtenemos el id del documento general
    $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones WHERE id_instruccion = '$id_ins'");
    $sql->execute();
    $id_doc = $sql->fetchColumn();

    //Variables de sesion
    $id_emp     = $_SESSION['id_empleado'];
    $id_dir     = $_SESSION['id_direccion'];
    $id_dir_s   = $_SESSION['id_dir_s'];
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
    //Obtenemos el numero de turno disponible

    //Se obtiene el folio que ya se habia generado
    $sql = $pdo->prepare("SELECT folio_dir FROM instrucciones_direcciones WHERE id_instruccion = '$id_ins'");
    $sql->execute();
    $folio_dir = $sql->fetchColumn();

    //Obtenemos jud/coord
    $sql = $pdo->prepare("SELECT nombre_departamento,id_departamento FROM  departamentos WHERE id_direccion = '$id_dir_s'");
    $sql->execute();
    $data_dep = $sql->fetchAll(PDO::FETCH_ASSOC);  

    

?>

<head>
    <link rel="stylesheet" href="../css/turn_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller_turn_dep.js?v=<?php echo (rand()); ?>"></script>
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
                    <div id="folio">Folio dirección: <?php echo $folio_dir; ?></div>                    
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
                  
                   
                    
                </div>
                <hr>
                <div id="formulario-turno">
                    <div class="container-fluid">
                        <div class="row">
                            <col-md-4></col-md-4>
                            <col-md-4>
                                <h6>Numero de folio asignado:</h6>
                                <!-- <input id="folio_asignado" type="hidden" class="form-control" value="<?php echo $folio_a ?>" disabled> -->
                                <input id="folio_asignado" type="text" class="form-control" placeholder="<?php echo $folio_dir ?>" value="<?php echo $folio_dir ?>" disabled>
                            </col-md-4>
                            <col-md-4></col-md-4>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="destiny">Turnar a:</label>
                                <select name="destiny" class="form-control" id="destiny">
                                    <option value="0">Selecciona una opción</option>    
                                    <?php foreach($data_dep as $get){ ?>
                                    <option value="<?php echo $get['id_departamento']; ?>"><?php echo $get['nombre_departamento']; ?></option>
                                    <?php } ?>
                                </select>
                                
                                
                            </div>
                            <div class="col-md-4"><button id="add_dep" class="btn btn-success btn-sm">Añadir</button></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="selected-p" onclick="myFunction(event)"></div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="instruccion">Instrucción</label>
                                <textarea name="instruccion" id="txt_instruccion" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12"> 
                            <div id=dropzone>
                                <div id="add_file_database">
                                    <button id="clear_drop" class="btn btn-sm btn-danger optionZone" title="Eliminar todos los archivos">✘</button>
                                </div>

                              
                                <form action="/" class="dropzone" id="fileZone">

                                   <!-- <img src="../img/iconos/cloud.png" id="cloud">-->      
                                </form>

                                <!-- <label for="file">Anexar un archivo</label>
                                <input type="file" name="file"> -->
                            </div>
                        </div>
                    </div>
                </div>
</div>
<div id="footer">
    <button class="btn btn-sm btn-danger" id="close_turn">Salir</button>
    <button class="btn btn-sm btn-success" id="turn_doc_dep">Turnar</button>
</div>

                               
                    