<?php

class callCurl {

	public function getValues($url, $token = false){
		$header = [
            'Authorization: Bearer '. $token
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$res = curl_exec($ch);
		curl_close($ch);
		$decodificado = json_decode($res, true);

		return $decodificado;
	}

	public function postValues($url, $data, $token = false){
		$header = [
            'Authorization: Bearer '. $token
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$res = curl_exec($ch);
		curl_close($ch);
		$decodificado = json_decode($res, true);

		return $decodificado;
	}

	public function putValues($url, $data, $token = false){
		$header = [
            'Content-Type: application/json' ,
            'Accept: application/json',
            'Authorization: Bearer '. $token
		];
		
		$json = json_encode($data);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		$res = curl_exec($ch);
		curl_close($ch);

		return $res;
	}

	public function deleteValues($url, $token = false){
		$header = [
            'Authorization: Bearer '. $token
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$res = curl_exec($ch);
		curl_close($ch);

		return $res;
	}
}