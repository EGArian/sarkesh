<?php
namespace core\plugin\administrator;

use \core\plugin as plugin;
use \core\cls\network as network;
use \core\cls\db as db;
use \core\cls\core as core;
use \core\cls\browser as browser;

class module extends view{

	private $users;
	private $msg;
	private $io;
	function __construct(){
		parent::__construct();
		$this->users = new plugin\users;
		$this->msg = new plugin\msg;
		$this->io = new network\io;
	}
	
	protected function module_load($content,$single_page=false){
		
		return $this->view_load($content[0],$content[1],$single_page);
	}
	
	protected function module_main(){
	
		//get menus from all plugins
		$menu = (array) null;
		$plugins = db\orm::find('plugins','enable=1');
		foreach($plugins as $plugin){
			//now get all menus from plugins
			$PluginName = '\\core\\plugin\\' . $plugin->name;
			$PluginObject = new $PluginName;
			if(method_exists($PluginObject,'core_menu')){
	
				$plugin_menu = call_user_func(array($PluginObject,'core_menu'));
				foreach($plugin_menu as $mnu){
					array_push($menu,$mnu);
				}
				
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
		$router = new core\router($_GET['p'], $_GET['a']);
		$plugin_content = $router->show_content(false);
		
		$obj_users = new plugin\users;
		$user_info = $obj_users->get_info();
		
		$content=$this->module_load(array(_('Administrator:') . $plugin_content[0],$this->view_main($menu,$plugin_content[1],$user_info)));
		return $content;
		
	}
	
	
	// this function show login page and get an input variable that set next page that after login you want to jump
	protected function module_login_page(){
		//get login panel
		$login_panel = $this->users->login();
		$login_panel[1] = browser\page::show_block($login_panel[0],$login_panel[1],'BLOCK');
		return $this->module_load($login_panel,true);
	}
	
	protected function module_no_permission(){
		$message = $this->msg->msg(_('no access'), _('you have no permission'),'danger');
		return $this->module_load($message,true);
	}
	
	protected function module_themes(){
		//Get all themes that exists
		$directory = scandir(AppPath. '/themes/');
		$themes = (array) null;
		foreach($directory as $files){
			if(is_dir(AppPath . 'themes/' . $files) && $files != '.' && $files != '..'){	
				array_push($themes,$files);
			}
		}
		//get current active theme
		$registry = new cls_registry;
		$active_theme = $registry->get('core','active_theme');
		
		//get themes info
		$themes_info = (array) null;
		foreach($themes as $theme_file){
			include_once(AppPath . '/themes/' . $theme_file . '/info.php');
			array_push($themes_info,$theme);
		}
		//send to view for show themes
		return $this->view_themes($themes,$themes_info,$active_theme);
	}
	
	//this function return dashboard of administrator area
	protected function module_dashboard(){
	
		return $this->view_dashboard();
	}
}	
?>
