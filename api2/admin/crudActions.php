<?php 
function eliminar($id,$table,$conexion){
			$sql="DELETE FROM ".$table." where id_cliente='$id'";
			$conexion->query($sql);  
		return json_encode(array('message:'=> "eliminado"));
}

function update($data,$conexion){
			$dni=$data['dni'];
			$nombre=$data['nombre'];
			$apellido=$data['apellido'];
			$id=$data['id_cliente'];
			$direccion=$data['direccion'];
			$correo=$data['correo'];
			$estadoCivil =$data['estadoCivil'];
			$celular=(int)$data['celular'];

echo $sql="UPDATE cliente SET dni='$dni',nombre='$nombre',apellidos='$apellido',direccion='$direccion',correo='$correo',celular=$celular,estadoCivil='$estadoCivil' where id_cliente='$id'";
			//$conexion->query($sql);	
			//return json_encode(array('message:'=> "actualizado"));
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
