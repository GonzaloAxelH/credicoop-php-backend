<?php 
function eliminar($dni,$table,$conexion){
			$sql="DELETE FROM ".$table." where dni='$dni'";
			$conexion->query($sql);  
		return json_encode(array('message:'=> "eliminado"));
}

function update($data,$conexion){
			$dni=$data['dni'];
			$nombre=$data['nombres'];
			$apellido=$data['apellidos'];
			$direccion=$data['direccion'];
			$correo=$data['correo'];
			$celular=(int)$data['telefono'];
			 $sql="UPDATE cliente SET nombre='$nombre',apellidos='$apellido',direccion='$direccion',correo='$correo',celular=$celular where dni='$dni'";
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

function insertar($data,$conexion){
	$idcliente=(int)$data['id_cliente'];
	$monto=(float)$data['monto'];
	 $sql="INSERT INTO transaccion(idcliente,monto) values($idcliente,$monto)";
	$conexion->query($sql);	
	echo json_encode(array('message:'=> "pago insertado"));
}

