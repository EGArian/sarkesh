<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}

	public function login(){
		return $this->module_show();
	}
	
	public function abc($e){
		return $this->module_abc($e);
		
	}
}
?>
