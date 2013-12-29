<?php
class cls_general{
private $settings;

	function __construct(){
		$db = new cls_database;
		$db->do_query("select * from " . TablePrefix . "settings;");
		$this->settings = $db->get_first_row_array();
	}
	#this function return system settings
	public function get_settings(){
		return $this->settings;
	}

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