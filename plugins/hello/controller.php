<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}

	public function textarea(){
		$c = new ctr_textarea;
		$c->configure('VALUE','ALI');
		return array(1,$c->draw());
	}
	
	public function abc($e){
		return $this->module_abc($e);
		
	}
	
	public function table(){
		return $this->module_table();
	}
	
	public function  gh(){
		
		$t = new ctr_uploader;
		$t->configure('SIZE',6);
		
		
		return array(1,$t->draw());
	}
	
	
	
}
?>
