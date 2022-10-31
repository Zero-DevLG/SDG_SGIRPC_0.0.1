<!-- Modal para editar documento  -->
<!-- Modal -->
<div class="modal fade" id="ModalBit">
    <div class="modal-dialog modal-lg" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <img src="../img/LogoPC2.png" style="width: 600px;">
                <button id="close_modal" type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <ul class='nav nav-tabs' id="tabs_do">

                    <li> <a data-toggle="tab" href="#menu_col"><img id="users" src="../img/iconos/users.png"
                                title="Etiquetar colaboradores"> Colaboradores</a></li>
                    <li><a data-toggle="tab" href="#menu_doc" id="link_d"><img id="link" src="../img/iconos/link.png"
                                title="Enlazar documento(s) al asunto"> Documentos</a></li>


                </ul>

                <div class="tab-content">
                    <input type="hidden" id="id_ac" class="form_control" value="">
                    <div id="menu_col" class="tab-pane fade in active">
                        <div id="inst_col">
                            <h4>Aqui podras etiquetar colaboradores a la actividad y asignar tareas para cada uno de
                                los
                                colaboradores etiquetados</h4>
                        </div>
                        <div id="tabla_col">
                            <table class="table table-sm table-bordered" id="colab" style="cursor: pointer;">

                                <tbody>
                                    <?php foreach ($lista_colaboradores as $mostrar) { ?>
                                    <tr>
                                        <td><?php echo $mostrar['id_empleado']; ?></td>
                                        <td><img style="width: 40px;" src="../imagenes/<?php echo $mostrar['foto']; ?>"
                                                alt="">
                                        </td>
                                        <td><?php echo $mostrar['nombre'] . " " . $mostrar['apellido'];  ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="col_reg">
                            <table id="ac_col" class="table table-sm table-borderless" style="cursor: pointer;">
                                <thead>
                                    <tr>
                                        <th>ID Seguimiento</th>
                                        <th>Colaborador</th>
                                        <th>Actividad</th>
                                        <th>Fecha limite</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="menu_doc" class="tab-pane fade">
                        <div id="inst_doc">
                            <h4>
                                <center>Aqui podras unir documentos a la actividad</center>
                            </h4>
                        </div>
                        <div id="tabla_documentos">
                            <table class="table table-sm table-borderless" id="tabla_doc">
                                <tr>
                                    <thead>
                                        <th>id_documento</th>
                                        <th>Folio</th>
                                        <th>Oficio</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </tr>
                            </table>
                        </div>
                        <div id="link_doc_reg">
                            <table class="table table-sm table-borderless" id="tabla_doc_link" style="cursor: pointer;">
                                <tr>
                                    <thead>
                                        <th>id_link</th>
                                        <th>Folio</th>
                                        <th>Oficio</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div> <!-- Fin del modal instruccion individual -->
</div>


<div class="modal fade" id="ModalAC">
    <div class="modal-dialog modal-md" role="document">

        <!-- Modal content-->
        <div class="modal-content" style="float:left;">
            <div class="modal-header">
                <h3 style="color:#3275ea;">
                    <center>Asigna una actividad a tu colaborador</center>
                </h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">
                <div class="form-content">
                    <div class="form-row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <input type="hidden" id="id_seg" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Fecha limite:</label>
                            <input type="date" class="form-control" id="txtfecha_limite">
                        </div>
                        <div class="col-md-6">
                            <label>Estado</label>
                            <select id="txtestado" class="form-control">
                                <option value="0">Sin asignar</option>
                                <option value="1">Normal</option>
                                <option value="2">Urgente</option>
                                <option value="3">Extra urgente</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Actividad:</label>
                            <textarea id="txtaccion" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" id="btnEliminar">Borrar actividad</button>
                <button type="submit" class="btn btn-primary btn-sm" id="btnAsignar">Asignar</button>
            </div>
        </div>

    </div>
</div> <!-- Fin del modal instruccion individual -->