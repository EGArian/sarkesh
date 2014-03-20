<?php
class admin_module{
	private $view;
	private $db;
	private $user;
	function __construct(){
		$this->view = new admin_view;
		$this->db = new cls_database;
		$this->user = new users_module;
	}

	public function show_panel(){
		//check that user has permation for access to admin panel
		
		$this->view->show_panel($this->get_plugins_menu());
	
	}
	
	//this function return all contents that return from admin_menu function in controller class of all plugins
	//it's most use for return plugin menu for show in admin panel
	public function get_plugins_menu(){
		//first get all active plugins
		$this->db->do_query('SELECT * FROM ' . TablePrefix . "plugins WHERE enable=1 and name!='core';");
		$plugins = $this->db->get_array();
		//this varible store all menus back from plugins->admin_menu()
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
}
?>