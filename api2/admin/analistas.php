<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$resultado = getTable("analista",$conexion);

echo json_encode($resultado);





