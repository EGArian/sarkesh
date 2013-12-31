<?php
class cls_general{
private $settings;

#this function is for create raundom string
	
	public function random_string($length = 10) {
	      $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	      $string = '';    
	      for ($p = 0; $p < $length; $p++) {
		      $string .= $characters[mt_rand(0, strlen($characters)-1)];
	      }
	      return $string;
	}
	

}