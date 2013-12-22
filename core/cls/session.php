<?php
    //for use this class we should start sessions
    //for disable sesions add # to line below
    session_start();
class cls_session {
	public $session_number;
	
	public function __construct(){
		try{
			$this->session_number= session_id();
		}
		catch(exception $ex){
			echo _("session diabled by host");
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