<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: https://credicoop-f2bb3.web.app/');
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