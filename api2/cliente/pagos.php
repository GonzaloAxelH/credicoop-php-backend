<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
echo json_encode($data);