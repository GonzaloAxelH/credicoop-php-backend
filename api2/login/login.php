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
		$jwt= createToken($codigo,$password);
		echo json_encode(array('jwt' => $jwt,'codigo'=> $codigo));
	}else{
		echo json_encode(array("message" => 'Usuario o contraseña incorrectos'));
	}
}

	/**
		git add .
		git commit -am "make it better"
		git push heroku master
	*/

?>