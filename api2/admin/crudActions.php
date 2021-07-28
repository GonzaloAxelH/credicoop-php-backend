<?php 
function eliminar($id,$table,$conexion){
			$sql="DELETE FROM ".$table." where id_cliente='$id'";
			$conexion->query($sql);  
		return json_encode(array('message:'=> "eliminado"));
}

function update($data,$table,$conexion){
			$dni=$data['dni'];
			$nombre=$data['nombre'];
			$apellido=$data['apellido'];
			$id=$data['id_cliente'];
			$sql="UPDATE ".$table." SET dni='$dni',nombre='$nombre',apellidos='$apellido' where id_cliente='$id'";
			$conexion->query($sql);
	
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
