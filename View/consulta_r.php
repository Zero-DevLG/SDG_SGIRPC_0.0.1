<?php
include("../Controller/controlador_documentos_d.php");
?>


<table id="table1" class="table table-light table-hover table-sm table-striped table-bordered">
    <thead class="thead-dark">
        <th>Numero de Folio</th>
        <th>Fecha de oficio</th>
        <th>Numero de oficio</th>
        <th>Asunto</th>
        <th>Acciones</th>
    </thead>
    <tbody class="contenidobusqueda">
        <?php foreach ($listaDocumentos as $mostrar) { ?>
        <tr>
            <td><?php echo $mostrar['n_folio']; ?></td>
            <td><?php echo $mostrar['fecha_oficio']; ?></td>
            <td><?php echo $mostrar['n_oficio']; ?></td>
            <td><?php echo $mostrar['asunto']; ?></td>
            <td>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-2">
                            <form action="proceso.php" method="post">

                                <input type="hidden" name="txtid_documento"
                                    value="<?php echo $mostrar['id_documento']; ?>">
                                <input type="image" src="../img/turnar.jpg" value="Instruccion" name="accion"
                                    width="50px" title="turnar documento">

                            </form>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <input type="image" src="../img/status.png" data-toggle="modal" data-target="#exampleModal"
                                width="30px" title="estado del documento">
                        </div>
                        <div class="col-md-2"></div>
                        <br>
                        <br>
                        <div class="col-md-2">
                            <form action="../View/pdf.php" method="post" target="_blank">
                                <input type="hidden" name="txtid_documento"
                                    value="<?php echo $mostrar['id_documento']; ?>">
                                <input type="image" src="../img/control.jpg" width="30px" value="imprimir Control"
                                    name="accion" title="Imprimir Control">
                            </form>

                        </div>
                    </div>
                </div>



            </td>
        </tr>




        <?php } ?>
    </tbody>
</table>