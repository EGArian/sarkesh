<?php
//this plugins show system messages on page .
//messages like 404 not found and access denied msg
class msg_controller{
	//create view and module for working with MVC metode
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new msg_view;
		$this->module = new msg_module;
	}
	//this function for show content in page
	//if you want to wotk with cls_page->show_block you should send $view to that.
	public function action($action, $view){
		//going to show message
		return $this->view->show_msg($action, $view);
	      
	  
	}
	//this function is for controll ajax requests
	//if use ?service=1&plugin=plugin_name&action=action site run on single block
	//this means just your your proccess in this function run
	//for demo see http://yoursite.com/?service=1&plugin=hello&action=say
	
	public function service($service_name){
		
		if($service_name == 'say'){
		echo 'Hello world';
		}
	}
	

}

?>