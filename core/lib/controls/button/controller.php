<?php
/*
	this class is a control for working with buttones toggle buttons
	
*/
class ctr_button extends ctr_button_module{
	
	//$name use to access this class on the page
	private $config;
		
	function __construct(){
		parent::__construct();
		$this->config['NAME'] = 'ctr_button';
		$this->config['LABLE'] = 'ON';
		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
		$this->config['TYPE'] = 'default';
		$this->config['DISABLE'] = FALSE;
		//This config for use add css classes to control
		$this->config['CLASS'] = '';
		//this configs set php plugin and function that should run with onclick event
		$this->config['P_ONCLICK_PLUGIN'] = '0';
		$this->config['P_ONCLICK_FUNCTION'] = '0';
		//This configs set javascript function and src for run with onclick event
		$this->config['J_ONCLICK_SRC'] = '0';
		$this->config['J_ONCLICK_FUNCTION'] = '0';
		//This configs set javascript function and src that should run after php click
		//it's can get all data from returned from php onclick event(return means data that's showing on page)
		$this->config['J_AFTERCLICK_SRC'] = '0';
		$this->config['J_AFTERCLICK_FUNCTION'] = '0';
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
		if($service == 'p_click'){
			$this->module->p_click();
		}
			
	}
}
?>