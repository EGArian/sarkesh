<?php
class ctr_textarea extends ctr_textarea_module{
	private $config;
	
	function __construct(){
		parent::__construct();
		$this->config = [];
		$this->config['NAME'] = 'TEXTAREA';
		$this->config['EDITOR'] = true;
		$this->config['ROWS'] = '10';
		$this->config['COLS'] = '60';
		$this->config['STYLE'] = '';
		$this->config['FORM'] = 'default_form';
		$this->config['CLASS'] = '';
		$this->config['CSS_FILE'] = '';
		$this->config['VALUE'] = '';
	}
	
	public function draw(){
		return $this->module_draw($this->config);
	}
	
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
		die('Index is out of range');
	}
}
?>
