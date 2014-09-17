<?php
	namespace core\cls\core;
	use \core\cls\db as db;
	//this classs for using registry table in database
	class registry{
		
		private $db;
		function __construct(){
			$this->db = new db\mysql;
		}
		
		public function get($plugin, $key){
			$this->db->do_query('SELECT r.a_key, r.value, p.name FROM registry r INNER JOIN plugins p ON p.id = r.plugin  WHERE p.name = ? and r.a_key = ?;', array($plugin, $key));
			if($this->db->rows_count() != 0){
				$result = $this->db->get_first_row_array();
				return $result['value'];
			}
			//key not found return false
			//you can find back result with gettypr function
			//if type = 'boolean' means key of plugin not set
			return false;
			
		
		}
		public function get_plugin($plugin){
			 $this->db->do_query('SELECT r.a_key, r.value, p.name FROM registry r INNER JOIN plugins p ON p.id = r.plugin  WHERE p.name = ?;', array($plugin));
			 $db_result = $this->db->get_array();
			 foreach($db_result as $row){
				$result[$row['a_key']] = $row['value'];
			 }

			 return $result;
		}
		public function set($plugin, $key, $value){
			$this->db->do_query('UPDATE registry SET value=? WHERE plugin=? and a_key=?;', array($value, $plugin, $key)); 
		}
		
		public function delete_plugin($plugin){
			//this function delete all plugin keys
			$this->db->do_query('DELETE FROM registry WHERE plugin=?;', array($plugin)); 

		}
		
		public function add_key($plugin, $key){
			 //IF we check for that key of plugin is exsist before
			 $result = $this->get($plugin, $key);
			 if( gettype($result) == 'boolean' ){
				//sure key is not exist before going to insert that
				$this->db->do_query('INSERT INTO registry (plugin,a_key) VALUES (?,?);', array($plugin, $key)); 
				
			 }
		}
	
	}
	?>
