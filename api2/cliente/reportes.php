<?php 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}
include('../conexion/Conexion.php');

$data = json_decode(file_get_contents('php://input'),true);
	if(isset($data["idUser"])){
		$idUser = $data["idUser"];
        $sql="SELECT * FROM transaccion WHERE idcliente='$idUser'";
        $query = $conexion->query($sql);
        $resultado = $query->fetch_all(MYSQLI_ASSOC);
	$json = array();
    foreach ($resultado as $data) {
       $json['data'][]=$data;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}