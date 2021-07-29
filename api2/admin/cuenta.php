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
if(isset($data["idAdmin"])){
			$idAdmin = $data["idAdmin"];
			$consulta = "SELECT nombres,apellidos,dni,celular,direccion,correo FROM administrador WHERE id_admin='$idAdmin'";
			$resultado = mysqli_query($conexion,$consulta);
				if($resultado){
					$row_cnt = mysqli_num_rows($resultado);
					if($row_cnt > 0){
							while ($fila = mysqli_fetch_row($resultado)) {	
									$nombres=$fila[0];
									$apellidos =$fila[1];
									$dni = $fila[2];
									$celular = $fila[3];
									$direccion = $fila[4];
									$correo= $fila[5];				
					
								}
								echo json_encode(array('nombres' =>$nombres,'apellidos'=>$apellidos,'dni'=> $dni,
										'telefono'=> $celular,'direccion'=>$direccion,'correo' => $correo));
					}else{
						echo json_encode(array('error' => "no encontrado","code" => "404"));
					}
				}
}		
/* reactorizar */
	
