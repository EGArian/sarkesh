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
	private $localize;
	function __construct(){
		//get localize
		$obj_localize = new cls_localize;
		$this->localize = $obj_localize->get_localize();
		//-------------------------
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
			// plugin not set
			// now jump to Home page
			$obj_localize = new cls_localize;
			$localize = $obj_localize->get_localize();
			$this->jump_page($localize['home'] ,true);

		}
		
		//get plugin and run action on it.

		
	}
	public function show_content(){
	      //this function run from page class.
	      // this function load plugin and run controller
	      $plugin_name = $this->plugin . '_controller';
	      $plugin = new $plugin_name;
	      
	      //set tittle of page
	      global $sys_page;
	      // create local domain
	      bindtextdomain($this->localize['language'], './plugins/' . $this->plugin .'/languages/');
	      $sys_page->set_page_tittle($plugin->action($this->action, 'MAIN'));
	      //back localize to theme
	      bindtextdomain($this->localize['language'], './themes/' . $this->localize['theme'] .'/languages/');

	}
	//this function run services and jump request do plugin
	public function run_service(){
	      $plugin_name = $this->plugin . '_controller';
	      $plugin = new $plugin_name;
	      $plugin->service($this->action);
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
		if($url!=''){ $last_url=$url;}
		else{ $last_url = $_SERVER['HTTP_REFERER'];}
		
		if($last_url!=''){
			setcookie('SYS_LAST_PAGE',$last_url);
		}
		else{
			setcookie('SYS_LAST_PAGE',SiteRoot);
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