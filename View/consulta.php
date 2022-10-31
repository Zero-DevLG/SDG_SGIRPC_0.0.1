<?php
include("../Model/Conexion.php");
$consulta = $pdo->prepare("SELECT * FROM documentos");
$consulta->execute();
$listaDoc = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>



<table id="table_scroll" class="table table-bordered table-light table-striped table-hover mb-0">
    <tbody>
        <thead class="table-success">
            <th>Fecha limite</th>
            <th>Folio</th>
            <th>Tipo de Documento</th>
            <th>Estado</th>
            <th>Acciones</th>
        </thead>
        <?php foreach ($listaDoc as $mostrar) { ?>
        <tr>
            <td><?php echo $mostrar['fecha_oficio']; ?></td>
            <td><?php echo $mostrar['n_folio']; ?></td>
            <td><?php echo $mostrar['tipo_documento']; ?></td>
            <td><?php echo $mostrar['estado']; ?></td>
            <td>
                <form action="proceso.php" method="post">
                    <input type="hidden" name="txtid_documento" value="<?php echo $mostrar['id_documento']; ?>">
                    <input type="image" src="../img/ver.png" value="Instruccion" name="accion" width="20px"
                        title="Ver Documento">
                </form>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</script>