<?php
namespace core\plugin;
use \core\plugin\msg as msg;
//this plugins show system messages on page .
//messages like 404 not found and access denied msg
class msg extends msg\module{
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
	
	/*
	 * INPUT:STRING:HEADER
	 * INPUT:STRING:BODY OF MESSAGE
	 * INPUT:STRING:TYPE(success,danger,warning,info)
	 * This function show custom message
	 * OUTPUT:ELEMENTS
	 */
	 public function msg($header, $body, $type = 'success'){
		 return $this->module_msg($header,$body,$type);
	 }
	 
	 /*
	  * This function use for show 404 message in service mode
	  */
	  public function msg404(){
		  $msg = $this->msg_404();
		  return $msg[1];
	  }

	

}

?>
