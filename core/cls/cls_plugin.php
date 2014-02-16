<?php
	//this class controll plugins
	class cls_plugin{
		private $db;
		
		function __construct(){
		
			$this->db = new cls_database;
		}
		
		// if plugin enabled this function return true and else return false
		public function is_enabled($plugin_name){
			$this->db->do_query('SELECT * FROM ' . TablePrefix . "plugins WHERE enable = '1' and name = ?;" , array($plugin_name));
			if($this->db->rows_count() != 0){
				//plugin is enable
				return true;
				
			}
			// if plugin not enable it mean disabled 
			return false;
		}
		
		//this function install plugin
		// first we get plugin from server (zip) and then uncompress that.
		//step 2 : install sql file
		//step 3 : update plugins table
		public function install($plugin_name){
			
		}
		
		//this function return an object from controller class of plugin.
		public function get_object($plugin_name){
			//check for that plugin files is present and plugin is enabled
			if(!$this->is_enabled($plugin_name) || !file_exists(AppPath . 'plugins/' . $plugin_name . '/controller.php')){
				//plugin not enabled or not installed
				$error_msg = _('System Error : one or more plugin requments is not enable');
				exit("<h1> $error_msg </h1>");
			}
			include_once(AppPath . 'plugins/' . $plugin_name . '/controller.php');
			include_once(AppPath . 'plugins/' . $plugin_name . '/view.php');
			include_once(AppPath . 'plugins/' . $plugin_name . '/madule.php');

			//now create an object from controller
			$object_controller  = $plugin_name . '_controller';
			$controller = new $object_controller;
			return $controller;
		
		}
		
		
		//this function disable plugin from database
		public function disable($plugin_name){
		
			$this->db->do_query('UPDATE ' . TablePrefix . "SET state = '0' WHERE name = ?" , array($plugin_name));
			
		}
		
		//this function get plugin from server and extract that on plugins folder
		public function download($plugin_name){
		$net = new cls_network;
		$file_adr = $net->download(PluginsCenter . $plugin_name . '/latest.zip');
		$zip = new cls_zip($file_adr);
		$zip->extract('plugins');
		
		}
	
	}

?>