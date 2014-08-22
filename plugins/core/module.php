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
		$plugins = cls_orm::find('plugins','enable=1');
		foreach($plugins as $plugin){
			//now get all menus from plugins
			
		}
		
	}
	
	
	// this function show login page and get an input variable that set next page that after login you want to jump
	protected function module_login_page($url=''){
	
	
	}
}	
?>
