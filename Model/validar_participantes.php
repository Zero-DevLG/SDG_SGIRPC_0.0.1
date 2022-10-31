<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("Conexion.php");
include('consultas.php');

$id_documento = $_POST['id_documento'];
$Fecha = date('Y-m-d');

$consulta_archivo = $pdo->prepare("SELECT * FROM participantes  where  id_documento = '" . $id_documento . "'");
$consulta_archivo->execute();
$count2 = $consulta_archivo->rowCount();

$consulta_archivo_adj = $pdo->prepare("SELECT * FROM archivos  where tipo_archivo=2 and id_documento = '" . $id_documento . "'");
$consulta_archivo_adj->execute();
$count3 = $consulta_archivo_adj->rowCount();




?>



<div>
    <?php echo $id_documento;  ?>
</div>
<div id="formulario_participantes">
<h3>Registrar Participante: </h3>
<form action="" id="form_subir_p">
    <input type="hidden" value="<?php echo $id_documento; ?>" id="id_documento" >
    <div>
        <!-- child 0 -->
        <label for="">Nombre Completo:</label>
        <input class="form-control" name="txtnombre" id="nombre" type="text">
        
        <label for="">Cargo:</label>
        <input class="form-control" name="txtcargo" id="cargo" type="text">

        
        <label for="">Direccion:</label>
        <select class="form-control" name="txtdireccion" id="txtdireccion" required>
        <?php foreach ($lista_dir as $mostrar) { ?>
        <option value="<?php echo $mostrar['id_direccion']; ?>">
        <?php echo $mostrar['direccion']; ?></option>
        <?php } ?>
        </select>
    </div>

    <div class="acciones">
        <!-- child 2 -->
        <input type="button" id="subir" class="btn btn-sm btn-info" value="Agregar">
    </div>



    <br>


</form>
</div>

        <br>



</div>



<script>
$(document).ready(function() {
   
        $('#subir').click(function(){
            var datos = $('#archivo').prop('files')[0];
            var documento = $('#id_documento').val();
            var tipo = 1;
            alert(documento);
            var form_data = new FormData();                  
             form_data.append('file', datos );
             form_data.append('documento', documento);
             form_data.append('tipo', tipo);
            $.ajax({
                data: form_data , 
                url: "../Controller/subir.php",
                type: "POST",
                contentType: false,
                processData: false,
                success:
                        function (r) {
                            $('#documento_original').html(r);
                            //alert('' + r);
                        }
            });

            
        });

        $('#subir_adj').click(function(){
            var datos = $('#archivo2').prop('files')[0];
            var documento = $('#id_documento').val();
            var tipo = 2;
            alert(documento);
            var form_data = new FormData();                  
             form_data.append('file', datos );
             form_data.append('documento', documento);
             form_data.append('tipo', tipo);
            $.ajax({
                data: form_data , 
                url: "../Controller/subir.php",
                type: "POST",
                contentType: false,
                processData: false,
                success:
                        function (r) {
                            //alert('' + r);
                            $('#documento_anexo').html(r);
                        }
            });
        });

    });

</script>