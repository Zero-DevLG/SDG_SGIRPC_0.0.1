<?php
    include("../Model/navBar.php");
    $bar=new navBaradmin();
    $bar->construye();
    require '../Controller/equipos_controlador.php';

   



?>


<html>
<head>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Control Equipos</title>
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <style>
    
    
    </style>
    
    
</head>
<body background="../img/fondo.png">
  
    <form action="../Controller/equipos_controlador.php" method="post">
            
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Contador para Direccion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          
              <div class="form-group">
                  <div class="form-row">
                      <div class="col-md-4">
               Selecciona direccion:
       
              <select name = "txtID" class="form-control">
            <?php  foreach($direccion as $mostrar){
         ?>
            
            <option value="<?php echo $mostrar['id_direccion']; ?>"><?php echo $mostrar['direccion'];  ?></option>

     <?php } ?> 
              </select>
                    </div>
                      <div class="col-md-4">
                      Establece el numero del contador: 
                        <input type="text" class="form-control" name="txtcontador">
                      </div>
                      <div class="col-md-4">
                       Codigo de area para el folio
                       <input type="text" class="form-control" name="txtcodigo">
                      </div>
                </div>
              </div>
         
          
      
        </div>
      <div class="modal-footer">
           <button class="btn btn-success btn-sm" value="btnAgregar" <?php echo $accionAgregar; ?> type="submit" name="accion">Agregar</button>
            <button class="btn btn-warning btn-sm" value="btnModificar" <?php echo $accionModificar; ?> type="submit" name="accion">Editar</button>
            <button  class="btn btn-danger btn-sm" value="btnEliminar" onclick="return Confirmar('Realmente deseas borrar el registro');" <?php echo $accionEliminar; ?> type="submit" name="accion">Eliminar</button>
            <button class="btn btn-secondary btn-sm" value="btnCancelar" <?php echo $accionCancelar; ?> type="submit" name="accion">Cancelar</button>
        </div>
    </div>
  </div>
</div>
                
     <br>

                <!-- Button trigger modal -->
  <button id="agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Añadir Contador +
</button>
    
</form>      

    <div class="form-group">
        <div class="form-row">
            <div class="col-md-1"></div>
            <div class="col-md-9">
            <table id="table_c" class="table table-light table-hover table-sm table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th>Direccion</th>
                    <th>Folios generdos</th>
                    <th>Codigo</th>
                    <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($conteo as $mostrar){ ?>
                        <tr>
                            <td> <?php echo $mostrar['direccion'] ?> </td>
                            <td> <?php echo $mostrar['contador'] ?> </td>
                            <td> <?php echo $mostrar['codigo'] ?> </td>
                            <td>
                             <form action="" method="post">
                                    
                                    <input type="hidden" name="txtID" value="<?php echo $empleado['id_empleado'];?>">
                                    <input type="hidden" name="txtnombre" value="<?php echo $empleado['nombre'];?>">
                                    <input type="hidden" name="txtapellido" value="<?php echo $empleado['apellido'];?>">
                                   
                                    
                                    
                                    
                                    <input type="submit" style="width :auto; heigth :auto" class="btn btn-info btn-sm" value="Editar" name="accion">
                                  
                                
                                </form>
                            
                            
                            
                            
                            </td>
                        </tr>
                    
                    
                    
                    
                    
                    <?php } ?>
                
                
                </tbody>
                    
            </table>    
            
            
            </div>
        </div>
    </div>
  <?php if($mostrarModal=="true"){ ?>
        <script>
            
            $('#exampleModal').modal('show');
           
        </script>
        <?php } ?>
        <script>
        function Confirmar(Mensaje){
            return (confirm(Mensaje))?true:false;
        }
            

        
        </script>
        

    
    
    
</body>
</html>