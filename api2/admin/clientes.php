<?php 
include('../conexion/Conexion.php');
include('./crudActions.php');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents('php://input'),true);


if($data['ID']){
	echo json_encode($data);
}else{
	$resultado = getTable("cliente",$conexion);
	echo json_encode($resultado);
}



