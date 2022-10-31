<?php
 session_start();
    date_default_timezone_set("America/Mexico_City");
    if(!isset($_SESSION["usuario"])){
        header("location: ../index.php");
    }
    

    include("../Model/Conexion.php");
    include("../Model/navBar.php");
    $bar= new navBaradmin();
    $bar->construye();

     $accionCancelar="disabled";


    $consulta = $pdo->prepare("SELECT * FROM equipo_registro where status='bodega'");
    $consulta->execute();

    $equipos=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
  
    




?>

<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../push.js/bin/push.min.js"></script>
    
    <style>
        *{
            color: aliceblue;
        }
    
    
    </style>
    
    
    <script>
    
   /* Push.create("Hola Mundo Push" ,{
            body: "Este es un mensaje nuevo",
            icon: "../img/icon_bs.jpg",
            timeout: 4000,
            onclick:function(){
            window.location="http://127.0.0.1/Aruss/View/admin_panel.php";
            this.close();
            }
        
    });*/
    </script>
    
    
<title>Panel de Administracion</title>    

    
    
</head>
<body background="../img/fondo.png">
    
    <form action="" method="post">
   
        
        Selecciona tablet:
        <select name = "" class="form-control">
            <?php  foreach($equipos as $mostrar){
         ?>
        
            <option value="<?php echo $mostrar['id_equipo']; ?>"><?php echo $mostrar['no_serie'];  ?></option>

     <?php } ?>
    
        
        
        </select>
        
        
        
        <input type="submit" value="enviar" />
    </form>
    
    
    
    </body>
</html>
    
    