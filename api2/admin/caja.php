<?php 

include('../conexion/Conexion.php');
include('./crudActions.php');
header('Access-Control-Allow-Origin: *');

$resultado = getTable("gestordecobranza",$conexion);

echo json_encode($resultado);
