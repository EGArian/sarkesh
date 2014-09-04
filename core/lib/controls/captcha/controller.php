<?php
class ctr_image extends ctr_image_module{
	
	private $config;
	function __construct(){
		parent::__construct();
		$this->config = [];
		$this->config['LABEL'] = '';
		$this->config['ALT'] = '';
		$this->config['SRC'] = '';
		$this->config['HREF'] = '';
		//valid types is => img-thumbnail , img-circle , img-rounded
		$this->config['TYPE'] = 'img-thumbnail';
		$this->config['BS_CONTROL'] = TRUE;
		$this->config['RESPONSIVE'] = FALSE;
		$this->config['STYLE'] = '';
		$this->config['CLASS'] = '';
		$this->config['SIZE'] =12;
		$this->config['BORDER'] = false;
		
	}
	
	public function draw(){
		
		return $this->module_draw($this->config);
	}
	
	//this function configure control//
	public function configure($key, $value){
		// checking for that key is exists//
		if(key_exists($key, $this->config)){		
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists//
		return FALSE;
	}

	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range form');
	}
}
