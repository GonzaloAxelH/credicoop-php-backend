<?php 
include('../conexion/Conexion.php');
include('./crudActions.php');
header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app/');

$data = json_decode(file_get_contents('php://input'),true);


if($data['update']){
	echo update($data,$conexion);
}else{
	$resultado = getTable("cliente",$conexion);
	echo json_encode($resultado);
}



