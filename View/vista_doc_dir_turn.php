<?php
    session_start();
    require('../Model/Conexion.php');
    $id_document = $_POST['id-document'];
    $id_dir     = $_SESSION['id_direccion'];
   
    
    $m = 1;

        //Se obtienes participantes
    $sql = $pdo->prepare("SELECT de.id_documento,p.id_direccion,p.confirm,er.direccion, er.titular FROM participantes as p INNER JOIN documentos_externos as de ON de.id_documento = p.id_documento INNER JOIN equipo_registro as er ON er.id_direccion = p.id_direccion WHERE de.id_documento = '$id_document'");
    $sql->execute();
    $data_p = $sql->fetchAll(PDO::FETCH_ASSOC);

       //Obtenemos el id del documento general
       $sql = $pdo->prepare("SELECT id_documento FROM instrucciones_direcciones   WHERE id_instruccion = '$id_document'");
       $sql->execute();
       $id_document = $sql->fetchColumn();
    
       $_SESSION['id_doc_pdf'] = $id_document; 

    $sql1 = $pdo->prepare("SELECT d.id_documento,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.id_organismo,org.nombre_organismo,d.remitente,d.cargo_r,d.anexos,di.asunto,di.fecha_limite,di.instruccion,i.n_instruccion,di.inst_otro FROM documentos_externos as d INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN instrucciones as i ON i.id_instruccion = di.instruccion INNER JOIN organismo as org ON org.id_organismo = d.id_organismo WHERE d.id_documento = '$id_document'");
    $sql1->execute();
    $data = $sql1->fetchAll(PDO::FETCH_ASSOC);

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

         //Obtenemos el titular de la direccion general
        $sql=$pdo->prepare("SELECT titular FROM equipo_registro WHERE id_direccion = '$id_dir'");
        $sql->execute();
        $titular = $sql->fetchColumn();

        // Obtener archivos adjuntos

        $sql3 = $pdo->prepare("SELECT a.url,a.a_nombre FROM archivos as a WHERE a.id_documento ='$id_documento'");
        $sql3->execute();
        $data_a = $sql3->fetchAll(PDO::FETCH_ASSOC);


    }else{
        $m = 0;
    }   


        ///Datos instrucción dirección
        $sql = $pdo->prepare("SELECT id.folio_dir,id.fecha_reg,id.fecha_limite,id.id_direccion,di.nombre_direccion,id.instruccion,id.i,dp.detalle,e.nombre,e.apellido FROM instrucciones_direcciones as id INNER JOIN documento_prioridad as dp ON dp.id_p = id.prioridad INNER JOIN direccion as di ON di.id_direccion = id.id_direccion INNER JOIN empleado as e ON e.id_empleado = id.id_empleado_reg WHERE id.id_documento = '$id_document'");
        $sql -> execute();
        $data_dir = $sql->fetchAll(PDO::FETCH_ASSOC);

        if($data_dir)
        {
            foreach($data_dir as $get)
            {
                $folio_dir = $get['folio_dir'];
                $direccion_turn = $get['nombre_direccion'];
                $instruccion_dir = $get['instruccion'];
                $i = $get['i'];
                $prioridad = $get['detalle'];
                $fecha_limite_dir = $get['fecha_limite'];
                $fecha_reg = $get['fecha_reg'];
                $e_nombre = $get['nombre'];
                $e_apellido = $get['apellido'];
            }

            
        $sql3 = $pdo->prepare("SELECT a.url,a.a_nombre FROM archivo_instruccion as a WHERE a.id_documento ='$id_documento'");
        $sql3->execute();
        $data_ar = $sql3->fetchAll(PDO::FETCH_ASSOC);

        }

        $sql = $pdo->prepare("SELECT dp.nombre_direccion FROM instrucciones_direcciones as id INNER JOIN  direccion as dp ON dp.id_direccion = id.id_direccion WHERE id.id_documento = '$id_documento'");
        $sql->execute();
        $data2 = $sql->fetchAll(PDO::FETCH_ASSOC);
        

?>


<head>
    <link rel="stylesheet" href="../css/vista_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller-vista-doc-dir-turn.js?v=<?php echo (rand()); ?>"></script>                   
</head>



<div class="main-content">      
    <div id="side-menu">
                <ul class="list-group">
                    <!-- <li class="list-group-item list-2"  id="option-2-1">  <img src="../img/iconos/pdf.png" class="icon-s" alt=""> <div> Generar volante</div></li> -->
                    
                    <li class="list-group-item list-2" id="option-2-1"><a href="../pdf3.php" target="blank"><img src="../img/iconos/pdf.png" class="icon-s" id="gen_pdf" title="Generar volante"alt=""> </a><div>Generar volante de turno</div></li>
                    <li class="list-group-item list-2" id="option-2-2">  <img src="../img/iconos/cancell.png" class="icon-s" alt=""> <div>Cancelar turno</div></li>
                </ul>                
    </div>

    <div id="id-document">  
        <?php if($m == 1){ ?>
            <div id="head">
                        <img id="logo-head" src="../assets/logos/logo_2022.png" alt="">
            </div>
            <div id="data-document" class="container-fluid">
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" class="form-control" id="id_documento" value="<?php echo  $_SESSION['id_doc_pdf']; ?>" disabled>
                    </div>
                </div>
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
                        <h5 class="title">Asunto:</h5>
                        <h6> <?php echo $asunto; ?></h6> 
                    </div>
                    <hr>
                <div class="row">
                    <h5 class="title">Instrucción:</h5>
                    <h6><?php echo $n_instruccion; ?></h6> 
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tbody>
                                <h4 class="title">Documentos adjuntos: Ventanilla  unica</h4>
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
                <div class="row">
                    <div class="col-md-12">
                        <hr class="hr-i">
                    </div>     
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Datos del turno: Dirección general</h2>
                    </div>
                </div>
                <div class="row row-d">
                    <div class="col-md-4">Fecha de captura: <?php echo $fecha_reg; ?></div>
                    <div class="col-md-4">Fecha limite de atención: <?php echo $fecha_limite_dir; ?></div>
                    <div class="col-md-4">Capturo: <?php echo $e_nombre . " " . $e_apellido; ?></div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-4 folio_dir">Folio dirección:  <?php echo $folio_dir; ?></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 prioridad">Prioridad:  <?php echo $prioridad; ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm table-bordered table-hover table-light">
                            <thead>
                                <th>Turnado a</th>
                            </thead>
                            <tbody>
                            <?php foreach($data2 as $get){ ?>
                                <tr>
                                    <td><?php echo $get['nombre_direccion'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            
                        </table>
                       
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="title" >Instruccion:</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6> <?php echo $instruccion_dir; ?></h6>
                    </div>                
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    <table>
                            <tbody>
                                <h4 class="title">Documentos adjuntos: Direccion general</h4>
                                <?php foreach ($data_ar as $mostrar) { ?>
                                <tr>
                                    <!-- <td><a href="<?php echo $mostrar['url']; ?>" target="blank"><?php echo $mostrar['a_nombre']; ?></a> -->
                                    <td><a href="<?php echo $mostrar['url']; ?>" download="<?php echo  $mostrar['a_nombre']; ?>"><?php echo $mostrar['a_nombre']; ?></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <?php if($i != 0 ){ ?>
                            <h5 class="title-dir">Ver este asunto con: <?php echo $titular; ?></h5>
                        <?php } ?>
                    </div>
                </div>    
            </div>
        <?php }else{ ?>
                <h3>Error</h3>
        <?php } ?>           
    </div>


</div>

                   


            