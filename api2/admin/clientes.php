<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');

$resultado = getTable("cliente",$conexion);
enviarResultado($resultado);
