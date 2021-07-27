<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');

$resultado = getTable("gestordecobranza",$conexion);

echo json_encode($resultado);
