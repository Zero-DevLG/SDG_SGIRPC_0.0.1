<?php 
    require('../Model/Conexion.php');
    date_default_timezone_set("America/Mexico_City");
    $Fecha = date('Y-m-d');
    $response = 0;
    //$option = $_POST['option'];
    $dir = $_POST['direccion'];
    $finder = $pdo->prepare("SELECT * FROM open_folio WHERE id_direccion = '$dir' and active = 1");
    $finder->execute();
    $list_finder = $finder->fetchAll(PDO::FETCH_ASSOC);
    $rows = $finder->rowCount();

?>

<?php if($rows > 0){ ?>
    <label>Folio libre</label>
    <select name="" id="f_open" class="form-control">
        <option value="0">Selecciona una opcion</option>
        <?php foreach($list_finder as $get){  ?>
            <option value="<?php echo $get['folio'] ?>"><?php echo $get['folio'] ?></option> 
        <?php } ?>
    </select>
    <script>
  $('#f_open').change(function(){
        var open = $('#f_open').val();
        if(open == 0)
        {
            $('#folio_gen').css("color","black");
        }else{
            //alert(open);
            $('#folio_gen').css("color","red");
            swal("Se inhabilita el folio automatico(en rojo) y se usara el folio libre(en negro)")
        }

    })
</script>

<?php } else{
    echo $response;
} ?>

