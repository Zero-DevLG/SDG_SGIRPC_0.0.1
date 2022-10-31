<?php
error_reporting(E_ERROR);
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

// Si hoy es lunes, nos daría el lunes pasado.
if (date("D") == "Mon") {
    $week_start = date("Y-m-d");
} else {
    $week_start = date("Y-m-d", strtotime('last Monday', time()));
}
//echo date($week_start);
//echo "/";
$Fecha = new Datetime(date('Y-m-d'));
$sig = new Datetime(date("Y-m-d", strtotime("+1 day")));
//echo $sig;

$week_end = date("Y-m-d", strtotime('next Friday', time()));
//$week_end = strtotime('next Sunday', time());
//echo date($week_end);

$number_days_month = cal_days_in_month(CAL_GREGORIAN, date("n"), 2022); // 31
//echo $number_days_month;

$week_start = '2022-01-01';
$fecha1 = new DateTime("2022-01-01");
$diff = $fecha1->diff($sig);
$days = $diff->days;
//echo $days;
$next_date = array();
$new_day = $week_start;
$next_date[0] = $new_day;
$json = array("0" => $next_date[0]);
for ($i = 1; $i < $days; $i++) {
    $get_last_num = $new_day[9];
    if ($get_last_num == 9) {
        $next_second_num_day =  $new_day[8] + 1;
        $last_num_day = 0;
        $new_day[8] = $next_second_num_day;
        $new_day[9] = $last_num_day;
    } else {
        $last_num_day = $new_day[9] + 1;
        $new_day[9] = $last_num_day;
    }
    $next_month = $new_day[8] . $new_day[9];
    //echo "<br>" . $next_month;
    if ($next_month > $number_days_month) {
        $month_data_1 = $new_day[6];
        $month_data_2 = $new_day[5];
        if ($month_data_1 == 9) {
            $month_data_2 += 1;
            $month_data_1 = 0;
            $new_day[6] = $month_data_1;
            $new_day[5] = $month_data_2;
            $new_day[8] = 0;
            $new_day[9] = 1;
        } else {
            $month_data_1 += 1;
            $new_day[6] = $month_data_1;
            $new_day[8] = 0;
            $new_day[9] = 1;
        }
    }

    //echo "<br>" . $new_day;
    $next_date[$i] = $new_day;
    array_push($json, $next_date[$i]);

    // echo "<br>" . $next_date[$i];
}

//print_r($next_date);
$data_cont = array();
$data_cont_turn = array();
$data_cont_r = array();
$data_cont_limit = array();
$json2 = array();
$json3 = array();
$json4 = array();
$json5 = array();
for ($j = 0; $j < $days; $j++) {
    $date_data = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE fecha_recibido = '$next_date[$j]'");
    $date_data->execute();
    $data_cont[$j] = $date_data->fetchColumn();
    //$json[] = array("Fecha" => $next_date[$i]);
    array_push($json2, $data_cont[$j]);

    $date_data_turn = $pdo->prepare("SELECT COUNT(di.id_documento) FROM documento_instruccion as di INNER JOIN documentos_externos as de ON di.id_documento = de.id_documento WHERE de.fecha_recibido = '$next_date[$j]'");
    $date_data_turn->execute();
    $data_cont_turn[$j] = $date_data_turn->fetchColumn();
    array_push($json3, $data_cont_turn[$j]);

    $data_response = $pdo->prepare("SELECT COUNT(id_documento) FROM documentos_externos WHERE fecha_recibido = '$next_date[$j]' AND estatus = 305");
    $data_response->execute();
    $data_cont_r[$j] = $data_response->fetchColumn();
    array_push($json4, $data_cont_r[$j]);

    $data_limit = $pdo->prepare("SELECT Count(di.id_documento) FROM documento_instruccion as di INNER JOIN documentos_externos as de ON de.id_documento = di.id_documento WHERE di.fecha_limite < CURDATE() AND de.fecha_recibido = '$next_date[$j]'");
    $data_limit->execute();
    $data_cont_limit[$j] = $data_limit->fetchColumn();
    array_push($json5, $data_cont_limit[$j]);
}
//echo "<br>";
//print_r($data_cont);
//$datosX = json_encode($next_date);
//$datosY = json_encode($data_cont);
//$datosY2 = json_encode($data_cont_turn);
//$json = array();
//$json = array("Fecha" => $next_date, "Data" => $data_cont);
$json_p = array("0" => $json, "1" => $json2, "2" => $json3, "3" => $json4, "4" => $json5);


echo json_encode($json_p);
//echo json_encode($data_cont);