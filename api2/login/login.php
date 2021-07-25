<?php 

include('../conexion/jwt.php');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
if(isset($data["codigo"]) && $data["password"]){
	$codigo =$data["codigo"];
	$password = $data["password"];
	$resultado = createToken($codigo,$password);
	echo $resultado;
}