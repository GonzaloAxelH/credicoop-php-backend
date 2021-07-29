<?php 

header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app');
include('../conexion/Conexion.php');
include('../admin/crudActions.php');

$data = json_decode(file_get_contents('php://input'),true);

insertar($data,$conexion);