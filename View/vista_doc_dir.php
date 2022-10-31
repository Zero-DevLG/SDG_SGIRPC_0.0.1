<?php
    session_start();    
    require('../Model/Conexion.php');
    $id_document = $_POST['id-document'];
    $id_dir = $_SESSION["id_direccion"];
    
    $m = 1;
    $sql1 = $pdo->prepare("SELECT d.id_documento,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.id_organismo,org.nombre_organismo,d.remitente,d.cargo_r,d.anexos,di.asunto,di.fecha_limite,di.instruccion,i.n_instruccion,di.inst_otro FROM documentos_externos as d INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN instrucciones as i ON i.id_instruccion = di.instruccion INNER JOIN organismo as org ON org.id_organismo = d.id_organismo WHERE d.id_documento = '$id_document'");
    $sql1->execute();
    $data = $sql1->fetchAll(PDO::FETCH_ASSOC);

    //////Se obtienes participantes
    $sql = $pdo->prepare("SELECT de.id_documento,p.id_direccion,p.confirm,er.direccion, er.titular FROM participantes as p INNER JOIN documentos_externos as de ON de.id_documento = p.id_documento INNER JOIN equipo_registro as er ON er.id_direccion = p.id_direccion WHERE de.id_documento = '$id_document'");
    $sql->execute();
    $data_p = $sql->fetchAll(PDO::FETCH_ASSOC);

    

    if($data)
    {
        foreach($data as $get)
        {
            $id_documento = $get['id_documento'];
            $n_oficio = $get['n_oficio'];
            $folio = $get['folio'];
            $fecha_oficio = $get['fecha_oficio'];
            $fecha_recibido = $get['fecha_recibido'];
            $id_organismo = $get['id_organismo'];
            $org_nombre = $get['nombre_organismo'];
            $remitente = $get['remitente'];
            $cargo_r = $get['cargo_r'];
            $anexos = $get['anexos'];
            $asunto = $get['asunto'];
            $fecha_limite = $get['fecha_limite'];
            $id_instruccion = $get['instruccion'];
            $n_instruccion = $get['n_instruccion'];
            $inst_otro = $get['inst_otro'];

        }

        if($id_organismo == 24)
        {
            $sql2 = $pdo->prepare("SELECT detalle FROM organismo_externo WHERE id_documento ='$id_documento'");
            $sql2->execute();
            $tmp_organismo = $sql2->fetchColumn();
            $org_nombre = $tmp_organismo;
        }

        if($id_instruccion == 11)
        {
            $n_instruccion = $inst_otro;
        }

        // Obtener archivos adjuntos

        $sql3 = $pdo->prepare("SELECT a.id_archivo,a.url,a.a_nombre FROM archivos as a WHERE a.id_documento ='$id_documento'");
        $sql3->execute();
        $data_a = $sql3->fetchAll(PDO::FETCH_ASSOC);


    }else{
        $m = 0;
    }   

?>


<head>
    <link rel="stylesheet" href="../css/vista_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller-vista-doc-dir.js?v=<?php echo (rand()); ?>"></script>                   
</head>



<div class="main-content">      
    <div id="side-menu">
                <ul class="list-group">
                    <li class="list-group-item list-2"  id="option-1-1">  <img src="../assets/icons/turn-document.png" class="icon-s2" alt=""><div> Turnar documento</div></li>
                    <li class="list-group-item list-2" id="option-1-2">  <img src="../img/iconos/at_doc.png" class="icon-s" alt=""> <div>Responder documento</div></li>
                    <li class="list-group-item list-2" id="option-1-3">  <img src="../img/iconos/archivo.png" class="icon-s2" alt=""> <div>Archivar documento</div></li>
                </ul>                
    </div>

    <div id="id-document">
        <?php if($m == 1){ ?>
            <div id="head">
                        <img id="logo-head" src="../assets/logos/logo_2022.png" alt="">
            </div>
            <div id="data-document" class="container-fluid">
                <div class="row">
                    <div class="col-md-4">Fecha del oficio: <?php echo $fecha_oficio; ?></div>
                    <div class="col-md-4">Fecha de recibido: <?php echo $fecha_recibido; ?></div>
                    <div class="col-md-4" id="fecha_limite">Fecha limite: <?php echo $fecha_limite; ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">Folio: <?php echo $folio; ?></div>
                    <div class="col-md-4">Remitente: <?php echo $remitente; ?></div>
                    <div class="col-md-4">Cargo: <?php echo $cargo_r; ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5>Asunto:</h5>
                        <h6> <?php echo $asunto; ?></h6> 
                    </div>
                    <hr>
                <div class="row">
                    <h5>Instrucción:</h5>
                    <h6><?php echo $n_instruccion; ?></h6> 
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h6>Archivos adjuntos:</h6>
                        <table>
                            <tbody>
                                <?php foreach ($data_a as $mostrar) { ?>
                                <tr>
                                    <td><a href="<?php echo $mostrar['url']; ?>" download="<?php echo  $mostrar['a_nombre']; ?>"><?php echo $mostrar['a_nombre']; ?></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if($data_p){ ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Participantes</h2>
                            <hr>
                            <table class="table table-sm table-light">
                                <tbody>
                                    <?php foreach($data_p as $get){ ?> 
                                        <tr>
                                            <td><?php echo $get['direccion']; ?></td>
                                            <td><?php echo $get['titular']; ?></td>
                                            <td><?php echo $get['confirm']; ?></td>
                                        </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } ?> 
            </div>
        <?php }else{ ?>
                <h3>Error</h3>
        <?php } ?>         
    </div>
</div>



