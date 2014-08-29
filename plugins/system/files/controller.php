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
     * if save file will be with an error so this function return false
     * this function save files that's come with ctr_uploader controll
	 * OUTPUT:INTEGER
	 */
	 public function do_upload(){
	   
           //check for that upload has an error
           if ($_FILES["uploads"]["error"] > 0) {
              
              //file has an error
              return false;
              
           } else {
              
              //going to save file
              return $this->module_do_upload();
           }
	   	   

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
      
      
      /*
	  * This function just run with service and return back modal msg that file not uploades successfully
	  * OUTPUT:STRING: MODAL BLOCK
	  */
	  public function upload_error(){
		  
		  return cls_page::show_block(_('System message !'),_('Upload file is not successful! refresh page and try again.'), 'MODAL','type-warning');
	  }
      
	
}

?>
