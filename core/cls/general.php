<?php
class cls_general{
public $settings;

	function __construct(){
		$db = new cls_database;
		$db->do_query("select * from " . TablePrefix . "settings where language=?;" , array('en-US'));
		$this->settings = $db->get_first_row_array();
	}

}