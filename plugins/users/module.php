<?php
class users_module extends users_view{
	
	
	function __construct(){
		parent::__construct();
	}
	
	public function module_login(){
		return $this->view_login();
	}
	
}
?>
