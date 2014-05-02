<?php
//this plugins say hello to world//
class hello_controller{
	//create view and module for working with MVC metode//
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new hello_view;
		$this->module = new hello_module;
	}
	//this function for show content in page//
	//if you want to wotk with cls_page->show_block you should send $view to that.//
	public function action($action_name, $view){
	      
	      if($action_name == 'say'){
				$this->view->say_hello($view);
	      }
	      elseif($action_name =="xxl"){
			  return $this->module->sample();
		  }
	  
	}
	/*
	this function is for controll ajax requests
	if use ?service=1&plugin=plugin_name&action=action site run on single block
	this means just your your proccess in this function run
	for demo see http://yoursite.com/?service=1&plugin=hello&action=say
	*/
	
	
	public function service($service_name){
		
		if($service_name == 'say'){
			echo 'Hello world';
		}
	}

	public function ksh($elements){
		//echo 'this is a test for get back data from php code';	
		$elements['BABAK']['label'] = "4004";
		$elements['RV']['value'] = "babak";
		return $elements;
	}
	/*
	 * In sarkesh we use this function for create menu in core panel.
	 * Core is a plugin for control system settings
	 * you can see this menu in core admin menu
	 */
	 
	 public function admin_menu(){
	 	return '<li><a href="#" >Hello World!</a></li>';
	 }
	

}

?>
