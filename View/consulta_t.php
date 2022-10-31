<?php 
    
    session_start();
    date_default_timezone_set("America/Mexico_City");
    if(!isset($_SESSION["usuario"])){
        header("location:index.php");
    }
    
    
     include("../Model/navBar.php");
    $bar=new navBaradmin();
    $bar->construye();

    require("../Controller/controlador_documentos_t.php");


?>  

<html lang="es">
<head>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Usuarios</title>
    
    <link rel="stylesheet" type="text/css" href="../css/sheetslider.min.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
     
     
    
    
<!--Sheet Slider-->
  
 

<div class="sheetSlider sh--default" >
   <input id="s1" type="radio" name="slide1" checked/> 
   <input id="s2" type="radio" name="slide1"/> 
   <input id="s3" type="radio" name="slide1"/>
   <div class="sh__content">
 
      <!-- Slider Item -->
      <div class="sh__item">
         <img src="../img/banner_1.jpg" alt="imgText" width="100%" height="100%" />
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>Registra Documentos</h4>
            <span>Clic aqui <a href="consulta_d.php">Ir !</a></span>
         </div>
      </div>
 
      <!-- Slider Item -->
      <div class="sh__item">
         <img src="../img/banner_2.jpg" alt="imgText" width="100%" height="100%" />
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>Responder y Turnar Documentos</h4>
            <span>Clic aqui<a href="consulta_t.php"> Ir ! </a></span>
         </div>
      </div>
 
      <!-- Slider Item -->
      <div class="sh__item">
         <img src="../img/banner_3.jpg" alt="imgText" width="100%" height="100%" />
         <!-- Item Info -->
         <div class="sh__meta">
            <h4>Historico</h4>
            <span>Clic aqui <a href="historico.php"> Ir !</a></span>
         </div>
      </div>
 
   </div><!-- .sh__content -->
 
   <!--botones-->
   <div class="sh__btns">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div><!-- .sh__btns -->
 
   <!--flechas-->
   <div class="sh__arrows">
      <label for="s1"></label>
      <label for="s2"></label>
      <label for="s3"></label>
   </div><!-- .sh__arrows -->
   
</div><!-- .sheetSlider -->
                             
        


       


    </body>
</html>