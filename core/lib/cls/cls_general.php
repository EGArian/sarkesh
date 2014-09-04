<?php
class cls_general{

	#this function is for create raundom string	
	static function random_string($length = 10 ,$type = 'NC') {
		if($type == 'NC'){
			 $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
		}
		elseif($type == 'N'){
			$characters = '0123456789';
		}
		else{
			$characters = 'abcdefghijklmnopqrstuvwxyz';
		}
	      $string = '';    
	      for ($p = 0; $p < $length; $p++) {
		      $string .= $characters[mt_rand(0, strlen($characters)-1)];
	      }
	      return $string;
	}
	
	//this function return internal url. you should just send to that parameters
	static function create_url($parameters){
		$url = '?';
		for($i = 1; $i<= (max(array_keys($parameters))+1) ; $i +=2){
			if($i != 0){
				$url .= '&';
			}
			$url .= $parameters[$i -1];
			$url .= '=';
			$url .= $parameters[$i];
		}
		return $url;
	
	}
	

}
?>