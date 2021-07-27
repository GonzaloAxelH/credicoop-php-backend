<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
        $sql="SELECT * FROM cliente";
        $query = $conexion->query($sql);
        $resultado = $query->fetch_all(MYSQLI_ASSOC);
	$json = array();
    foreach ($resultado as $data) {
       $json['data'][]=$data;
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
