<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}

	public function login(){
		$a = new ctr_textarea;
		$a->configure("STYLE","border: 1px black;");
		return array(1,$a->draw());
	}
	
	public function abc($e){
		return $this->module_abc($e);
		
	}
}
?>
