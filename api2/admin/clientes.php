<?php 
include('../conexion/Conexion.php');
include('./crudActions.php');
header('Access-Control-Allow-Origin: *');

$resultado = getTable("cliente",$conexion);
echo json_encode($resultado);
