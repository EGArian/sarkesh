<?php
class core_module{
	private $view;
	private $db;
	private $user;
	private $msg;
	private $io;
	function __construct(){
		$this->view = new core_view;
		$this->db = new cls_database;
		$this->user = new users_module;
		$this->msg = new msg;
		$this->io = new cls_io;
	}

	public function show_core_page($content){
		
		$this->view->show_core_page($this->get_plugins_menu(), $content);
	
	}
	
	#this function return all contents that return from admin_menu function in controller class of all plugins
	#it's most use for return plugin menu for show in admin panel
	public function get_plugins_menu(){
		#first get all active plugins
		$this->db->do_query("SELECT * FROM plugins WHERE enable=1;");
		$plugins = $this->db->get_array();
		#this variable store all menus back from plugins->admin_menu()
		$menus = null;
		foreach($plugins as $plugin){
			$plugin_name = $plugin['name'] . '_controller';
			$plugin_object = new $plugin_name;
			if(method_exists($plugin_object, 'admin_menu')){
			      $menus[] = $plugin_object->admin_menu();
			}
			
		}
		return $menus;
	
	}
	//this function return plugins info
	//if active = false then it send back all plugins and else return just activated plugins
	public function get_plugins($active = true){
		if($active){
			$this->db->do_query('SELECT * FROM plugins WHERE enable=1 and can_edite != 0;');
		}
		else{
			$this->db->do_query('SELECT * FROM plugins WHERE can_edite != 0;');
		}
		//get extra information from info.php files in plugins folder
		$result = $this->db->get_array();
		$num = 0;
		foreach ($result as $plugin) {
			include_once (AppPath . 'plugins/' . $plugin['name'] . '/info.php');	
			$result[$num]['author'] = $plugin_info['author'];
			$result[$num]['description'] = $plugin_info['description'];
			$result[$num]['version'] = $plugin_info['version'];
			$num += 1;
		}
		
		return $result;
	}
	//this function return active theme that is set on site
	public function active_theme(){
		$registry = new cls_registry;
		return $registry->get('core', 'active_theme');
	}
	
	#this function show list of all plugins 
	public function show_plugins_list($view, $show){
		#firs check for permission user access
		if($this->user->has_permission('core_admin_panel')){
					return $this->view->show_plugins_list($this->get_plugins(FALSE), $view, $show);
		}
		else{
			return $this->msg->action(403, $view);
		}	
	}
	#this function disable or enable plugins
	public function plugin_changestate(){
		//checking permission
		if($this->user->has_permission('core_admin_panel')){
			if(isset($_GET['value'])){
				$state = $this->io->cin('value', 'get');	
				$values = explode("*", $state);
				try{
					$this->db->do_query('UPDATE plugins SET enable=? where name=?', array($values[0],$values[1]));
					return 1;
				}
				catch(exception $e){
					return $this->view->error_in_operation($e);
				}
			}	
		}
		//user has no permission to access this method
		else{
			return $this->msg->action(403, 'MAIN');
		}
			
	}
	//this function get informations about themes so show this on page
	public function show_appearance($view, $show){
		
		//first get all theme folders in themes folder
		$theme_dir = 'themes/*';
		$themes = glob(AppPath . $theme_dir, GLOB_ONLYDIR);
		
		//get active theme
		$registry = new cls_registry;
		$theme_name = $registry->get('core','active_theme');
		foreach ($themes as $key => $t) {
			include_once ($t . '/info.php');
			$themes_info[$key]['img'] = $theme['img'];
			$themes_info[$key]['author'] = $theme['author'];	
			$themes_info[$key]['name'] = $theme['name'];
			$themes_info[$key]['version'] = $theme['version'];
			//get folder name
			$adr = explode("/", $t);
			$index = max(array_keys($adr));			
			$themes_info[$key]['folder_name'] = $adr[$index];
			$themes_info[0]['count'] = $key + 1;
			if(trim($theme_name) == trim($themes_info[$key]['folder_name'])){
				$themes_info[$key]['default'] == '1';
			}
			else{
				$themes_info[$key]['default'] == '0';
			}
			
		}
		return $this->view->show_appearance($view, $show, $themes_info);
	}
	
}
?>
