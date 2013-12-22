<?php
#REQ = DATABASE , COOKIE , SESSION , GENERAL
#this class is for auth user and ect
class validator{
private $db;
	function __construct(){
		$this->db= new cls_database;
		$this->db->do_quary("select * from " . TablePrefix . "settings;");
		$row=$this->db->get_first_row_array();
		$last_check_refresh = $row['validator_max_time'] + $row['validator_last_check'];
		if($last_check_refresh < time()){
			#refresh database for delete old validator keys
		}
	#END CLASS
	}
}
?>