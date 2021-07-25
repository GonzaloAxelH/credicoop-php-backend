<?php

function createToken($codigo,$password){
			// base64 encodes the header json
			$arr = array('alg' => 'HS256', 'typ' => 'JWT');
			$arr2 = json_encode($arr);
			$encoded_header = base64_encode($arr2);
			// base64 encodes the payload json
			$arr33 = json_encode(array('codigo' =>  $codigo , 'password' => $password));
			$encoded_payload = base64_encode($arr33);
			// base64 strings are concatenated to one that looks like this
			$header_payload = $encoded_header . '.' . $encoded_payload;
			//Setting the secret key
			$secret_key = 'clave secreta';
			// Creating the signature, a hash with the s256 algorithm and the secret key. The signature is also base64 encoded.
			$signature = base64_encode(hash_hmac('sha256', $header_payload, $secret_key, true));
			// Creating the JWT token by concatenating the signature with the header and payload, that looks like this:
				$jwt_token = $header_payload . '.' . $signature;
				//listing the resulted  JWT
				return json_encode(array('jwt' =>  $jwt_token ,'codigo' => $codigo));
				//echo $arr;
				/////////////////////////////////////////////////////////////////////////////////////////////////////
	}


