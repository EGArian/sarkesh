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
	 
	 /*
	  * This function just run with service and return back modal msg that file type is invalid
	  * OUTPUT:STRING: MODAL BLOCK
	  */
	  public function invalid_type(){
		  
		  return cls_page::show_block(_('System message !'),_('Type of selected file is invalid.please select another.'), 'MODAL','type-warning');
	  }
	  
	  /*
	  * This function just run with service and return back modal msg that file size is invalid
	  * OUTPUT:STRING: MODAL BLOCK
	  */
	  public function invalid_size(){
		  
		  return cls_page::show_block(_('System message !'),_('Size of selected file is too big. select another.'), 'MODAL','type-warning');
	  }
	
}

?>
