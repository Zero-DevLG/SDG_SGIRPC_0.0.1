<?php
    session_start();
    require('../Model/Conexion.php');
    $id_documento = $_POST['id-document'];
    $id_dir     = $_SESSION['id_direccion'];
   
    
    //Obtenemos el id del documento general
    //  $sql = $pdo->prepare("SELECT id_documento FROM documentos_atendidos  WHERE id_doc_at = '$id_documento'");
    //  $sql->execute();
    //  $id_documento = $sql->fetchColumn();




    $_SESSION['id_doc_pdf'] = $id_documento; 
    $m = 1;
    $sql1 = $pdo->prepare("SELECT d.id_documento,d.n_oficio,d.folio,d.fecha_oficio,d.fecha_recibido,d.id_organismo,org.nombre_organismo,d.remitente,d.cargo_r,d.anexos,di.asunto,di.fecha_limite,di.instruccion,i.n_instruccion,di.inst_otro FROM documentos_externos as d INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento INNER JOIN instrucciones as i ON i.id_instruccion = di.instruccion INNER JOIN organismo as org ON org.id_organismo = d.id_organismo WHERE d.id_documento = '$id_documento'");
    $sql1->execute();
    $data = $sql1->fetchAll(PDO::FETCH_ASSOC);
    $id_deps = array();
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
        $sql=$pdo->prepare("SELECT id.folio_dir,id.fecha_reg,id.fecha_limite,id.id_direccion,di.nombre_direccion,id.instruccion,id.i,dp.detalle,e.nombre,e.apellido FROM instrucciones_direcciones as id INNER JOIN documento_prioridad as dp ON dp.id_p = id.prioridad INNER JOIN direccion as di ON di.id_direccion = id.id_direccion INNER JOIN empleado as e ON e.id_empleado = id.id_empleado_reg WHERE id.id_documento = '$id_documento'");
        $sql->execute();
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

            
        $sql3 = $pdo->prepare("SELECT a.url,a.a_nombre FROM archivo_instruccion as a WHERE a.id_documento ='$id_documento' AND a.id_direccion_general = '$id_dir' AND a.id_direccion_p = 0  AND a.id_jc = 0");
        $sql3->execute();
        $data_ar_dir_gen = $sql3->fetchAll(PDO::FETCH_ASSOC);

        }

       


        //Se obtiene datos del turno de las direcciones particulares si es que las hubo

        $sql = $pdo->prepare("SELECT idp.id_instruccion_p,idp.id_instruccion_g,idp.id_documento,idp.id_direccion_p,dir.nombre_direccion,idp.instruccion,idp.date_reg,idp.id_emp,e.nombre,e.apellido FROM instruccion_direccion_p as idp INNER JOIN direccion as dir ON dir.id_direccion = idp.id_direccion_p INNER JOIN empleado as e ON e.id_empleado = idp.id_emp WHERE idp.id_documento = '$id_documento' order by idp.id_instruccion_p DESC LIMIT 1");
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);   
        foreach($data as $get)
        {
            $direccion_p = $get['nombre_direccion'];
            $instruccion_p = $get['instruccion'];
            $date_reg_p = $get['date_reg'];
            $nombre_emp_p = $get['nombre'];
            $apellido_emp_p = $get['apellido'];
        }

        //Comprobamos que hubo resultados

        if($data)
        {
            //En caso de obtener, obtenemos que direcciones particulares recibieron dicha instruccion
            $sql = $pdo->prepare("SELECT idp.id_jc,dp.nombre_departamento FROM `instruccion_direccion_p` as idp INNER JOIN departamentos as dp ON dp.id_departamento = idp.id_jc WHERE idp.id_documento = '$id_documento'");
            $sql->execute();
            $data2 = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($data2 as $get)
            {
                array_push($id_deps,$get['id_jc']);
            }

            $sql = $pdo->prepare("SELECT id.id_direccion,dp.nombre_direccion FROM instrucciones_direcciones as id INNER JOIN  direccion as dp ON dp.id_direccion = id.id_direccion WHERE id.id_documento = '$id_documento'");
            $sql->execute();
            $data_dir = $sql->fetchAll(PDO::FETCH_ASSOC);
            $id_dirs = array();
            
            foreach($data_dir as $get)
            {
                array_push($id_dirs,$get['id_direccion']); 
            }

           
              //DIR_P
         $files = array();
         for($i = 0; $i < sizeof($id_dirs); $i ++)
         {
             $sql3 = $pdo->prepare("SELECT a.url FROM archivo_instruccion as a WHERE a.id_documento ='$id_documento' AND a.id_direccion_p = '$id_dirs[$i]'");
             $sql3->execute();
             $data_ar = $sql3->fetchColumn();
             array_push($files,$data_ar);    
         }            

        }




        //Obtenemos respuestas de direcciones p
        $sql = $pdo->prepare("SELECT da.id_documento,da.id_direccion_general,da.id_dir_p,d.nombre_direccion,da.response,da.folio_response,ar.url FROM documentos_atendidos as da INNER JOIN direccion as d ON d.id_direccion = da.id_dir_p INNER JOIN archivo_response as ar ON ar.id_doc_at = da.id_doc_at WHERE da.id_documento = '$id_documento' AND da.id_jc = 0 AND d.nombre_direccion != 'NA'");
        $sql->execute();
        $data_res_p = $sql->fetchAll(PDO::FETCH_ASSOC);

        //OBTENEMOS JC
        $sql = $pdo->prepare("SELECT da.id_documento,da.id_direccion_general,da.id_dir_p,d.nombre_departamento,da.response,da.folio_response,ar.url FROM documentos_atendidos as da INNER JOIN departamentos as d ON d.id_departamento = da.id_jc INNER JOIN archivo_response as ar ON ar.id_doc_at = da.id_doc_at WHERE da.id_documento = '$id_documento'  AND d.nombre_departamento != 'NA'");
        $sql->execute();
        $data_res_jc = $sql->fetchAll(PDO::FETCH_ASSOC);

        //Archivos para direcciones
        $sql = $pdo->prepare("SELECT da.id_documento,da.id_direccion_general,da.id_dir_p,d.direccion,da.response,da.folio_response,ar.url FROM documentos_atendidos as da INNER JOIN equipo_registro as d ON d.id_direccion = da.id_direccion_general INNER JOIN archivo_response as ar ON ar.id_doc_at = da.id_doc_at WHERE da.id_documento = '$id_documento' AND da.id_dir_p = 0 AND da.id_jc = 0");
        $sql->execute();
        $data_res_dir_g = $sql->fetchAll(PDO::FETCH_ASSOC);



?>


<head>
    <link rel="stylesheet" href="../css/vista_doc_dir.css?v=<?php echo (rand()); ?>">
    <script src="../js/controller_p_doc.js?v=<?php echo (rand()); ?>"></script>                   
</head>



<div class="main-content">      
    <div id="side-menu">
                <ul class="list-group">
                    <li class="list-group-item list-2"  id="option-1-1">  <img src="../img/iconos/cc.png" class="icon-s" alt=""> <div>Marcar de enterado</div></li>
                   
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
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <!-- <?php // echo  $_SESSION['id_doc_pdf']; ?> -->
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
                                <h4 class="title">Documentos adjuntos:</h4>
                                <?php foreach ($data_a as $mostrar) { ?>
                                <tr>
                                    <td><a href="<?php echo $mostrar['url']; ?>" target="blank"><?php echo $mostrar['a_nombre']; ?></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                  
                    </div>
                </div>
   
               
                <?php if($data_res_p){ ?>
                    <hr class="hr-i">
                <h2>Respuesta(s) del documento</h2>
                    <table class="table table-sm table-bordered table-hover table-light">
                        <thead>
                            <th>Atendió</th>
                            <th>Folio de respuesta</th>
                            <th>Respuesta</th>
                            <th>Documento adjunto</th>
                        </thead>
                    <?php foreach($data_res_p as $get){  ?>
                            <tr>
                                <td><?php echo $get['nombre_direccion']; ?></td>
                                <td><?php echo $get['folio_response']; ?></td>
                                <td><?php echo $get['response']; ?></td>
                                <td><a href="<?php echo $get['url'];?>" target="blank"><?php echo $get['url'];?></a></td>
                            </tr>
                    <?php }  ?>    
                    </table>
                <?php } ?>    
                <?php
                    $count_a1 = sizeof($data_res_p);
                if($data_res_jc){ ?>
                    <table class="table table-sm table-bordered table-hover table-light">
                        <thead>
                            <th>Atendió</th>
                            <th>Folio de respuesta</th>
                            <th>Respuesta</th>
                            <th>Documento adjunto</th>
                        </thead>
                    <?php foreach($data_res_jc as $get){  ?>
                            <tr>
                                <td><?php echo $get['nombre_departamento']; ?></td>
                                <td><?php echo $get['folio_response']; ?></td>
                                <td><?php echo $get['response']; ?></td>
                                <td><a href="<?php echo $get['url'];?>" target="blank"><?php echo $get['url'];?></a></td>
                            </tr>
                    <?php }  ?>    
                    </table>
                <?php } ?>
                <?php if($data_res_dir_g){ ?>
                    <table class="table table-sm table-bordered table-hover table-light">
                        <thead>
                            <th>Atendió</th>
                            <th>Folio de respuesta</th>
                            <th>Respuesta</th>
                            <th>Documento adjunto</th>
                        </thead>
                    <?php foreach($data_res_dir_g as $get){  ?>
                            <tr>
                                <td><?php echo $get['direccion']; ?></td>
                                <td><?php echo $get['folio_response']; ?></td>
                                <td><?php echo $get['response']; ?></td>
                                <td><a href="<?php echo $get['url'];?>" target="blank"><?php echo $get['url'];?></a></td>
                            </tr>
                    <?php }  ?>    
                    </table>
                <?php } ?>          
                    
            </div>
        <?php }else{ ?>
                <h3>Error</h3>
        <?php } ?>           
    </div>


</div>

                   


            