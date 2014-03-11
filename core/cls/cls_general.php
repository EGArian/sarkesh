<?php
class cls_general{

	#this function is for create raundom string	
	public function random_string($length = 10 ,$type = 'NC') {
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
	

}
?>