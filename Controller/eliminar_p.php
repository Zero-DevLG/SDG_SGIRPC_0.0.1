<?php

session_start();
date_default_timezone_set("America/Mexico_City");
if (!isset($_SESSION["usuario"])) {
    header("location:index.php");
}
include("../Model/Conexion.php");


$participante_e = $_POST['participante'];
$id_documento= $_POST["documento"];

//echo $participante_e;
//echo $id_documento;

$consulta_e = $pdo->prepare("DELETE FROM participantes WHERE id_participante = '$participante_e'");
$consulta_e->execute();




$consulta_participantes = $pdo->prepare("SELECT * FROM participantes  where  id_documento = '" . $id_documento . "'");
$consulta_participantes->execute();
$count2 = $consulta_participantes->rowCount();
$lista_participantes = $consulta_participantes->fetchAll(PDO::FETCH_ASSOC);


?>

<table class="table table-sm table-striped">
                <thead>
                    <tr>
                    <th>Nombre</th>
                    <th></th>
                    </tr>
                   
                </thead>
                <tbody>
                 <?php foreach($lista_participantes as $mostrar_p){ ?>
                        <tr>
                        <td><?php echo $mostrar_p['p_nombre']; ?></td>
                        <td data-valor='<?php echo $mostrar_p['id_participante']; ?>' class='ep'>
                        <input type="hidden" value="<?php echo $id_documento; ?>" id="id_documento">
                                           <button value="btnEliminar" id="eliminar_p" class="btn"
                                                onclick="return Confirmar('Realmente deseas borrar el registro');"
                                                type="submit" name="accion"><img src="../img/garbage.png" title="Eliminar"
                                                    style="width: 20px;"></button>
                 </td>
                        </tr>
                </tbody>  
       <?php }
     ?>
       </table>    


       <script>
             $('.ep').click(function(e){
            e.preventDefault();
            var data = $(this).attr("data-valor");
            var documento = $('#id_documento').val();
            var form_data = new FormData();
            form_data.append('documento', documento);
            form_data.append('participante', data);
            //alert(documento);
            //alert(data);
            $.ajax({
                data: form_data ,
                url: "../Controller/eliminar_p.php",
                type:"POST",
                contentType: false,
                processData: false,
                success:
                    function(r){
                        $('#participantes_registrados').html(r);
                    }
            });
        });
       </script>