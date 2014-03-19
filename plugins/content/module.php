<?php
class content_module{
	private $view;
	//------------
	private $db;
	private $io;
	private $obj_localize;
	function __construct(){
		$this->view = new content_view;
		$this->obj_localize = new cls_localize;
		$this->db = new cls_database;
		$this->io = new cls_io;
	}
	
	//this function return page content for show in view
	//of this function return null that means page not found
	public function show_page_content(){
		
		if(isset($_GET['id'])){
			//get content id
			$content = $this->get_content($this->io->cin('id', 'get'));
		}
		else{
			//id is not set.it means page not found.
			$this->msg->show('404');
			return 0;
		}
	
	}
	
	//this function return content in array sorted by rank column
	public function get_content($id){
		
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'content WHERE id=?;', array($id));
		if($this->db->rows_count() == 0){
			//not found
			return null;
		}
		else{
			//going to get fields
			$query = 'SELECT f.
		}
	
	
	}


}
?>