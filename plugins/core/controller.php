<?php
class core extends core_module{

	private $msg;
	private $users;
	function __construct(){
		parent::__construct();
		$this->msg = new msg;
		$this->users = new users;
	}
	//this service load basic of html page of admin panel.
	//it's service and just return html elements of basic page
	//$content is an array [title of page,content of page]
	private function load($content){
			return $this->module_load($content);
	}
	
	
	///this function show administrator panel
	//it's service
	public function main(){
		
		//first check for that user has permission for see administrator area.
		if($this->users->has_permission('core_admin_panel')){
			//user has permission 
			//going to show administrator area
			//administrator area has 2 column right for menus and left for content of plugins
			return $this->module_main();
			
		}
		else{
			//user do not has no permission to access this part
			return $this->module_login_page();
		}
	}
	
}
	
	
