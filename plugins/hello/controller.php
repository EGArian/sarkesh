<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}

	public function textarea(){
		$c = new ctr_textarea;
		$c->configure('VALUE','ALI');
		
		$b = new ctr_button;
		//$c->configure('EDITOR',FALSE);
		$b->configure('P_ONCLICK_PLUGIN','hello');
		$b->configure('P_ONCLICK_FUNCTION','onclick');
		
		$f = new ctr_form('vv');
		$f->add($c);
		$f->add($b);
		return array(1,$f->draw());
	}
	
	public function abc($e){
		return $this->module_abc($e);
		
	}
	
	public function table(){
	   $r = new cls_string;
		return $this->module_table();
	}
	
	public function  gh(){
		
		$t = new ctr_uploader;
		$t->configure('SIZE',12);
		
		
		return array(1,$t->draw());
	}
	public function onclick($e){
		$e['ctr_button']['LABEL'] =$e['TEXTAREA']['VALUE'];
	return $e;
	}
	
	
	
}
?>
