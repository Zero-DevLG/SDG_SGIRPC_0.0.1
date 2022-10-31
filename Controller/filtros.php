<?php
session_start();
//Establecemos la conexion 
require('../Model/conexion.php');
$dir_local = $_SESSION["id_direccion"];
//variable de busqueda que se recibe desde el index con JQUERY
//$consultaEst = $_POST['valorEst'];
//$consultaTip = $_POST['valorTip'];
//$consultaDir = $_POST['valorDir'];
$consultaFoi = $_POST['f_i'];
$consultaFof = $_POST['f_l'];
$consultaFli = $_POST['fr_i'];
$consultaFlf = $_POST['fr_l'];
$consultaTipo = $_POST['tipo'];
$consultaFreci = $_POST['frec_i'];
$consultaFrecl = $_POST['frec_l'];
$consultaOficio = $_POST['oficio'];
$consultaDireccion = $_POST['direccion'];
/*
$consultaFreci = $_POST['valorFli'];
$consultaFrecf = $_POST['frec_i'];
$consultaFri = $_POST['frec_l'];
$consultaFrf = $_POST['valorFrf'];
$n = "";
$mensaje = "";
$m = "";
$o = "";


//print_r($consultaBusqueda);
/*
echo "<br> Es " . $_POST['valorDir'];
echo "<br> Es " . $_POST['valorFl'];
echo "<br>Es " . $_POST['valorFr'] . "<br>";
*/
//$array3 = json_decode($consultaEst, true);
//$array2 = json_decode($consultaTip, true);
//$array = json_decode($consultaDir, true);
//print_r($array);




$arr = array();
$sql = "SELECT de.id_documento,de.fecha_registro,de.fecha_recibido,de.folio,de.n_oficio,de.asunto,de.fecha_oficio FROM documentos_externos as de  WHERE estatus = 1 ";

/*
if (count($array) != 0) {

    $sql = "SELECT d.id_documento,d.fecha_registro,d.n_folio,d.asunto,e.descripcion FROM documentos as d INNER JOIN documento_ciclo as dc ON d.id_documento = dc.id_documento INNER JOIN estado as e ON e.id_estado = dc.estado INNER JOIN documento_instruccion as di ON di.id_documento = d.id_documento WHERE dc.origen='" . $dir_local . "'";

    $n .= " AND (direccion = '" . $array[0] . "' ";
    for ($i = 1; $i < count($array); $i++) {
        $n .= " OR direccion = '" . $array[$i] . "' ";
    }
    $n .= " )";
    $sql .= $n;
}

*/

if ($consultaFoi != "" && $consultaFof != "") {
    $sql .= " AND fecha_oficio BETWEEN  '" . $consultaFoi . "' AND '" . $consultaFof . "'";
}

if ($consultaFli != "" && $consultaFlf != "") {
    $sql .= " AND fecha_registro BETWEEN  '" . $consultaFli . "' AND '" . $consultaFlf . "'";
}


if ($consultaTipo != "") {
    $sql .= " AND tipo_documento = '$consultaTipo' ";
}

if ($consultaFreci != "" && $consultaFrecl != "") {
    $sql .= " AND fecha_recibido BETWEEN  '" . $consultaFreci . "' AND '" . $consultaFrecl . "'";
}

if ($consultaOficio != "") {
    $sql .= " AND n_oficio = '$consultaOficio' ";
}

if ($consultaDireccion != "") {
    $sql .= " AND id_direccion = '$consultaDireccion' ";
}

/*




if (count($array2) != 0) {
    $m = " AND (tipo_documento = '" . $array2[0] . "' ";
    for ($j = 1; $j < count($array2); $j++) {
        $m .= " OR tipo_documento = '" . $array2[$j] . "' ";
    }
    $m .= " )";
    $sql .= $m;
}

if (count($array3) != 0) {
    $o = " AND (estado = '" . $array3[0] . "' ";
    for ($k = 1; $k < count($array3); $k++) {
        $o .= " OR estado = '" . $array3[$k] . "' ";
    }
    $o .= " )";
    $sql .= $o;
}
*/
$sql .= "ORDER BY de.id_documento";

$busqueda = $pdo->prepare($sql);
$busqueda->execute();
$lista_resultado = $busqueda->fetchAll(PDO::FETCH_ASSOC);
$filas = $busqueda->rowCount();

if ($filas == 0) {
    echo "<div id='null_f'><img src='../img/null_f.jpg'></div>";
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="../css/estilo_documentos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table id="tabla_filtro" class="table table-borderless table-sm table-striped table-hover table-light table-sm"
        id="tabla_r">
        <thead class="table-secondary">
            <th>id documento</th>
            <th>Folio</th>
            <th>N.Oficio</th>
            <th>Asunto</th>
            <th>Fecha oficio</th>
            <th>Fecha registro</th>
            <th>Fecha recibido</th>
            <th>Acciones</th>
        </thead>
        <tbody id="table3">
            <tr>
                <?php
                $n = 0;
                foreach ($lista_resultado as $mostrar) { ?>
                <td><?php echo $mostrar["id_documento"]; ?></td>
                <td><?php echo $mostrar["folio"]; ?></td>
                <td><?php echo $mostrar["n_oficio"]; ?></td>
                <td><?php echo $mostrar["asunto"]; ?></td>
                <td><?php echo $mostrar["fecha_oficio"]; ?></td>
                <td><?php echo $mostrar["fecha_registro"]; ?></td>
                <td><?php echo $mostrar["fecha_recibido"]; ?></td>

                <td><button class="click" value="<?php echo $mostrar["id_documento"]; ?>">
                        <?php //echo $mostrar["id_documento"];  
                            ?> <img title="Ver documento" src='../img/ver.png' width='20px'> </button></td>
            </tr>
            <?php } ?>


        </tbody>
    </table>
</body>
<script>
$('.click').click(function() {
    //alert("Iniciando");
    console.log("Iniciando");
    var data = $(this).val();
    localStorage.setItem("documento", data);
    console.log(data);
    $(function() {
        console.log("Inicia");
        var textoBusqueda = data;
        console.log(data);
        if (textoBusqueda != "") {
            $.post(
                "../Model/vista_documento.php", {
                    valorBusqueda: textoBusqueda
                },
                function(mensaje) {
                    var c2 = document.querySelector("#resultadoBusqueda");
                    console.log("Es:" + c2);
                    $("#resultadoBusqueda").html(mensaje);
                }
            );
        } else {
            "#resultadoBusqueda".html("<p>JQUERY VACIO </p>");
        }
    });
});
</script>

<?php
/*
unset($_POST["valorDir"]);
unset($_POST["valorFoi"]);
unset($_POST["valorFli"]);
unset($_POST["valorFri"]);
unset($_POST['valorEst']);
unset($_POST['valorFof']);
unset($_POST['valorFlf']);
unset($_POST['valorFrf']);
*/
?>


</html>