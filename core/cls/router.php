<?php

//this class seperate url addrress
// for doing proccess we have some parameters that send with GET 
// 1- plugin parameter for finding what plugin do this proccess
// 2- action parameter for run that action on plugin
// and some ect parameters that plugin proccess that.
// if nothing send with action with GET class change that to 'default' and send that to plugin

class cls_router{
	private $plugin;
	private $action;
	
	private $obj_io;
	function __construct(){
		$this->obj_io = new cls_io;
		if(isset($_GET['plugin'])){
			$this->plugin = $this->obj_io->cin('plugin','get');
			//now we check action
			if(isset($_GET['action'])){
				//action set by user
				$this->action = $this->obj_io->cin('action','get');
			}
			else{
				//action not set. 
				//now we jump to default action
				$this->action = 'default';
			}
		}
		else{
			// 404 page not found !
			// now jump to error plugin ,action 404
			$this->plugin = 'error';
			$this->action = '404';

		}
		
	}
	public function show_content(){
	      // this function load plugin and run controller
	      
	}

//END CLASS
}

?>