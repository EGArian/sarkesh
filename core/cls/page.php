<?php
#this class show website and replace blocks

class cls_page{
	//settings will be saved in this varible
	private $localize_settings;
	private $page_tittle;
	private $blocks;
	private $db;
	function __construct(){
		$obj_localize = new cls_localize;
		$this->localize_settings = $obj_localize->get_localize();
		$this->page_tittle = $this->localize_settings['name'];
		//load all blocks data from database
		$this->db = new cls_database;
		$this->db->do_query('SELECT * FROM ' . TablePrefix . ' blocks;');
		$this->blocks = $this->db->get_array();

	}
	
	#if active language is RTL this function return true else return false
	
	public function is_rtl(){
		include_once("./languages/" . $this->localize_settings['language'] . "/info.php");
		
		if($language['direction']=='RTL') {
			return true;}
		else {
			return false;}
	}

	public function load_headers () {
		#LOAD HEEFAL GENERATOR META TAG
		
		$header_tags = '<meta name="generator" content=" Sarkesh Web Freamwork! - Open Source Content Management" />' ."\n";

		#load style sheet pages (css)

		$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->localize_settings['theme'] . '/style.css" />' . "\n";
	
		#load rtl stylesheets

		if ($this->is_rtl()){ 
			$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->localize_settings['theme'] . '/rtl-style.css" />' . "\n";
		}
	
		#load favicon

		if(file_exists("./themes/"  . $this->localize_settings['theme'] . "/favicon.ico")){ 
		
			$header_tags .= '<link rel="shortcut icon" href="./themes/'.$this->localize_settings['theme'] .'/favicon.ico" type="image/x-icon">';
			$header_tags .= '<link rel="icon" href="./themes/'.$this->localize_settings['theme'] .'/favicon.ico" type="image/x-icon">';
		}
		#show header tags
		echo $header_tags;
	}
	//this function add recived string to page tittle
	public function set_page_tittle($tittle = ''){
		//get site name in localize selected
		$this->page_tittle = $this->localize_settings['name'] . ' | ' . $tittle;
		return $this->page_tittle;
		//now we wand to send tittle to render.
	}
	//this fuction return page tittle usually for runder.php
	public function get_page_tittle(){
	
		return $this->page_tittle;
	}
	//this function set and show blocks
	public function set_position($position){
		//search blocks for position matched
		foreach( $this->blocks as $block){
			if($block['position'] == $position){
			//start shownig block
			echo $block['text'];
			}
		
		}
	}
}
// create object for use in theme file
$sys_page = new cls_page;
?>
