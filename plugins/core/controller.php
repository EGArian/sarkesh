<?php
class core_controller{
	private $module;
	private $view;
	
	function __construct(){
		$this->module = new core_module;
		$this->view = new core_view;
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
	
	//this function return menu link on admin panel
	public function admin_menu(){
		$url = cls_general::create_url(array('panel','admin','plugin','admin','action','show_admin_page'));
		return '<a href="' . $url . '">admin area</a>';
	}
}
?>