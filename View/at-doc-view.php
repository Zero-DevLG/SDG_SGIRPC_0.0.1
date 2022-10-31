<?php
    session_start();
    include("../Model/Conexion.php");
        if ($_SESSION['usuario'] == "") {
            header("location:../Controller/cerrar_sesion.php");
        }
    $id_doc=$_POST['id_doc'];

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
    // //Obtenemos el numero de turno disponible

        
    //     //Verificamos si el usuario ya estaba usando un folio y si esta sigue disponible (_En caso de salir inesperadamente del sistema)
    //     $sql = $pdo->prepare("SELECT folio_temp,id_temp FROM folio_temp WHERE id_direccion ='$id_dir' AND disponible = 2 AND  id_emp_reg = $id_emp");
    //     $sql->execute();
    //     $data_temp_o = $sql->fetchAll(PDO::FETCH_ASSOC);
    //     if($data_temp_o)
    //     {
    //         foreach($data_temp_o as $get)
    //         {
    //             $folio_temp = $get['folio_temp'];
    //             $id_temp = $get['id_temp'];
    //         }
    //          // se marca dicho folio como no disponible para evitar un error de duplicidad
    //          $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 2 WHERE id_temp = '$id_temp'");
    //          $sql->execute();
    //          //Switch para obtener el prefijo
    //          $folio_a = $folio_temp;

    //     }else
    //     {

    //          //Verificamos si existe un folio en temporales disponible
    // $sql = $pdo->prepare("SELECT folio_temp,id_temp FROM folio_temp WHERE id_direccion = '$id_dir' AND disponible = 1");
    // $sql->execute();
    // $data_temp = $sql->fetchAll(PDO::FETCH_ASSOC);
    //     //Comprobamos si obtuvimos resultado
    //     if($data_temp)
    //     {
    //         //Si hay un numero disponible se ocupara para turnar
    //         foreach($data_temp as $get)
    //         {
    //             $folio_temp = $get['folio_temp'];
    //             $id_temp = $get['id_temp'];
    //         }
    //         // se marca dicho folio como no disponible para evitar un error de duplicidad
    //         $sql = $pdo->prepare("UPDATE folio_temp SET disponible = 2 WHERE id_temp = '$id_temp'");
    //         $sql->execute();

    //         //Actualizamos al dueño del folio para evitar duplicidad
    //         $sql = $pdo->prepare("UPDATE folio_temp SET id_emp_reg = '$id_emp' WHERE id_temp = '$id_temp'");
    //         $sql->execute();
    //         //Switch para obtener el prefijo
    //         $folio_a = $folio_temp;
    //     }else{
    //         //Verificamos si esta en uso el folio consecutivo
    //         $sql=$pdo->prepare("SELECT MAX(folio_temp) FROM folio_temp WHERE id_direccion='$id_dir'");
    //         $sql->execute();
    //         $folio_temp_use = $sql->fetchColumn();
    //         if($folio_temp_use)
    //         {
    //              //Obtenemos el folio directamente del consecutivo original
    //             $sql = $pdo->prepare("SELECT contador_dir FROM control_sp WHERE id_direccion = '$id_dir'");
    //             $sql->execute();
    //             $folio_control_sp = $sql->fetchColumn();

    //             if($folio_temp_use >= $folio_control_sp)
    //             {
    //                 $folio_a = $folio_temp_use + 0001;
    //                 $folio_a = str_pad($folio_a, $zeroFill, '0', STR_PAD_LEFT);

    //                 $sql = $pdo -> prepare("INSERT INTO folio_temp(folio_temp,id_direccion,disponible,date_reg,id_emp_reg) VALUES('$folio_a','$id_dir','$dis','$DateAndTime','$id_emp')");
    //                 $sql->execute();
    //             }
    //         }else{
    //             //Obtenemos el folio directamente del consecutivo original
    //             $sql = $pdo->prepare("SELECT contador_dir FROM control_sp WHERE id_direccion = '$id_dir'");
    //             $sql->execute();
    //             $folio_a2 = $sql->fetchColumn();
    //             $sql = $pdo -> prepare("INSERT INTO folio_temp(folio_temp,id_direccion,disponible,date_reg,id_emp_reg) VALUES('$folio_a2','$id_dir','$dis','$DateAndTime','$id_emp')");
    //             $sql->execute();
                
    //              $folio_a = $folio_a2;
    //              $folio_a = str_pad($folio_a, $zeroFill, '0', STR_PAD_LEFT);
                


    //         }
           
    // }
        
//     }

$sql = $pdo->prepare("SELECT contador_dir FROM control_sp WHERE id_direccion = '$id_dir'");
$sql->execute();
$count = $sql->fetchColumn();

switch($id_dir)
{
    case '13':
        $folio_s = 'DGAR-' . $count . '-' . $Year;
    break;

    case '9':
        $folio_s = 'DGR-' . $count . '-' . $Year;
    break;

    case '10':
        $folio_s = 'DGTO-' . $count . '-' . $Year;
    break;

    case '16':
        $folio_s = 'DEAF-' . $count . '-' . $Year;
    break;

    case '8':
        $folio_s = 'DEAJ-' . $count . '-' . $Year;
    break;

    case '18':
        $folio_s = 'AS-' . $count . '-' . $Year;
    break;

    case '50':
        $folio_s = 'SPC-' . $count . '-' . $Year;
    break;
}

?>


<head>
    <link rel="stylesheet" href="../css/turn_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller_response_dir.js?v=<?php echo (rand()); ?>"></script>
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
                            <col-md-4></col-md-4>
                            <col-md-4>
                                <h6>Numero de folio asignado:</h6>
                                <!-- <input id="folio_asignado" type="hidden" class="form-control" value="<?php echo $folio_s ?>" disabled> -->
                                <input id="folio_asignado" type="text" class="form-control" placeholder="<?php echo $folio_s ?>" value="<?php echo $folio_s ?>" disabled>
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

       