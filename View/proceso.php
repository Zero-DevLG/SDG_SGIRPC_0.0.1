<?php
     session_start();
     
    include("../Model/navBar.php");
    include("../Model/Conexion.php");

   $id_direccion=$_SESSION['id_direccion'];
    
      $bar= new navBaradmin();
    $bar->construye();
   
    
    $id_documento = $_POST['txtid_documento'];
    $_SESSION['txt_id'] = $id_documento;
    
    
    echo "<h3>".$id_documento."</h3>";

     $consulta=$pdo->prepare("SELECT * FROM documentos WHERE id_documento='$id_documento'");
    $consulta->execute();
    $listadatos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    foreach($listadatos as $capturar){
    $folio = $capturar['n_folio'];
    $oficio = $capturar['n_oficio'];
    $asunto = $capturar['asunto'];
    $remitente = $capturar['remitente'];
    $cargo_r=$capturar['cargo_r'];
    }

    $consulta_i = $pdo->prepare("SELECT * FROM instrucciones WHERE general=1 OR dir_instruccion = '$id_direccion'");
    $consulta_i->execute();
    $listainstrucciones=$consulta_i->fetchAll(PDO::FETCH_ASSOC);

   
?>

<html>
<head>
      <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta</title>
     
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
        <script src="../js/jquery-3.3.1.min.js"></script>
    <script    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
         #formu{
             color: aliceblue;
            position: absolute;
            text-align: center;
            width: 1200px;
            height: 800px;   
            left: 400px;
            top: 120px;
            margin-bottom: 1.5em;
            background: rgba(0,155,62,.7);
            padding:50px;
            border-radius: 10px 10px 15px 15px;
-moz-border-radius: 15px 15px 15px 15px;
-webkit-border-radius: 15px 15px 15px 15px;
border: 0px solid #000000;
        }     
        
         .modal-header{
        background-color: green;
    }
        
        
        
    </style>

      <script type="text/javascript">
   var numero = 0;
 addCampo = function () {

    nDiv2 = document.createElement('div');
    nDiv2.className = 'archivo2';
    nDiv2.id = 'file2' + (++numero);



    
    //Creamos un div para que contenga el nuevo campo
        nDiv = document.createElement('div');
    //Establecemos la clase del div
        nDiv.className = 'archivo';
    //Estableceremos el id del div con la variable numero 
        nDiv.id = 'file' + (++numero);
    //creamos el input para el formulario
        nCampo2 = document.createElement('input');    
        nCampo = document.createElement('input');
    //se le asigna un nombre como un vector
        nCampo.name = 'archivos[]';
        nCampo.style.width='350px';
        nCampo2.name = 'archivos2[]';
        nCampo2.style.width='350px';
    //establecemos el tipo del campo
        nCampo.type='text';
        nCampo2.type='text';
    //Se crea un link para eliminar campos no deseados
        a = document.createElement('a');
    //el link debe tener el mismo nombre de la div padre, para poder localizarla y eliminarla
       
        //Definimos el texto del link
       
        //Integramos al documento
        nDiv.appendChild(nCampo);
        nDiv2.appendChild(nCampo2);
        //Adicionamos el link
        nDiv.appendChild(a);

        container2 = document.getElementById('adjuntos2');
        container2.appendChild(nDiv2);

        container = document.getElementById('adjuntos');
        container.appendChild(nDiv);

        document.getElementById('formu').style.height='1100px';

    }

  
        
</script>
    
    </head>
<body background="../img/fondo_ep.jpg">
    
    <div id="formu" >
        <form action="../Controller/instrucciones_controlador.php" method="post">
        <div class="form-group">
        <div class="form-row">
        <div class="col-md-12">
         <img src="../img/banner_d.png" width="700px" height="70px" />    
        </div>        
    </div>
            <br>
            <div class="form-row">
                <div class="col-md-12">
                <table class="table">
                    <tr>
                    <thead>
                        <th>No.Folio</th>
                        <th>No.Oficio</th>
                        
                    </thead>
                 
                    <td><?php echo $folio; ?></td>
                    <td><?php echo $oficio; ?></td>
                       </tr>
                     <tr>
                    <thead>
                        <th>Remitente</th>
                        <th>Cargo</th>
                        
                    </thead>
                 
                    <td><?php echo $remitente; ?></td>
                    <td><?php echo $cargo_r; ?></td>
                       </tr>
                    <tr>
                    <thead>
                    <th>Asunto</th>
                    <th><?php echo $asunto; ?></th>
                    </thead>
    
                    </tr>
                </table>
                </div>
            </div>
            <div class="form-row">
            <div class="col-md-2">
            <button id="agregar" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
  ver documentos
</button>
            </div>
            
            </div>
        <div class="form-row">
            <div class="col-md-3"></div>
        <div class="col-md-6">
        <h4>Datos del destinatario:</h4>    
        </div>    
        </div>
        <div class="form-row">
        <div class="col-md-6">
        <label>Responsable:</label>
        <input type="text" class="form-control" name="txtresponsable">
        </div>
         <div class="col-md-6">
        <label>Cargo:</label>
        <input type="text" class="form-control" name="txtcargo">
        </div>    
        </div>
        <div class="form-row">
        <div class="col-md-4">
        <label>Fecha limite de respuesta</label>
        <input type="date" class="form-control" name="txtfecha_limite">
        </div>
        <div class="col-md-8">
         <label>Instruccion</label>
         <select class="form-control" name="txtinstruccion">
             <?php foreach($listainstrucciones as $mostrar) {?>
                <option value="<?php echo $mostrar['n_instruccion']; ?>"><?php echo $mostrar['n_instruccion'];  ?></option>
              <?php } ?>  
         </select>   
        </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label>Participantes</label>


  


    <div id="adjuntos"> 

   <input class="form-control"  type="text" name="archivos[]" id="participantes" />
    <br>    
</div> 
   </div>
       
      
       <div class="col-md-4"> 
     <label>Cargo</label>
    <div id="adjuntos2">
     <input class="form-control"  type="text" name="archivos2[]" id="participantes" />
     <br>
   </div> 
     </div>

   <div class="col-md-2">
    
    <br>
        <a class="btn btn-warning btn-sm" href="#" onClick="addCampo()">Agregar otro participante</a>

   </div>

     
    
   
    
      
        </div>    
        <br> 
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-4">
            
                    <input type="hidden" name="txtid_documento" value="<?php $id_documento; ?>">  
            
                    <input type="submit" class="btn btn-info btn-sm " value="Asignar Instruccion" name="accion">
            </div>
            </div>
        </div>
        </div>
        </form>


       
    
    
   
    
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">LISTA DE ARCHIVOS ADJUNTOS</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?php 


                 $sentencia = $pdo->prepare("SELECT * FROM archivos where id_documento = '$id_documento'");
       $sentencia->execute();
       $listaArchivos=$sentencia->fetchAll(PDO::FETCH_ASSOC);



     foreach ($listaArchivos as $mostrar){ ?>
 <a href="<?php echo $mostrar['url']; ?>">
                
            <?php     echo $mostrar['a_nombre']."<br>"; ?>
  </a>            
            <?php  } ?>
          
      </div>
      <div class="modal-footer">
           
      </div>
    </div>
  </div>
</div>
    
</body>







</html>