<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$resultado = getTable("analista",$conexion);
enviarResultado($resultado);




