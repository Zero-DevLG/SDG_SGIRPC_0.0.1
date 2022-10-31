<?php
    include('../Model/Conexion.php');
    $id_dir = $_POST['dir_gen'];
    $sql = $pdo->prepare("SELECT id_departamento,nombre_departamento FROM departamentos WHERE id_direccion = '$id_dir'");
    $sql->execute();
    $dep = $sql->fetchAll(PDO::FETCH_ASSOC);

?>
    <option value="0" >Turnar solo a la dirección</option>
<?php foreach($dep as $get){ ?>
    <option value="<?php echo $get['id_departamento'];?>" ><?php echo $get['nombre_departamento']; ?></option>
<?php } ?>