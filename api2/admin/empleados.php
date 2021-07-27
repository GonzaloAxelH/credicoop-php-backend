<?php 
include('./crudActions.php');
include('../conexion/Conexion.php');

header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
$resultado = getTable("gestordecobranza",$conexion);
echo json_encode($resultado);
       