<?php

//require('Model/conexion.php');


try {
    $connect = mysqli_connect("192.185.131.125", "akashasy_admin", "12345", "akashasy_archivo2");
    echo "conexion buena";


    $columns = array('id_documento', 'fecha_oficio');

    $query = "SELECT id_documento,fecha_oficio FROM documentos_externos WHERE ";
    if ($_POST["is_date_search"] == "yes") {
        $query .= 'fecha_oficio BETWEEN "' . $_POST["start_date"] . '" AND "' . $_POST["end_date"] . '" AND ';
    }
    if (isset($_POST["search"]["value"])) {
        $query .= '
        (id_documento LIKE "%")
        ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . '';
    } else {
        $query .= 'ORDER BY id_documento DESC ';
    }
    $query1 = '';

    if ($_POST["length"] != -1) {
        $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }

    $number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

    $result = mysqli_query($connect, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $sub_array = array();
        $sub_array[] = $row["id_documento"];
        $sub_array[] = $row["fecha_oficio"];
        $data[] = $sub_array;
    }
    function get_all_data($connect)
    {
        $query = "SELECT id_documento,fecha_oficio FROM documentos_externos";
        $result = mysqli_query($connect, $query);
        return mysqli_num_rows($result);
    }
    $output = array(
        "draw"              =>  intval($_POST["draw"]),
        "recordsTotal"      =>  get_all_data($connect),
        "recordsFiltered"   =>  $number_filter_row,
        "data"              =>  $data
    );

    echo json_encode($output);
} catch (Exception $e) {
    die("Error en Conexion: " . $e->getMessage());
}
    //$p2 = $pdo->prepare();

    /*
    $consulta_doc_ex = $pdo->prepare("SELECT de.id_documento,de.n_oficio,de.folio,de.tipo_documento,de.fecha_oficio,de.fecha_recibido,de.fecha_registro,de.id_empleado_r,de.id_organismo,de.remitente,de.remitente,de.cargo_r,de.asunto,e.detalles FROM documentos_externos as de INNER JOIN estatus as e ON de.estatus = e.id_estatus
    WHERE de.estatus=1");
    $consulta_doc_ex->execute();
    $lista = $consulta_doc_ex->fetchAll(PDO::FETCH_ASSOC);
    */


    /*
    $prueba = $pdo->prepare("SELECT id_documento,folio FROM documentos_externos");
    $prueba->execute();
    $lista = $prueba->fetchAll(PDO::FETCH_ASSOC);
    */
        //Se guarda en un array dinamico 
   /* $i=0;
    $tabla = "";
        foreach($lista as $mostrar){
            $tabla.='{"id_documento":"'. $mostrar['id_documento'] .'","folio":"'.$mostrar['folio'].'","oficio":"'.$mostrar['n_oficio'].'","asunto":"'.$mostrar['asunto'].'","fecha_registro":"'.$mostrar['fecha_registro'].'","fecha_oficio":"'.$mostrar['fecha_oficio'].'","fecha_recibido":"'.$mostrar['fecha_recibido'].'"},';
            $i++;
    }
    $tabla = substr($tabla,0, strlen($tabla)-1);

    echo '{"data":['.$tabla.']}';

    */