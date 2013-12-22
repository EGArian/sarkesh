<?php

class cls_session {
	public $session_number;
	
	public function __construct(){
		#this line most be between try catch block.
		try{
		$this->session_number= session_id();
		}
		catch(exception $ex){
			
		}
	}
	
	public function set($key,$value){
		$_SESSION[$key]=$value;
	}
	
	public function get($key){
		#return 0 mean not found
		if (!isset($_SESSION[$key])){ return 0;}
		return $_SESSION[$key];
	}
	
	public function is_set($key){
		if (isset($_SESSION[$key])){ return TRUE;}
		return false;
	}
	
	public function delete($key){
		#session key not found
		if (!isset($_SESSION[$key])){ return TRUE;}
		unset($_SESSION[$key]);
		return TRUE;	
	}

}

?>