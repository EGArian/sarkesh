<?php
class ctr_hidden extends ctr_hidden_module{
	
	private $config;
	function __construct($name=""){
		
		$this->config['NAME'] = $name;
		$this->config['VALUE'] = '';
		$this->config['FORM'] = '';
		parent::__construct();
	}
	public function draw(){
		return $this->module_draw($this->config);
	}
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range form');
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
}
?>
