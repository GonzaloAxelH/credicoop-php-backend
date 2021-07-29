<?php 


header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app');
include('./crudActions.php');
include('../conexion/Conexion.php');

$data = json_decode(file_get_contents('php://input'),true);
$resultado = getTable("gestordecobranza",$conexion);
echo json_encode($resultado);
       