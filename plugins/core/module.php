<?php
class core_module extends core_view{

	private $user;
	private $msg;
	private $io;
	function __construct(){
		parent::__construct();
		$this->user = new users;
		$this->msg = new msg;
		$this->io = new cls_io;
	}
	
	protected function module_load($content){
		
		return $this->view_load($content);
	}
	
	protected function module_main(){
	
		//get menus from all plugins
		$menu = (array) null;
		$plugins = cls_orm::find('plugins','enable=1');
		foreach($plugins as $plugin){
			//now get all menus from plugins
			
			if(method_exists($plugin->name,'core_menu')){
				array_push($menu,call_user_func(array($plugin->name,'core_menu')));
			}
		}
		
		//now $menu is 2d array with plugins menu 
		//show action
		//check for that plugin is set
		if(!isset($_GET['p']) ){
			$_GET['p'] = 'core';
		}
		
		//check for that action is set
		if(!isset($_GET['a']) ){
			$_GET['a'] = 'default';
		}
		
		//now going to do action
		$router = new cls_router($_GET['p'], $_GET['a']);
		$plugin_content = $router->show_content(false);
		
		$content=$this->module_load(array('title',$this->view_main($menu,$plugin_content)));
		echo $content;
		//return $content;
		
	}
	
	
	// this function show login page and get an input variable that set next page that after login you want to jump
	protected function module_login_page($url=''){
	
	
	}
}	
?>
