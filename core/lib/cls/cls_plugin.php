<?php
	namespace core;
	//this class controll plugins
	class plugin{
		private $db;
		
		function __construct(){
		
			$this->db = new cls_database;
		}
		
		// if plugin enabled this function return true and else return false
		public function is_enabled($plugin_name){
			$this->db->do_query("SELECT * FROM plugins WHERE enable = '1' and name = ?;" , array($plugin_name));
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
		
		//this function disable plugin from database
		public function disable($plugin_name){
		
			$this->db->do_query("UPDATE SET state = '0' WHERE name = ?" , array($plugin_name));
			
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
