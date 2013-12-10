<?php
#this class show website and replace blocks

class cls_page{
	
	public $settings;

	function __construct(){
		$general = new cls_general;
		$this->settings = $general->settings;
	}
	
	#if active language is RTL this function return true else return false
	
	public function is_rtl(){
		include_once("./languages/" . $this->settings['language'] . "/info.php");
		
		if($language['direction']=='RTL') {
			return true;}
		else {
			return false;}	
	}

	public function load_headers () {
	#LOAD HEEFAL GENERATOR META TAG
	$header_tags = '<meta name="generator" content=" Sarkesh Web Freamwork! - Open Source Content Management" />' ."\n";

	#load style sheet pages (css)

	$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/style.css" />' . "\n";
	
	#load rtl stylesheets

	if ($this->is_rtl()){ 
		$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/rtl-style.css" />' . "\n";
	}
	
	#load favicon

	if(file_exists("./themes/"  . $this->settings['theme'] . "/favicon.ico")){ 
		$header_tags .= '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/favicon.ico" />' . "\n";}
	
	#send header on buffer
	return $header_tags;
	}
}