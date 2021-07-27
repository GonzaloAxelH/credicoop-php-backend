<?php 
function eliminar($id,$conexion){
	return json_encode(array('message:'=> "eliminado"));
}

function update($data,$conexion){
	return json_encode(array('message:'=> "actualizado"));
}



function getTable($tableName,$conexion){
	$sql="SELECT * FROM " . $tableName;
	$query = $conexion->query($sql);
	$resultado = $query->fetch_all(MYSQLI_ASSOC);
	$json = array();
	foreach ($resultado as $data) {
		$json['data'][]=$data;
	}
	return $json;
}
