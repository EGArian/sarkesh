<?php
class ctr_uploader extends ctr_uploader_module{
	private $config;
	
	function __construct(){
		parent::__construct();
		
		//this config save name of control
		$this->config['NAME'] = 'uploader';
		
		//for add class for change style of control use this config
		$this->config['CLASS'] = '';
		
		//Set css files to header of page with this config
		$this->config['CSS_FILE'] = '';
		
		
		//this config save form name that controll added
		$this->config['FORM'] = 'Form';
		
		//label is a text that show at the abow of element
		$this->config['LABEL'] = 'File uploader';
		
		//help is a text that show on control for take some note to user
		$this->config['HELP'] = '';
		
		//this config set width of controll that most be between 1 and 12 
		//default value is 12 (full width)
		$this->config['SIZE'] = 12;
		
		//this config set max size of file that can be uploaded 
		//unit of this number is kilo byte
		$this->config['MAX_FILE_SIZE'] = '40'; //KByte
		
		//for set number of files that user can upload ,use this config . default value is 1 and can be between 1 and 15
		// 0  is not valid number for this config
		$this->config['MAX_FILE_NUMBER'] = '1';
		
		//for set type of files that user can upload set this config
		//file types should be seperate with (,) 
		$this->config['FILE_TYPES'] = 'png,jpeg,jpg,gif';
		
		//if user want to upload picture. it's better for show preview of picture to user.
		//this config is boolean and default of that is false (not enabled by default)
		$this->config['PREVIEW'] = false;
		
		//Use this config for add javascript files to header of page
		$this->config['SCRIPT_SRC'] = '';
		
		
	}
	
	//this function configure control//
	
	public function configure($key, $value){
		// checking for that key is exists//
		if(key_exists($key, $this->config)){
			//check for type		
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists//
		
		return FALSE;
	}
	
	//this function return back control that compiled
	public function draw(){
		return $this->module_draw($this->config);
	}
	
	
	//use this function for get value of configures of this control
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range');
	}
	
}
?>
