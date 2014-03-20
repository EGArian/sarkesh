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
	public function show_page_content($view){
		
		if(isset($_GET['id'])){
			//get content id
			$content = $this->get_content($this->io->cin('id', 'get'));
			$this->view->show_page_content($content, $view);
		}
		else{
			//id is not set.it means page not found.
			$this->msg->show('404');
			return 0;
		}
	
	}
	
	//this function return content in array sorted by rank column
	//if content not found this function return null value and else
	//return an array in index 0 exist content cloumn and in index 1 we put fields joined with fields_patern columns
	public function get_content($id){
		$local = $this->obj_localize->get_localize();
		
		$this->db->do_query('SELECT * FROM ' . TablePrefix . 'content WHERE id=?;', array($id));
		if($this->db->rows_count() == 0){
			//not found
			return null;
		}
		else{	
			$result[] = $this->db->get_array();
			//going to get fields
			$query = "SELECT fp.type as 'type', fp.rank as 'rank', fp.entry_id as 'entry_id', f.ref_id as 'ref_id', f.value as 'value' FROM " . TablePrefix ;
			$query .= "fields f INNER JOIN fields_patern fp ON fp.id = f.patern_id where ref_id = ? ORDER BY rank;";
			$this->db->do_query($query, array($id));
			$result[] = $this->db->get_array();
			return $result;
		}
	
	
	}


}
?>