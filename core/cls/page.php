<?php
#this class show website and replace blocks

class cls_page{
	
	public $localize_settings;
	public $page;

	function __construct(){
		$obj_localize = new cls_localize;
		$this->localize_settings = $obj_localize->get_localize();

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

	if(file_exists("./themes/"  . $this->localize__settings['theme'] . "/favicon.ico")){ 
		$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->localize_settings['theme'] . '/favicon.ico" />' . "\n";}
	
	#send header on buffer
	return $header_tags;
	}
}
$sys_page = new cls_page;
?>
