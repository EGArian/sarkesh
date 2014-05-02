<?php
/*
	this class is a module for working with button
	
*/
class ctr_button_module extends ctr_button_view{
	
	function __construct(){
		 parent::__construct();
	}
	
	protected function module_draw($config){
		$this->view_draw($config);
	}
	//this function run php click event //
	
	protected function module_p_click($elements){
	
		if(isset($_REQUEST['p']) && isset($_REQUEST['f'])){
			$function_name = cls_io::cin('f', 'get');
			$plugin_name = cls_io::cin('p', 'get') . '_controller';
			//going to run function//

			
			$plugin = new $plugin_name;
			return call_user_func(array($plugin, $function_name),$elements);
			
		}
	}
}
