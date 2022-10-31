<?php
include("../Model/Conexion.php");

$modulo = $_POST['modulo'];

$consulta_rol = $pdo->prepare("SELECT * FROM priv_usr WHERE plataforma = '$modulo'");
$consulta_rol->execute();
$lista_rol = $consulta_rol->fetchAll(PDO::FETCH_ASSOC);

?>

<label>Rol:</label>
<select name="" id="rol" class="form-control">
    <?php foreach ($lista_rol as $mostrar) { ?>
    <option value="<?php echo $mostrar['privilegios']; ?>"><?php echo $mostrar['rol']; ?></option>
    <?php } ?>
</select>