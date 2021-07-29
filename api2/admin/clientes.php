<?php 


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
};
include('../conexion/Conexion.php');
include('./crudActions.php');


$data = json_decode(file_get_contents('php://input'),true);


if($data['update']){
	echo update($data,$conexion);
}else{
	$resultado = getTable("cliente",$conexion);
	echo json_encode($resultado);
}



