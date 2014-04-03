<?php
//this plugins say hello to world
class files_controller extends files_module{

	function __construct(){
		parent::__construct();
	}
	//this function for show content in page
	//if you want to work with cls_page->show_block you should send $view to that.
	public function action($action_name, $view){
	      
	$this->module_save_temp_file(array(), array());
	  
	}
	//this function is for control ajax requests
	//if use ?service=1&plugin=plugin_name&action=action site run on single block
	//this means just your your process in this function run
	//for demo see http://yoursite.com/?service=1&plugin=hello&action=say
	
	public function service($service_name){
		
		
	}
	
	/* this function use for save temp file in active places
	 * for use this method you most send $_FILES['FILE_NAME'] to $file variable
	 * output of this method is file id for access to that
	 * if return value = null that's means save file process has some errors.
	*/
	public function save_temp_file($this_file, $upload_settings){
	
		if(isset($this_file) ){
			//file is uploaded successful, going to save that
			return $this->module_save_temp_file($this_file, $upload_settings);
		}
		else{
			//file is not successful uploaded
			return null;
		}
	}
	

}

?>