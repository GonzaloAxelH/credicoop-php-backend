<?php 
include('../conexion/Conexion.php');
include('./crudActions.php');

header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app/');
$resultado = getTable("analista",$conexion);

echo json_encode($resultado);





