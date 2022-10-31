<?php  
        require("../Model/sessiones.php");
        include("../Model/Conexion.php");
        include("../Model/Consultas.php");
?> 
                <table class="table table-striped table-hover table-light  table-sm display  AlldataTables"
                    id="tabla_r3">
                    <thead>
                        <tr>
                            <th>Oficio</th>
                            <th>Folio</th>
                            <th>Asunto</th>
                            <th>Fecha oficio</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="table_r">
                        <?php foreach ($lista_doc_ext as $mostrar2) { ?>
                        <tr>
                           
                            <td><?php echo $mostrar2['n_oficio']; ?></td>
                            <td><?php echo $mostrar2['folio']; ?></td>
                            <td><?php echo $mostrar2['asunto']; ?></td>
                            <td><?php echo $mostrar2['fecha_oficio']; ?></td>
                            <td><?php echo $mostrar2['detalles']; ?></td>

                         
                            <td data-valor='<?php echo $mostrar2['id_documento']; ?>' class='click2'>
                                

                                    <button class="btn"><img title='Ver documento' src='../img/ver.png'
                                            width='20px'></button>


                                   <!-- <button value="btnEliminar" class="btn"
                                        onclick="return Confirmar('Realmente deseas borrar el registro');"
                                        type="submit" name="accion"><img src="../img/garbage.png" alt=""
                                            style="width: 20px;"></button> -->
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


<script>

    $(document).ready(function() {



    var direccion = $('#id_direccion').val();
    //notificaciones



    $('.AlldataTables').DataTable({
        responsive: true,
        sPaginationType: 'full_numbers',
        sDom: '<"row view-filter"<"col-sm-4"<"pull-right"l>><"col-sm-8"<"pull-left"f>>><"row table"<"col-sm-12"<"pull-down"t>>><"row view-pager"<"col-sm-12"<"pull-left"<"h6"ip>>>>',
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar registros: _MENU_",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "<<",
                "sLast": ">>",
                "sNext": ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
            }
         });
    });
</script>