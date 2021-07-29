<?php 

header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app');

include('../conexion/Conexion.php');
include('./crudActions.php');


$resultado = getTable("analista",$conexion);

echo json_encode($resultado);





