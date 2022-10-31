<?php
    session_start();
     date_default_timezone_set("America/Mexico_City");
    if(!isset($_SESSION["usuario"])){
        header("location:index.php");
    }

    include("../Controller/controlador_instrucciones.php");
    include("../Model/navBar.php");
    $bar=new navBaradmin();
    $bar->construye();

    
include("../Model/sidebar.php");

?>


<html>
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Instrucciones</title>
    
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        
        
      
        
           #table1{
            position: absolute;
            left: 220px;
            top: 80px;
            width: 70%;
        }   
        
             th{
            width: 10%;
             overflow-wrap: break-word;
            font-size: 70%;
        }
        
        td{
            width: fixed;
             overflow-wrap: break-word;
            font-size: 70%;
        }
        
        #agregar{
            position: absolute;
            left: 300px;
            top: 20px;
        }
    
    </style>
    
    
</head>
<body background="../img/fondo.png">
    
    
    
    
    
    
    
    
    <div id="main" class="form-group">
        <div class="form-row">
            <div class="col-md-4">
            <button id="agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Agregar Instruccion +
</button>
            </div>
        </div>
        <div class="form-row">
            
            <div class="col-md-12"> 
        
            <table id="table1" class="table table-info table-hover table-sm table-striped table-bordered">
                <thead class="thead-danger">
                <tr>
                    <td>Instruccion</td>
                    <td>Direcciones</td>
                    <td>General</td>
                    <td>Acciones</td>
                </tr>
                </thead>
                    <tbody class="contenidobusqueda">
                <?php foreach($lista_instrucciones as $mostrar){ ?>
                    <tr>
                    <td><?php echo $mostrar['n_instruccion'];   ?></td>
                    <td><?php echo $mostrar['dir_instruccion'];   ?></td>
                    <td><?php echo $mostrar['general'];   ?></td>
                        
                    <td>
                        <form action="../Controller/controlador_instrucciones.php" method="post">
                            <input type="hidden" name="txtID" value="<?php echo $mostrar['id_instruccion']; ?>">
                            <input type="hidden" name="txtn_instruccion" value="<?php echo $mostrar['n_instruccion']; ?>">
                            <input type="hidden" name="txtdir_instruccion" value="<?php echo $mostrar['dir_instruccion']; ?>">
                            <input type="hidden" name="txtgeneral" value="<?php echo $mostrar['general']; ?>">
                            
                            <input type="submit" class="btn btn-danger btn-sm" width="15px" value="Eliminar" onclick="return Confirmar('Realmente deseas borrar el registro');"  name="accion" title="Eliminar">
                        
                        </form>    
                    </td>    
                        
                     </tr>
                <?php } ?>
                </tbody>
            </table>
        
        </div>
        
        </div>
    </div>
    
    
       <form action="" method="post" >
    
    <!-- Modal -->
    
     <div class="container">
         
                
           

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Instruccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-8">
                    <label>Nombre de la Instruccion</label>
                    <input class="form-control" name="txtn_instruccion">
              </div>
                <div class="form-row">
                <div class="col-md-8">
                    <label>Asignar a Direccion</label>
                    <select class="form-control" name="txtdireccion">
                    <option value="todas">Todas las direcciones</option>    
                    <?php foreach($lista_direcciones as $mostrar){?>
                    <option value="<?php echo $mostrar['id_direccion']; ?>"><?php echo $mostrar['direccion'];  ?></option>
                        
                        
                    <?php } ?>    
                    </select>
                    </div>    
                </div>
          </div>
      </div>
        </div>
      <div class="modal-footer">
          <button class="btn btn-success btn-sm" value="btnAgregar" <?php echo $accionAgregar; ?> type="submit" name="accion">Agregar</button>
          <button  class="btn btn-danger btn-sm" value="btnEliminar" onclick="return Confirmar('Realmente deseas borrar el registro');" <?php echo $accionEliminar; ?> type="submit" name="accion">Eliminar</button>
          
    </div>
  </div>
</div>
        </div>
    
    
        </div>          
            
        </form>
    
    
    
</body>
</html>