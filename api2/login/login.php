<?php 

include('../conexion/jwt.php');
include ('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
echo "";
$data = json_decode(file_get_contents('php://input'),true);
if(isset($data["codigo"]) && $data["password"]){
	
	$codigo =$data["codigo"];
	$password = $data["password"];
	$consulta ="SELECT * FROM cuentacliente WHERE idcliente='$codigo' AND contrasena='$password'";

	$resultado = mysqli_query($conexion,$consulta);
	$row_cnt = mysqli_num_rows($resultado);
	if($row_cnt > 0){
		$resultado = createToken($codigo,$password);
		echo $row_cnt;
	}else{
		echo json_encode(array("message" => 'Usuario o contraseña incorrectos'));
	}
}


?>