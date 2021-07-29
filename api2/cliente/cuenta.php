<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
if(isset($data["idUser"])){
			$codigo =$data["idUser"];
			$consulta = "SELECT nombre,apellidos,correo,direccion,estadoCivil,fechaNac FROM cliente WHERE id_cliente='$codigo'";
			$resultado = mysqli_query($conexion,$consulta);
				if($resultado){
					$row_cnt = mysqli_num_rows($resultado);
					if($row_cnt > 0){
							while ($fila = mysqli_fetch_row($resultado)) {	
									$nombres=$fila[0];
									$apellidos =$fila[1];
									$correo = $fila[2];
									$direccion = $fila[3];
									$estadoCivil = $fila[4];
									$fechaNac = $fila[5];				
					
								}
								echo json_encode(array('nombres' =>$nombres,'apellidos'=>$apellidos,'correo'=> $correo,
										'direccion'=> $direccion,'estadoCivil'=>$estadoCivil,'fechaNac' => $fechaNac));
					}else{
						echo json_encode(array('error' => "no encontrado","code" => "404"));
					}
				}
}		

/* refactorizar */