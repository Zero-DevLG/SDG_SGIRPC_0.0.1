<?php
include("../Model/navi.html");
require '../Controller/empleado_Controlador.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>


    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/empleado.css?v=<?php echo (rand()); ?>">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</head>

<body background="../img/fondo.png">




    <div id="usuarios">
        <table id="table1" class="table table-light table-hover table-sm table-striped table-bordered">
            <thead class="thead-dark">

                <tr>
                    <th>Foto</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Puesto</th>
                    <th>Activo</th>
                    <th>Accion</th>


                </tr>
            </thead>
            <tbody class="contenidobusqueda">
                <?php foreach ($listaEmpleados as $empleado) { ?>
                <tr>
                    <td><img width="50px" src="../imagenes/<?php echo $empleado['foto']; ?>" />
                    </td>
                    <td><?php echo $empleado['usuario']; ?></td>
                    <td><?php echo $empleado['password']; ?></td>

                    <td><?php echo $empleado['nombre']; ?></td>
                    <td><?php echo $empleado['apellido']; ?></td>


                    <td><?php echo $empleado['area']; ?></td>
                    <td><?php echo $empleado['activo']; ?></td>
                    <td>

                        <form action="" method="post">

                            <input type="hidden" name="txtID" value="<?php echo $empleado['id_empleado']; ?>">
                            <input type="hidden" name="txtnombre" value="<?php echo $empleado['nombre']; ?>">
                            <input type="hidden" name="txtapellido" value="<?php echo $empleado['apellido']; ?>">
                            <input type="hidden" name="txtpuesto" value="<?php echo $empleado['puesto']; ?>">
                            <input type="hidden" name="txtactivo" value="<?php echo $empleado['activo']; ?>">
                            <input type="hidden" name="txtusuario" value="<?php echo $empleado['usuario']; ?>">
                            <input type="hidden" name="txtpassword" value="<?php echo $empleado['password']; ?>">
                            <input type="hidden" name="txttipo_usuario"
                                value="<?php echo $empleado['tipo_usuario']; ?>">



                            <input type="submit" style="width :auto; heigth :auto" class="btn btn-info btn-sm"
                                value="seleccionar" name="accion">
                            <br>
                            <br>
                            <button class="btn btn-danger btn-sm" value="btnEliminar"
                                onclick="return Confirmar('Realmente deseas borrar el registro');" type="submit"
                                name="accion">Eliminar</button>

                        </form>



                    </td>
                </tr>



                <?php } ?>
            </tbody>
        </table>


    </div>












    <?php if ($mostrarModal == "true") { ?>
    <script>
    $('#exampleModal2').modal('show');
    </script>
    <?php } ?>
    <script>
    function Confirmar(Mensaje) {
        return (confirm(Mensaje)) ? true : false;
    }
    </script>


</body>




</html>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">



        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="txtID" value="<?php echo $txtID; ?>" id="txtID" required="">
                        <div class="form-row">
                            <label for="">Foto:</label>

                            <?php if ($txtfoto != "") { ?>
                            <br />
                            <img class="img-thumbail rounded mx-auto d-block" width="200px"
                                src="../imagenes/<?php echo $txtfoto; ?>" />
                            <br />
                            <br />
                            <br>
                            <br>
                            <?php } ?>
                            <br>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Usuario:</label>
                                <input class="form-control" type="text" name="txtusuario"
                                    value="<?php echo $txtusuario; ?>" id="txtusuario" required="">
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label for="">Contraseña:</label>
                                <input class="form-control" type="text" name="txtpassword"
                                    value="<?php echo $txtpassword; ?>" id="txtpassword" required="">
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label for="">Tipo de Usuario:</label>
                                <input class="form-control" type="text" name="txttipo_usuario"
                                    value="<?php echo $txttipo_usuario; ?>" id="txttipo_usuario" required="">
                                <br>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="">Nombre:</label>
                                <input class="form-control" type="text" name="txtnombre"
                                    value="<?php echo $txtnombre; ?>" id="txtnombre" required="">
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label for="">Apellido:</label>
                                <input class="form-control" type="text" name="txtapellido"
                                    value="<?php echo $txtapellido; ?>" id="txtapellido" required="">
                                <br>
                            </div>
                            <div class="col-md-4">
                                <label for="">Cargo:</label>
                                <select class="form-control" name="txtpuesto">
                                    <option value="0">Secretaria</option>
                                    <option value="1">Subsecretario</option>
                                    <option value="2">Coordinador General</option>
                                    <option value="3">Jefatura del Estado Mayor Policial (SSP)</option>
                                    <option value="4">Secretaria Particular</option>
                                    <option value="5">Director de Vinculacion Institucional</option>
                                    <option value="6">Director</option>
                                    <option value="7">Coordinador</option>
                                    <option value="8">Director General</option>
                                    <option value="9">Director Ejecutivo</option>
                                    <option value="10">Asesor</option>
                                    <option value="11">Subdireccion</option>
                                    <option value="12">Jefe de Unidad Departamental</option>
                                    <option value="13">Lider Coordinador de Proyectos</option>
                                </select>
                                <br>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-2">
                                <label for="">Edad:</label>
                                <input class="form-control" type="text" name="txtedad" value="<?php echo $txtedad; ?>"
                                    id="txtedad" required="">
                                <br>
                            </div>
                            <div class="col-md-4">
                                Direccion:

                                <select name="txtdireccion" class="form-control">
                                    <?php foreach ($listaDireccion as $mostrar) {
                                    ?>

                                    <option value="<?php echo $mostrar['direccion']; ?>">
                                        <?php echo $mostrar['direccion'];  ?></option>

                                    <?php } ?>
                                </select>
                                <br>
                            </div>
                            <div class="col-md-4">
                                Area:

                                <select name="txtarea" class="form-control">
                                    <?php foreach ($listaAreas as $mostrar) {
                                    ?>

                                    <option value="<?php echo $mostrar['area']; ?>"><?php echo $mostrar['area'];  ?>
                                    </option>

                                    <?php } ?>
                                </select>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <label for="">Activo:</label>
                                <input class="form-control" type="text" name="txtactivo"
                                    value="<?php echo $txtactivo; ?>" id="txtactivo" required="">
                                <br>
                            </div>
                        </div>

                        <input class="form-control" type="file" accept="image/*" name="txtfoto" value="" id="txtfoto">
                        <br>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-sm" value="btnAgregar" <?php echo $accionAgregar; ?>
                            type="submit" name="accion">Agregar</button>
                        <button class="btn btn-warning btn-sm" value="btnModificar" <?php echo $accionModificar; ?>
                            type="submit" name="accion">Editar</button>
                        <button class="btn btn-danger btn-sm" value="btnEliminar"
                            onclick="return Confirmar('Realmente deseas borrar el registro');"
                            <?php echo $accionEliminar; ?> type="submit" name="accion">Eliminar</button>
                        <button class="btn btn-secondary btn-sm" value="btnCancelar" <?php echo $accionCancelar; ?>
                            type="submit" name="accion">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="botones">
            <button id="agregar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar registro +
            </button>

        </div>
        <!-- Button trigger modal -->
    </form>


</div>