<?php 
include('../conexion/Conexion.php');
header('Access-Control-Allow-Origin: *');
$data = json_decode(file_get_contents('php://input'),true);
echo "h0la";
if(isset($data["idAdmisn"])){
			$idAdmin = $data["idAdmin"];
			$consulta = "SELECT nombres,apellidos,dni,celular,direccion,correo FROM cliente WHERE id_admin='$idAdmin'";
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
	
