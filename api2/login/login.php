<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}


include('../conexion/jwt.php');
include ('../conexion/Conexion.php');

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
		$codigo =$data["codigo"];
		$password = $data["password"];
		$consulta2 ="SELECT * FROM cuentaadmin WHERE idadmin='$codigo' AND contrasena='$password'";
		$resultado2 = mysqli_query($conexion,$consulta2);
		$row_cnt2 = mysqli_num_rows($resultado2);
		if($row_cnt2 > 0){
			$jwt= createToken($codigo,$password);
			echo json_encode(array('jwt_admin' => $jwt,'codigo_admin'=> $codigo));
		}else{
			echo json_encode(array("message" => 'Usuario o contraseña incorrectos'));
		}
	}
}

	/**
		git add .
		git commit -am "make it better"
		git push heroku master
	*/

?>