<?php
     include("../Model/Conexion.php");

    $direccion=$_SESSION['direccion']; 
    
    $sentencia_d = $pdo->prepare("SELECT ins.id_documento,ins.id_instruccion,ins.instruccion,ins.destinatario,ins.cargo_d,ins.fecha_limite,d.asunto,d.estado,d.id_documento,d.remitente,d.n_folio,d.n_oficio FROM documento_instruccion as ins INNER JOIN documentos as d ON d.id_documento = ins.id_documento where direccion='$direccion';");
    $sentencia_d->execute();

    $listaDocumentos=$sentencia_d->fetchAll(PDO::FETCH_ASSOC);


    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
    $mostrarModal="false";



    switch ($accion) {
    	case 'responder':
    		#

    		 $accionAgregar="disabled";
        $accionModificar=$accionEliminar=$accionCancelar="";
        $mostrarModal="true";
        
       
    		break;
    	
    	default:
    		# code...
    		break;
    }
    
    
    



?>