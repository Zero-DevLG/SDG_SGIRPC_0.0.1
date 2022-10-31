<?php
    session_start();
    require('../Model/Conexion.php');
    $id_document = $_SESSION['id_doc_pdf']; 
    
    $m = 1;
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

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../pdf.css">
</head>
<body>
    
            <div id="data-document" class="container">
                <table cellspacing="0" style="width: 100%; border:2px solid;position: relative;">
                    <thead>
                        <tr>
                            <th>NO.FOLIO</th>
                            <th>FECHA DEL OFICIO</th>
                            <th>FECHA DE RECIBIDO</th>
                            <th>NO. OFICIO</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><?php echo $folio ?></td>
                        <td><?php echo $fecha_oficio ?></td>
                        <td><?php echo $fecha_recibido ?></td>
                        <td id="n_oficio"><?php echo $n_oficio ?></td>
                    </tr>
                </table>
       
            </div>
   
</body>
</html>




                   


            