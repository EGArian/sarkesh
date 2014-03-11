<?php
class menu_module{
	//$db is an object from cls_database
	private $db;
	private $view;
	
	function __construct(){
		//create objects
		$this->view = new hello_view;
		$this->db = new cls_database;
	}
	
	//this function return all menus that stored in a poition
	public function get_menus($position){
		//this function return all menues thats set for a position
		$query = "SELECT m.name as 'm.menu', m.position as 'm.position', l.parent_id as 'l.parent_id' , l.ref_id as 'l.ref_id' , l.url as 'l.url', l.label as 'l.lable' ,l.enable as 'l.enable'";
		$query .= " FROM " . TablePrefix . "menus m INNER JOIN links l ON l.ref_id = m.id WHERE m.position=?;"; 
		$this->db->do_query($query, array($position));
		return $this->db->get_array();
	}
	
}
?>