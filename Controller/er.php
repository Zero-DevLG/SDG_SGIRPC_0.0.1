<?php
session_start();
date_default_timezone_set("America/Mexico_City");
include("../Model/Conexion.php");

$id_document = $_POST['id_document'];
$code = $_POST['code'];
$gen_data_v = $pdo->prepare("SELECT * FROM admin_code WHERE code = '$code'");
$gen_data_v->execute();
$data = $gen_data_v->fetchAll(PDO::FETCH_ASSOC);
$row = $gen_data_v->rowCount();

if ($row != 0) {
    foreach ($data as $getData) {
        $type = $getData['type'];
        $active = $getData['active'];
        $code = $getData['code'];
    }

    if ($active == 1 && $type == 701) {
        $cat = $pdo->prepare("SELECT * FROM documentos_externos WHERE op_control LIKE '%OP-T-0%' AND id_documento = '$id_document'");
        $cat->execute();
        $row_cat  = $cat->rowCount();
        if ($row != 0) {
            $get_num = $pdo->prepare("SELECT num FROM op_control_t");
            $get_num->execute();
            $data_num = $get_num->fetchAll(PDO::FETCH_NUM);
            $row = $get_num->rowCount();
            $update_num = array();
            $current_num = array();

            $get_num_doc = $pdo->prepare("SELECT num FROM op_control_t WHERE id_documento = '$id_document'");
            $get_num_doc->execute();
            $num_init = $get_num_doc->fetchColumn();
            $num_start = $num_init + 1;

            $get_doc_update = $pdo->prepare("SELECT num FROM op_control_t WHERE num BETWEEN '$num_start' AND '$row'");
            $get_doc_update->execute();
            $list_data = $get_doc_update->fetchAll(PDO::FETCH_ASSOC);
            $init = intval($num_init);
            $j = 0;

            echo "<h1>" . $init . " -> numero eliminado</h1>";
            echo "<h1>" . $num_start . " -> numero de inicio</h1>";
            echo "<h1>" . $j . "</h1>";
            echo "<h1>" . $row . "</h1>";
            $row = $row - $num_start;
            echo "<h1>Total resultante: " . $row . "</h1>";

            foreach ($list_data as $data) {
                $current_num[$j] = $data['num'];
                $update_num[$j] = $data['num'] - 1;
                $j++;
            }

            echo "<h1> Numeros actualizados</h1>";
            for ($i = 0; $i <= $row; $i++) {
                echo $update_num[$i] . "<br>";
                $act = $current_num[$i];
                $update = $update_num[$i];
                $update_nums = $pdo->prepare("UPDATE op_control_t SET num = ' $update' WHERE num = '$act'");
                $update_nums->execute();
            }


            echo "<h1> Numeros actuales</h1>";
            for ($i = 0; $i <= $row; $i++) {
                echo $current_num[$i] . "<br>";
            }
            $delete_doc = $pdo->prepare("DELETE FROM op_control_t WHERE id_documento = '$id_document'");
            $delete_doc->execute();
            $select_max_num = $pdo->prepare("SELECT MAX(num) FROM op_control_t");
            $select_max_num->execute();
            $num_max = $select_max_num->fetchColumn();
            $num_max = $num_max + 1;
            $update_count = $pdo->prepare("UPDATE control_sp SET contador = '$num_max' WHERE id_direccion = 20");
            $update_count->execute();
        } else {
            $get_num = $pdo->prepare("SELECT num FROM op_control");
            $get_num->execute();
            $data_num = $get_num->fetchAll(PDO::FETCH_NUM);
            $row = $get_num->rowCount();
            $update_num = array();
            $current_num = array();

            $get_num_doc = $pdo->prepare("SELECT num FROM op_control WHERE id_documento = '$id_document'");
            $get_num_doc->execute();
            $num_init = $get_num_doc->fetchColumn();
            $num_start = $num_init + 1;

            $get_doc_update = $pdo->prepare("SELECT num FROM op_control WHERE num BETWEEN '$num_start' AND '$row'");
            $get_doc_update->execute();
            $list_data = $get_doc_update->fetchAll(PDO::FETCH_ASSOC);
            $init = intval($num_init);
            $j = 0;

            echo "<h1>" . $init . " -> numero eliminado</h1>";
            echo "<h1>" . $num_start . " -> numero de inicio</h1>";
            echo "<h1>" . $j . "</h1>";
            echo "<h1>" . $row . "</h1>";
            $row = $row - $num_start;
            echo "<h1>Total resultante: " . $row . "</h1>";

            foreach ($list_data as $data) {
                $current_num[$j] = $data['num'];
                $update_num[$j] = $data['num'] - 1;
                $j++;
            }

            echo "<h1> Numeros actualizados</h1>";
            for ($i = 0; $i <= $row; $i++) {
                echo $update_num[$i] . "<br>";
                $act = $current_num[$i];
                $update = $update_num[$i];
                $update_nums = $pdo->prepare("UPDATE op_control SET num = ' $update' WHERE num = '$act'");
                $update_nums->execute();
            }


            echo "<h1> Numeros actuales</h1>";
            for ($i = 0; $i <= $row; $i++) {
                echo $current_num[$i] . "<br>";
            }
            $delete_doc = $pdo->prepare("DELETE FROM op_control WHERE id_documento = '$id_document'");
            $delete_doc->execute();
            $select_max_num = $pdo->prepare("SELECT MAX(num) FROM op_control");
            $select_max_num->execute();
            $num_max = $select_max_num->fetchColumn();
            $num_max = $num_max + 1;
            $update_count = $pdo->prepare("UPDATE control_sp SET contador = '$num_max' WHERE id_direccion = 200");
            $update_count->execute();
        }
    }
}