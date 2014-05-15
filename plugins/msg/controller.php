<?php
//this plugins show system messages on page .
//messages like 404 not found and access denied msg
class msg extends msg_module{
	//create view and module for working with MVC metode
	private $view;
	private $module;
	
	function __construct(){
		parent::__construct();
	}
	//this function for show content in page
	//if you want to wotk with cls_page->show_block you should send $view to that.
	public function msg_404(){
		//going to show message
		return $this->module_404();
	      
	  
	}

	

}

?>
