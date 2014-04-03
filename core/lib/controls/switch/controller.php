<?php
/*
	this class is a control for working with upload files
	
*/
class ctr_uploader extends ctr_uploader_module{
	
	//$name use to access this class on the page
	private $uploader;
		
	function __construct(){
		parent::__construct();
		
		$this->uploader['NAME'] = 'uploader';
		$this->uploader['LABLE'] = 'label';
		$this->uploader['DES'] = '';
		$this->uploader['TYPE'] = 'single';
		$this->uploader['FILE_TYPES'] = 'jpeg,png,gif';
		
		$this->uploader['FORM'] = 'DEFAULT_FORM_NAME';
		//File size is working with Byte
		//This size can not be more than size of defined MAX_FILE_SIZE in php.ini
		$this->uploader['MAX_FILE_SIZE']=1024;
	}
	
	//this function configure control
	public function configure($key, $value){
		// checking for that key is exists
		if(key_exists($key, $this->uploader)){
			$this->uploader[$key] = $value;
			return TRUE;
		}
		//key not exists
		return FALSE;
	}
	public function draw(){
		$this->draw_module($this->uploader);
	}
	
	public function service($service){
		//this service show message in modal
		if($service == 'invalid_file'){
			$this->invalid_file_msg();
		}
		//this service calculate unit of file size like megabyte kilobyte or ...
		elseif ($service == 'get_unit') {
			$io = new cls_io;
			$value = $io->cin('value','get');
			$this->get_unit($value,true);

		}
		elseif ($service == 'upload') {
			if(isset($_REQUEST['id'])){
				//id is set going to check file
				if(isset($_FILES[$_REQUEST['id'] . '_uploader'])){
					//file exist 
					//check size and type of file
					// WARNING : 1=1 is for checking for match file types and sizes that's not developed yet
					if(1==1){
						//create upload settings array
						$upload_settings = array('des' => 'file uploaded successful');
						$files = new files_controller;
						$result = $files->save_temp_file($_FILES[$_REQUEST['id'] . '_uploader'],$upload_settings);
						//print_r($_FILES[$_REQUEST['id'] . '_uploader']);
						echo $result;

						
						
					}
				}
			}				
		}
		
			
	}

	
	



}
?>