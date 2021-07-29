<?php 
include('../conexion/Conexion.php');
include('../admin/crudActions.php');
header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app/');
$data = json_decode(file_get_contents('php://input'),true);

insertar($data,$conexion);