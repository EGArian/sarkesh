<?php
//this plugins say hello to world
class pezeshkan_controller{
	private $view;
	private $module;
	
	function __construct(){
		$this->view = new pezeshkan_view;
		$this->module = new pezeshkan_module;
	}
	public function action($action_name,$view){
	
	      if($action_name == 'insert_doctor'){
			//show form to insert new doctor
			$this->view->show_insert_doctor($view);
	      }
	      
	
	}
	
	public function service($service_name){
		
		if($service_name == 'say'){
		
		}
	}
	

}

?>