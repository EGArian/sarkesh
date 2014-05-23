<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}

	public function login(){
		$a = new ctr_radioitem;
		$a->configure("LABEL","ALIREZE");
		$a->configure("CHECKED",TRUE);
		$b= new ctr_radiobuttons;
		$b->add($a);
		$b->add($a);
		$c= new ctr_form("ali");
		$c->add($b);
		return array(1,$c->draw());
	}
	
	public function abc($e){
		return $this->module_abc($e);
		
	}
}
?>
