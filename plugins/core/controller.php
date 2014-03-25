<?php
class core_controller{
	private $module;
	private $view;
	private $msg;
	private $users;
	function __construct(){
		$this->module = new core_module;
		$this->view = new core_view;
		$this->msg = new msg_controller;
		$this->users = new users_module;
	}
	
	public function action($action, $view, $show=true){
		
		if($action == 'default_core_page'){
		      return $this->view->show_default_page($view);
		}
		elseif($action == 'plugins_list'){
		      return $this->module->show_plugins_list($view, $show);
		}
		else{
		      return $this->msg->action(404,$view,false);
		}
	
	}
	# this function controll service requests
	public function service($service){
		if($service == 'plugins_changestate'){
			//going to change state of plugins
			echo $this->module->plugin_changestate();
		}
		elseif($service == 'plugins_admin_panel'){
			//we want to show panel of plugins to manage
			$content = $this->module->show_plugins_list('MAIN', false);
			echo $content[1];
		}
		
	}
	public function core_controller($plugin, $action){
		//first of all we want to check that user has permission to access to admin area?
		if($this->users->has_permission('core_admin_panel')){
			//going to show admin panel
			if($action == 'default' && $plugin == 'default'){
				//no plugin set so user want to see admin panel(main)
				//user want to show admin panel
				$content = $this->default_content('MAIN');
			}
			else{

				if(class_exists($plugin . '_controller')){
					$plugin_name = $plugin . '_controller';
					$plugin_object = new $plugin_name;
					$content = $plugin_object->action($action,'MAIN',false);
				}
				else{
					$content = $this->msg->action(404,'MAIN',false);
				}
			
			}
			//show panel
			$this->module->show_core_page($content);
		}
		else{
			//access denied
			$users_controller = new users_controller;
			$content = $users_controller->action('login_panel','MAIN',false);
			$this->view->show_single_page($content);
		}	
	}
	private function default_content($view){
		//this function return default content that most show on front page
		return  $this->view->show_default_page($view);
	}
	
	//this function return menu link on admin panel
	public function admin_menu(){
		return $this->view->core_menu();

	}
}
?>