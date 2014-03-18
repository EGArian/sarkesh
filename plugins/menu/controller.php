<?php
//this plugins is for controll menus in sarkesh cms
class menu_controller{
	//create view and module for working with MVC metode
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new menu_view;
		$this->module = new menu_module;
	}
	//this function for show content in page
	//if you want to wotk with cls_page->show_block you should send $view to that.
	public function action($action_name, $view, $position){
	      if($action_name == 'show_menu'){
		$menus = $this->module->get_menus($position);
		if($menus != 0){
			foreach($menus as $links){
				$this->view->show_menus($view, $links);
			}
		}
		
	      }
	}
	//this function is for controll ajax requests
	//if use ?service=1&plugin=plugin_name&action=action site run on single block
	//this means just your your proccess in this function run
	//for demo see http://yoursite.com/?service=1&plugin=hello&action=say
	
	public function service($service_name){
		
		$menus = $this->module->get_menus('header');
		if($menus != 0){
			$this->view->show_menus('block', $menus);
		}
	      
	}
	

}

?>