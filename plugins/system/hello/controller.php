<?php
class hello extends hello_module{
	
	function __construct(){
		parent::__construct();
	}
	
	public static function core_menu(){
		$menu = [['#','Say Hello']];
		return $menu;
	}
	
	public function test(){
		$form = new ctr_form('test');
		
		$text = new ctr_textbox('textbox');
		$text->configure('LABEL','Name');
		$text->configure('ADDON','N');
		
		$btn = new ctr_button('BTN');
		$btn->configure('LABEL','Click me!');
		
		$btn->configure('P_ONCLICK_PLUGIN','hello');
		$btn->configure('P_ONCLICK_FUNCTION','btn_onclick');
		
		$form->add_array(array($text,$btn));
		
		return array('TITTLE',$form->draw());
		
	}
	public function btn_onclick($e){
		
		$a = $e['textbox']['VALUE'];
		$e['RV']['MODAL'] = cls_page::show_block('title',$a,'MODAL','type-danger');
		return $e;
		
	}
	
}
?>
