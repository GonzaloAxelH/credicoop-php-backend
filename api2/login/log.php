<?php 
	include('../conexion/jwt.php');
	include ('../conexion/Conexion.php');

	header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents('php://input'),true);
if(isset($data["codigo"]) && $data["password"]){
	$codigo =$data["codigo"];
	$password = $data["password"];
	$resultado = mysqli_query($conexion,$consulta);
	$consulta = "SELECT id_ccliente FROM cuentacliente WHERE contrasena='$password' AND idcliente='$codigo'";
	echo $row_cnt = mysqli_num_rows($resultado);
/*
	if($row_cnt > 0){
		$resultado = createToken($codigo,$password);
		echo $resultado;
	}else{
		echo json_encode(array("message" => 'Usuario o contraseña incorrectos'));
	}
*/
}

?>