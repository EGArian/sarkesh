<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}
	
	public static function core_menu(){
		$menu = [['#','Say Hello']];
		return $menu;
	}
	public function textarea(){
		$c = new ctr_textarea;
		$c->configure('VALUE','ALI');
		
		$b = new ctr_button;
		$c->configure('EDITOR',true);
		$b->configure('P_ONCLICK_PLUGIN','hello');
		$b->configure('P_ONCLICK_FUNCTION','onclick');
		$b->configure('NAME','hello');
		$b->configure('VALUE','BBB');
		
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
		$e['hello']['LABEL'] =$e['CLICK']['VALUE'];
	return $e;
	}
	
	public function val(){
		$a = new ctr_textbox;
		$a->configure('VALUE',12);
		return array(1,$a->draw());
	}
	
	
	
}
?>
