<?php
/*
	this class is a control for working with switches toggle buttons
	
*/
class ctr_switch extends ctr_switch_module{
	
	//$name use to access this class on the page
	private $config;
		
	function __construct(){
		parent::__construct();
		$this->config['ID'] = 'ID';
		$this->config['NAME'] = 'SWITCH';
		$this->config['ON_LABLE'] = 'ON';
		$this->config['OFF_LABLE'] = 'OFF';		
		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
	}
	
	//this function configure control
	public function configure($key, $value){
		// checking for that key is exists
		if(key_exists($key, $this->config)){
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists
		return FALSE;
	}
	public function draw(){
		$this->module_draw($this->config);
	}
	
	public function service($service){
		
			
	}
}
?>