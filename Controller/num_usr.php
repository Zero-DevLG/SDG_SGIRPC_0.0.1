<?php
require('../Model/Conexion.php');
$id_documento = $_POST['id_documento'];
$num_usr = $pdo->prepare("SELECT id_doc FROM temp_doc_usr WHERE id_doc ='$id_documento'");
$num_usr->execute();
$num = $num_usr->rowCount();
echo $num;
?>