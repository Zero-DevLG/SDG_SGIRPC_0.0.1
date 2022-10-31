<?php
session_start();

$_SESSION['id_ac'] = $_POST['id_ac'];

echo json_encode($_SESSION['id_ac']);