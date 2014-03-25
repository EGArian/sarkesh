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
	
	//this function return all menus that stored in a position
	public function get_menus($position){
		$localize = new cls_localize;
		$local = $localize->get_localize();
		//first get menus
		$query = 'SELECT * FROM menus where position=? and localize=?;';
		$this->db->do_query($query, array($position, $local['language']));
		$result = $this->db->get_array();
		$menus = null;
		foreach($result as $menu){
			 $query = "SELECT m.name as 'm.menu', m.header as 'm.header', m.direction as 'm.direction', m.position as 'm.position', m.localize as 'm.localize', l.id as 'l.id' , l.ref_id as 'l.ref_id' , l.url as 'url', l.label as 'label' ,l.enable as 'l.enable'";
			 $query .= " FROM menus m INNER JOIN links l ON l.ref_id = m.id WHERE m.position=? and m.localize=? and l.ref_id=?;"; 
			 $this->db->do_query($query, array($position, $local['language'], $menu['id']));
			 $menus[] = $this->db->get_array();
		}
		
		if($menus != null){
			return $menus;
		}
		else{
			return 0;
		}
	}
}
?>