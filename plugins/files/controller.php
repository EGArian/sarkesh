<?php

/*
 * This plugin is for store files on some places
 * By Babak alizadeh
 */
 
class files extends files_module{
	function __construct(){
		parent::__construct();	
	}
	
	
	/*
	 * INPUT:FILE
	 * This function store file and return file number
	 * OUTPUT:INTEGER
	 */
	 public function upload($file =''){
		 if($file != ''){
			 return $this->module_upload($file);
		 }
		 
		 // false Mean upload file was fail
		 return false;
	 }
	
}

?>
