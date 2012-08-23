<?php

define('skey', md5( Yii::app()->user->getSeed()));

class CustomUrlRule extends CBaseUrlRule {
	
 	public function createUrl($manager,$route,$params,$ampersand) {
 		$resp = $route;
 		if(count($params) === 0){
 			$resp = $route;
 		}
 		else {
	 			foreach ($params as $clave => $valor){
	 				if(is_array($valor)){
	 					foreach ($valor as $clave1 => $valor1){
	 						if($valor1 != null && $valor1 != ''){
	 							$resp = $resp.'/'.$clave.'%5B'.$clave1.'%5D/'.$valor1;
	 						}
	 						else {
	 							$resp = $resp.'/'.$clave.'%5B'.$clave1.'%5D/';
	 						}
	 					}		 					
	 				}
		 			$resp = $resp.'/'.$clave.'/'.$valor;
		 		} 
 		}
 		return $this->encode($resp);
 		//return $route;
 	}
	
	public function parseUrl($manager,$request,$pathInfo,$rawPathInfo) {

		$r = $this->decode($pathInfo);
		//return $pathInfo;
		return $r;
	}
	
	
	
	public  function safe_b64encode($string) {
		$data = base64_encode($string);
		$data = str_replace(array('+','/','='),array('-','_',''),$data);
		return $data;
	}
	
	public function safe_b64decode($string) {
		$data = str_replace(array('-','_'),array('+','/'),$string);
		$mod4 = strlen($data) % 4;
		if ($mod4) {
			$data .= substr('====', $mod4);
		}
		return base64_decode($data);
	}
	
	public  function encode($value){
		if(!$value){
			return false;
		}
		$text = $value;
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, skey, $text, MCRYPT_MODE_ECB, $iv);
		$r = trim($this->safe_b64encode($crypttext));
		return $r;
	}
	
	public function decode($value){
		if(!$value){
			return false;
		}
		$crypttext = $this->safe_b64decode($value);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, skey, $crypttext, MCRYPT_MODE_ECB, $iv);
		$r = trim($decrypttext);
		return $r;
	}
	

}
