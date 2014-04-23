<?php
/*
	this class is a control for working with buttones toggle buttons
	
*/
class ctr_button extends ctr_button_module{
	
	#$name use to access this class on the page#
	private $config;
		
	function __construct(){
		parent::__construct();
		$this->config['NAME'] = 'ctr_button';
		
		$this->config['LABLE'] = 'Button';
		//This variable set form name of this element
		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
		//this config is for set value for element
		$this->config['VALUE'] = 'DEFAULT_VALUE';
		$this->config['TYPE'] = 'btn btn-default';
		$this->config['DISABLE'] = FALSE;
		//This config for use add css classes to control//
		$this->config['CLASS'] = '';
		//THIS config set css file for paste to headet of page
		$this->config['CSS_FILE'] = '';
		//this config add inline css style to html element
		$this->config['STYLE'] = '';
		//this configs set php plugin and function that should run with onclick event//
		$this->config['P_ONCLICK_PLUGIN'] = '0';
		$this->config['P_ONCLICK_FUNCTION'] = '0';
		//This configs set javascript function and src for run with onclick event//
		$this->config['J_ONCLICK_SRC'] = '0';
		$this->config['J_ONCLICK_FUNCTION'] = '0';
		//This configs set javascript function and src that should run after php click//
		//it's can get all data from returned from php onclick event(return means data that's showing on page)//
		$this->config['J_AFTERCLICK_SRC'] = '0';
		$this->config['J_AFTERCLICK_FUNCTION'] = '0';
	}
	
	//this function configure control//
	public function configure($key, $value){
		// checking for that key is exists//
		if(key_exists($key, $this->config)){
			//check for type 
			if($key == 'TYPE'){
				if($value == 'none'){
					# do not use bootstrap class
					$this->config[$key] = '';
				}	
				else{
					$this->config[$key] = 'btn btn-' . $value;
				}
					return TRUE;

			}
					
			
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists//
		return FALSE;
	}
	public function draw(){
		$this->module_draw($this->config);
	}
	
	public function service($service,$elements){
		if($service == 'p_click'){
			$this->module_p_click($elements);
		}
			
	}
}
?>