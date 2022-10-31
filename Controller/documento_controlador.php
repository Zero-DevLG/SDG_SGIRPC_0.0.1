  <?php
   
  include("../Model/Conexion.php");
     $sentencia_a = $pdo->prepare("SELECT * FROM catalogo_dispositivo");
    $sentencia_a->execute();
    
    $listaAreas=$sentencia_a->fetchAll(PDO::FETCH_ASSOC);
    
    $direccion_a = $_SESSION['direccion'];


    $sentencia_d1 = $pdo->prepare("SELECT * FROM equipo_registro");
    $sentencia_d1->execute();
    
     $listaDirecciones=$sentencia_d1->fetchAll(PDO::FETCH_ASSOC);
    


     $sentencia_d = $pdo->prepare("SELECT * FROM equipo_registro where direccion='$direccion_a'");
    $sentencia_d->execute();
    
    $listaDirecciones_c=$sentencia_d->fetchAll(PDO::FETCH_ASSOC);


    //Generar Folio


    foreach($listaDirecciones_c as $obtener){
        $conteo = $obtener['contador'];
        $codigo = $obtener['codigo'];
    }

   # echo "folio:" . $conteo."<br>";
    #echo "codigo:" . $codigo."<br>";
        $folio = $codigo."-".$conteo;    
    
        $_SESSION['conteo']=$conteo;
        $_SESSION['codigo']=$codigo;
        
        

    ?>