<?php
//this plugins say hello to world
class calendar_controller{
	//create view and module for working with MVC metode
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new calendar_view;
		$this->module = new calendar_module;
	}
	//this function for show content in page
	//if you want to wotk with cls_page->show_block you should send $view to that.
	public function action($action_name, $view){
	      
	      if($action_name == 'select_date'){
		$this->view->select_date($this->module->get_calendar_name(), $view);
	      }
	  
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