<?php
#this class show website and replace blocks

class cls_theme{
	
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

	echo '<meta name="SARKESH" content="Bluefish 2.2.4" />' . "\n";
	#load style sheet pages (css)

	echo '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/style.css" />' . "\n";
	
	#load rtl stylesheets

	if ($this->is_rtl()){ 
		echo '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/rtl-style.css" />' . "\n";
	}
	
	#load favicon

	if(file_exists("./themes/"  . $this->settings['theme'] . "/favicon.ico")){ 
		echo '<link rel="stylesheet" type="text/css" href="./themes/'  . $this->settings['theme'] . '/favicon.ico" />' . "\n";}
	
	
	}
}