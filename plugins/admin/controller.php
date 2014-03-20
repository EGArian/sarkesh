<?php
class admin_controller{
	private $module;
	private $view;
	
	function __construct(){
		$this->module = new admin_module;
		$this->view = new admin_view;
	}
      
	public function action($plugin, $action){
		if($action == 'default' && $plugin == 'default'){
			//no plugin set so user want to see admin panel(main)
			//user want to show admin panel
			$content = $this->default_content();
		}
		else{
			if(class_exists($plugin . '_controller')){
				$plugin_name = $plugin . '_controller';
				$plugin_object = new $plugin_name;
				$plugin_object->action($action);
			
			}
		}
		
		$this->module->show_panel($content);

		
      
	}
	private function default_content(){
		//this function return default content that most show on front page
		
	}
}
?>