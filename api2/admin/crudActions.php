<?php 
function eliminar($id,$conexion){
			$sql="DELETE FROM transaccion where idcliente='$id'";
			$conexion->query($sql);

			$sql2 ="DELETE FROM cuentacliente where idcliente='$id'";
			$conexion->query($sql2);  
			
			$sql3 ="DELETE FROM cliente where id_cliente='$id'";
			$conexion->query($sql3);  
			return json_encode(array('message:'=> "eliminado","consulta"=> $sql));
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

			return json_encode(array('message:'=> "actualizado","consuta"=> $sql));
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

function insertarCliente($data,$conexion){
			$dni=(int)$data['dni'];
			$id_cliente=(int)$data['id_cliente'];
			$nombre=$data['nombres'];
			$apellidos=$data['apellidos'];
			$direccion=$data['direccion'];
			$correo=$data['correo'];
			$celular=(int)$data['celular'];
			$ruc= (int)($data['dni'] . "1");
	$sql="INSERT INTO cliente(id_cliente,dni,nombre,apellidos,direccion,celular,correo,estadoCivil,ruc,fechaNac) values($id_cliente,$dni,'$nombre','$apellidos','$direccion',$celular,'$correo','soltero',$ruc,'2000-10-25')";
	$conexion->query($sql);	
	echo json_encode(array('message:'=> "cliente insertado" ,"consulta"=> $sql));
}


