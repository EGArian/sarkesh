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
		return $this->module_main();
		
	}
	
	//this function return url of core menus to admin area
	public static function core_menu(){
		return array('#','Core Settings');
	}
	
	
}
	
	
