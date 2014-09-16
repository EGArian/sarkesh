<?php
namespace plugin;
class hello extends \plugin\hello\module{
	
	function __construct(){
		parent::__construct();
	}
	
	public static function core_menu(){
		$menu = [['#','Say Hello']];
		return $menu;
	}
	
	public function test(){
		$form = new \control\form('test');
		
		$text = new \control\textbox('textbox');
		$text->configure('LABEL','Name');
		$text->configure('ADDON','N');
		
		$btn = new \control\button('BTN');
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
