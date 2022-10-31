<?php
//require 'consultas_vehicular.php';
require("Consultas.php");

?>

<form action="../Controller/vehiculo_controlador2.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Registrar Vehiculo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

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
                            <label for="">Placas:</label>
                            <input class="form-control" type="text" name="txtplacas" id="txtplacas" required="">

                        </div>
                        <div class="col-md-4">
                            <label for="">Tipo de vehiculo:</label>

                            <select name="txttipo" class="form-control">
                                <?php foreach ($lista_catalogo as $mostrar) {
                                ?>

                                <option value="<?php echo $mostrar['id_catalogo']; ?>">
                                    <?php echo $mostrar['detalle'];  ?></option>

                                <?php } ?>
                            </select>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="">Marca:</label>
                            <input class="form-control" type="text" name="txtmarca" id="txtmarca" required="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="">Modelo:</label>
                            <input class="form-control" type="text" name="txtmodelo" id="txtmodelo" required="">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="">Direccion:</label>
                            <select name="txtdireccion" class="form-control">
                                <?php foreach ($listaDireccion as $mostrar) {
                                ?>

                                <option value="<?php echo $mostrar['id_direccion']; ?>">
                                    <?php echo $mostrar['direccion'];  ?></option>

                                <?php } ?>
                            </select>
                            <br>
                        </div>
                    </div>


                    <label for="">Foto del vehiculo</label>
                    <input class="form-control" type="file" accept="image/*" name="txtfoto" value="" id="txtfoto">
                    <br>

                    <label for="">Foto de las placas</label>
                    <input class="form-control" type="file" accept="image/*" name="txtfoto2" value="" id="txtfoto2">
                    <br>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-sm" value="btnAgregar" type="submit"
                        name="accion">Agregar</button>
                </div>
            </div>
        </div>
    </div>

</form>



<form action="../Controller/vehiculo_controlador.php" method="post" enctype="multipart/form-data">



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:green; color:aliceblue;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;">Vehiculo
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="txtID" value="<?php echo $txtID; ?>" id="txtID" required="">
                    <div class="form-row">

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
                            <label for="">Placas:</label>
                            <input class="form-control" type="text" name="txtplacas" value="<?php echo $txtplacas; ?>"
                                id="txtplacas" required="">

                        </div>
                        <div class="col-md-4">
                            <label for="">Tipo de vehiculo:</label>

                            <select name="txttipo" class="form-control">
                                <?php foreach ($lista_catalogo as $mostrar) {
                                ?>

                                <option value="<?php echo $mostrar['id_catalogo']; ?>">
                                    <?php echo $mostrar['detalle'];  ?></option>

                                <?php } ?>
                            </select>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="">Marca:</label>
                            <input class="form-control" type="text" name="txtmarca" value="<?php echo $txtmarca; ?>"
                                id="txtmarca" required="">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="">Modelo:</label>
                            <input class="form-control" type="text" name="txtmodelo" value="<?php echo $txtmodelo; ?>"
                                id="txtmodelo" required="">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label for="">Direccion:</label>
                            <select name="txtdireccion" class="form-control">
                                <?php foreach ($listaDireccion as $mostrar) {
                                ?>

                                <option value="<?php echo $mostrar['id_direccion']; ?>">
                                    <?php echo $mostrar['direccion'];  ?></option>

                                <?php } ?>
                            </select>
                            <br>
                        </div>
                    </div>


                    <label for="">Foto del vehiculo</label>
                    <input class="form-control" type="file" accept="image/*" name="txtfoto" value="" id="txtfoto">
                    <br>

                    <label for="">Foto de las placas</label>
                    <input class="form-control" type="file" accept="image/*" name="txtfoto2" value="" id="txtfoto2">
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


    <!-- Button trigger modal -->




    <!-- Modal ver mensajes -->
    <div class="modal fade" id="ModalMensaje" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-8">
                                <img src="../img/LogoPC2.png" width="600px">

                            </div>
                            <div class="col-md-4">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <ul class='nav nav-tabs' id="tabs">
                                    <li class='active'><a data-toggle="tab" href="#home2">Instrucciones</a></li>
                                    <li><a data-toggle="tab" href="#menuM">Mensajes</a></li>
                                    <li><a data-toggle="tab" href="#menuO">Otros</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="modal_mensaje" style="overflow-y:auto;">
                    <div class="tab-content">
                        <div id="home2" class="tab-pane fade in active">
                            <h1>Selecciona una opcion</h1>
                        </div>

                        <div id="menuM" class="tab-pane fade">
                            <br>
                            <input type="text" name="txtid_documento" id="txtid_documento"
                                value="<?php echo $id_documento; ?> " hidden>
                            <div id="contenidoMensaje"></div>

                        </div>
                        <div id="menuO" class="tab-pane fade">
                            <input type="text" value="<?php echo $folio;  ?>" disabled>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-9">
                                <div id="texto_in">
                                    <input type="text" class="form-control" id="mensaje" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button id="enviar_m" class="btn btn-success btn-sm">Enviar mensaje</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Final modal mensajes -->


    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" id="modal_head">
                    <h3 class="modal-title">Registro de usuario</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id=modal_body>
                    <label for="">Nombre(s):</label>
                    <input type="text" class="form-control" id="txtnombre" require>
                    <label for="">Apellidos:</label>
                    <input type="text" class="form-control" id="txtapellido" require>
                    <label>Numero de empleado:</label>
                        <input type="text" class="form-control" id="num_e">
                       
                    <div id="genero">
                       
                            <label>Genero:</label>
                            <br>
                        <input type="radio" name="genero" value="masculino" id="masculino"><label id="label_m"
                            for=""><img src="img/iconos/masculino.png" id="icon_m" alt=""> Masculino</label>
                        <input type="radio" name="genero" value="femenino" id="femenino"> <label id="label_f"
                            for=""><img src="img/iconos/femenino.png" id="icon_f" alt="">Femenino</label>
                    </div>


                    <label for="">Correo electronico:</label>
                    <input type="email" class="form-control" id="txtcorreo" require>
                    <label for="">Direccion:</label>
                    <select style="color: balck;" class="form-control" id="txtdireccion">
                        <?php foreach ($lista_dir as $mostrar) { ?>
                        <option value="<?php echo $mostrar['id_direccion']; ?>"><?php echo utf8_encode($mostrar['detalle']); ?>
                        </option>
                        <?php } ?>
                    </select>
                    <label>Modulo:</label>
                    <select class="form-control" name="" id="modulo" required>
                        <option value="0">------</option>
                        <?php foreach ($lista_modulo as $mostrar) { ?>
                        <option value="<?php echo $mostrar['identificador'] ?>"><?php echo utf8_encode($mostrar['nombre']); ?>
                        </option>
                        <?php } ?>
                    </select>
                    <div>
                        <label style="font-size: 12px;">Numero de folio del equipo de computo asignado (CPU, Laptop):</label>
                           <input type="text" class="form-control" id="folio_cpu"> 
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" id="btn-registro">Registrarse</button>
                </div>


            </div>
        </div>
    </div>

    <!------ --->

    <!-- The Modal -->
    <div class="modal fade" id="Modalfp">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header" id="modal_head">
                    <h3 class="modal-title">Reestablecer contraseña</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id=modal_body>
                    <h4>Introduzca el correo con el cual se registro, se enviara la nueva contraseña a su correo</h4>
                    <label>Correo</label>
                    <input type="email" class="form-control" id="email-p">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" id="btn-acceso">Solicitar acceso</button>
                </div>


            </div>
        </div>
    </div>










</form>