<?php
namespace core\cls\core;
use \core\cls\core as core;
use \core\cls\network as network;
use \core\cls\browser as browser;
use \core\plugin as plugin;
use \core\cls\db as db;

//this class seperate url addrress
// for doing process we have some parameters that send with GET 
// 1- plugin parameter for finding what plugin do this process
// 2- action parameter for run that action on plugin
// and some etc parameters that plugin process that.
// if nothing send with action with GET class change that to 'default' and send that to plugin

class router{
	private $plugin;
	private $action;
	private $obj_io;
	private $localize;
	private $obj_plugin;
	function __construct($plugin='' ,$action=''){
		//create object from cls_plugin
		$this->obj_plugin = new core\plugin;
		//set last page that user see
		$this->set_last_page();
		//get localize
		$obj_localize = new core\localize;
		$this->localize = $obj_localize->get_localize();
		//-------------------------
		$this->obj_io = new network\io;

		if($plugin == '' || $action == ''){
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
				$obj_localize = new core\localize;
				$localize = $obj_localize->get_localize();
				$this->jump_page($localize['home'] ,true);

			}
		}
		else{
			$this->plugin = $plugin;
			$this->action = $action;
		}
				
	}
	public function show_content($show_content = true){
	      //this function run from page class.
	      // this function load plugin and run controller
	      //checking for that plugin is enabled
	      if($this->obj_plugin->is_enabled($this->plugin)){
				 $PluginName = '\\core\\plugin\\' . $this->plugin;
	     		 $plugin = new $PluginName;
	     		 //run action directly
	     		 if(method_exists($plugin,$this->action)){
					 $content = call_user_func(array($plugin,$this->action),'content');
				 }
				 else{	
					 if(method_exists($plugin,'default')){
						$content = call_user_func(array($plugin,'default'),'content');
					 }
						//show 404 page not found page
						$plugin = new plugin\msg;
						$content = call_user_func(array($plugin,'msg_404'));
						//jump user to 404 page
						$this->jump_page(array('service','1','plugin','msg','action','msg404'));	
				 }
				
	      }
		  else{
		  	//plugin is not enabled
		  	//show 404 page not found page
		  	$plugin = new plugin\msg;
			$content = call_user_func(array($plugin,'msg_404'));
			//jump user to 404 page
			$this->jump_page(array('service','1','plugin','msg','action','msg404'));
		  }
	      browser\page::set_page_tittle($content[0]);
          //show header in up of content or else
          if(sizeof($content) == 3 && $content[2] == false){
            
            $output_content = browser\page::show_block('',$content[1],'MAIN');
          }
          else{
 
            $output_content = browser\page::show_block($content[0],$content[1],'MAIN');
          }
		  
		  //show content id show_content was set
		  if($show_content){
				echo $output_content;
		  } 
		  return $content;
	      
	}
	//this function run services and jump request do plugin
	public function run_service(){
	 
		 if($this->obj_plugin->is_enabled($this->plugin)){
	 	    	 $PluginName = '\\core\\plugin\\' . $this->plugin;
	     		 $plugin = new $PluginName;
	     		 //run action directly
				
	     		 if(method_exists($plugin,$this->action)){
					 $result = call_user_func(array($plugin,$this->action),'content');
				 }
				 else{	
					//show service not found message
					$result = _('Warning:Your requested service not found!');
				 }
				
	      }
		  else{
					//plugin is not active
		  			//show service not found message
					$result = _('Warning:Your requested service not found!');
		  }
	      echo $result;
	      
	}
	//this function is for runing services from controls
	public function run_control(){
		//first create object from form elements
		$elements = new core\uiobjects($_GET['options']);
		//run control
		$ctr_name = '\\core\\plugin\\' . $this->plugin;
		$ctr = new $ctr_name;
		
		//run event
		//going to run function
		$PluginName = '\\core\\plugin\\' . $this->plugin;
		$plugin = new $PluginName;
		$result = call_user_func(array($plugin, $this->action),$elements->get_elements());
		//now show result in xml for use in javascript
		$xml = new db\xml($result);
		echo $xml->simple_array_to_xml($result, "root");
		
	}
	#this function is for refresh page and jump to address
	public function site_refresh($url='0',$inner_url=true , $time=5){
		if($url=='0'){$url= SiteDomain;}
		elseif($inner_url && $url != '0'){ $url= SiteDomain . $url;}
		header("Refresh: $time ; url=$url");
	}
	public static function jump_page($url,$inner_url=true){
		if(!$inner_url && $url != SiteDomain){ $url= SiteDomain . $url;}
		elseif($url==SiteDomain){ $url= SiteDomain;}
		elseif(is_array($url)){
			$url = core\general::create_url($url);
		}
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
			header('Location: ' . SiteDomain );
		}
	}	
	#this function return cerrent address of page(cerent url)
	
	public function this_url(){
		return $_SERVER['REQUEST_URI'];	
	}

//END CLASS
}

?>
