<?php

//this class seperate url addrress
// for doing process we have some parameters that send with GET 
// 1- plugin parameter for finding what plugin do this process
// 2- action parameter for run that action on plugin
// and some etc parameters that plugin process that.
// if nothing send with action with GET class change that to 'default' and send that to plugin

class cls_router{
	private $plugin;
	private $action;
	private $obj_io;
	private $localize;
	private $obj_plugin;
	function __construct(){
		//create object from cls_plugin
		$this->obj_plugin = new cls_plugin;
		//set last page that user see
		$this->set_last_page();
		//get localize
		$obj_localize = new cls_localize;
		$this->localize = $obj_localize->get_localize();
		//-------------------------
		$this->obj_io = new cls_io;
		if(isset($_REQUEST['plugin'])){
			$this->plugin = $_REQUEST['plugin'];
			//now we check action
			if(isset($_REQUEST['action'])){
				//action set by user
				$this->action = $_REQUEST['action'];
			}
			else{
				//action not set. 
				//now we jump to default action
				$this->action = 'default';
			}

		}
		else{
			// plugin not set
			// now jump to Home page
			$obj_localize = new cls_localize;
			$localize = $obj_localize->get_localize();
			$this->jump_page($localize['home'] ,true);

		}
				
	}
	public function show_content(){
	      //this function run from page class.
	      // this function load plugin and run controller
	      //checking for that plugin is enabled
	      if($this->obj_plugin->is_enabled($this->plugin)){
	 	    	 $plugin_name = $this->plugin . '_controller';
	     		 $plugin = new $plugin_name;
			 $content = $plugin->action($this->action, 'MAIN','content', false);	
	      }
		  else{
		  	//plugin is not enabled
		  	//show 404 page not found page
		  	$plugin = new msg_controller;
			$content = $plugin->action(404, 'MAIN',false);
		  }
	      cls_page::set_page_tittle($content[0]);
	      echo $content[1];
	}
	//this function run services and jump request do plugin
	public function run_service(){
		$plugin_name = $this->plugin . '_controller';
		$plugin = new $plugin_name;
		$plugin->service($this->action);
	}
	//this function is for runing services from controls
	public function run_control(){
		//first create object from form elements
		$elements = new cls_uiobjects($_GET['options']);
		//run control
		$ctr_name = $this->plugin;
		$ctr = new $ctr_name;
		
		//run event
		//going to run function//	
		$plugin = new $this->plugin;
		$result = call_user_func(array($plugin, $this->action),$elements->get_elements());
		//now show result in xml for use in javascript
		$xml = new cls_xml($result);
		echo $xml->simple_array_to_xml($result, "root");
		
	}
	#this function is for refresh page and jump to address
	public function site_refresh($url='0',$inner_url=true , $time=5){
		if($url=='0'){$url= SiteRoot;}
		elseif($inner_url && $url != '0'){ $url= SiteRoot . $url;}
		header("Refresh: $time ; url=$url");
	}
	public static function jump_page($url,$inner_url=true){
		if(!$inner_url && $url != SiteRoot){ $url= SiteRoot . $url;}
		elseif($url==SiteRoot){ $url= SiteRoot;}
		header("Location:$url");
		/* Make sure that code below does not get executed when we redirect. */
		exit;
	}
	#this function set last page that visited
	
	public function set_last_page($url=''){
		$last_url ='';
		if($url!=''){
			$last_url=$url;
		}
		else{
			if(isset($_SERVER['HTTP_REFERER'])){
				$last_url = $_SERVER['HTTP_REFERER'];
			}
		}
		
		if($last_url!=''){
			setcookie('SYS_LAST_PAGE',$last_url);
		}
	}
	#this function jump page that set by function set_last_visited_page
	
	public function jump_last_page(){
		$obj_io = new sys_io;
		if(isset($_COOKIE['SYS_LAST_PAGE'])){
			header('Location: '. $obj_io->cin('SYS_LAST_PAGE','cookie'));
		}
		else{ 
			header('Location: ' . SiteRoot );
		}
	}	
	#this function return cerrent address of page(cerent url)
	
	public function this_url(){
		return $_SERVER['REQUEST_URI'];	
	}

//END CLASS
}

?>
