<?php
	//this class controll plugins
	class cls_plugin{
		private $db;
		
		function __construct(){
		
			$this->db = new cls_database;
		}
		
		// if plugin enabled this function return true and else return false
		public function is_enable($plugin_name){
			$this->db->do_query('SELECT * FROM ' . TablePrefix . "plugins WHERE state = '1' and name = ?;" , array($plugin_name));
			if($this->db->rows_count() != 0){
				//plugin is enable
				return true;
			}
			// if plugin not enable it mean disabled 
			return false;
		}
	
	}


?>