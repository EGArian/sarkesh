<?php
class users extends users_module{
	function __construct(){
		parent::__construct();
	}
	
	//this function return login form
	public function login(){
		$a = new cls_orm;
		return $this->module_login();
	}
	
	//this function show register form
	public function register(){
		return array(2,2);
	}
	
	//this function in ligin button onclick event
	public function btn_login_onclick($e){
		
		$e['txt_username']['VALUE'] = $e['ckb_remember']['CHECKED'];
		$e['txt_password']['VALUE'] = "";
		RETURN $e;
	}
}
?>
