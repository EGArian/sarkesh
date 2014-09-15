<?php
namespace control;
/*
	this class is a control for working with buttons toggle buttons
	
*/
class button extends \control\button\module{
	
	#$name use to access this class on the page#
	
	private $config;
		
	function __construct($name = ''){
		parent::__construct();
		
		//set name of control
		if($name != ''){
			$this->config['NAME'] = $name;
		}
		else{
			$this->config['NAME'] = 'ctr_button';
		}
		
		$this->config['LABEL'] = 'Button';
		//This variable set form name of this element

		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
		//this config is for set value for element
		
		$this->config['VALUE'] = 'DEFAULT_VALUE';
		//this config if == false system donot use bootstrap
		
		$this->config['BS_CONTROL'] = true;
		
		//This config is for set jump page
		$this->config['HREF'] = '';
		
		//valid types : default,primary,success,info,warning,danger,link
		$this->config['TYPE'] = 'default';
		
		$this->config['DISABLE'] = FALSE;
		
		//this config is for set size of element
		//Valid : lg sm xs
		$this->config['SIZE'] = 'sm';
		
		//this config use for attech javascript(js) file to header of page
		$this->config['SCRIPT_SRC'] = '';
		
		//This config for use add css classes to control//
		$this->config['CLASS'] = '';
		
		//THIS config set css file for paste to headet of page
		$this->config['CSS_FILE'] = '';
		
		//this config add inline css style to html element
		$this->config['STYLE'] = '';
		
		//------------------------------------------------------
		//this configs set php plugin and function that should run with onclick event//
		
		$this->config['P_ONCLICK_PLUGIN'] = '0';
		$this->config['P_ONCLICK_FUNCTION'] = '0';
		//This configs set javascript function and src for run with onclick event//
		
		$this->config['J_ONCLICK'] = '0';
		//it's can get all data from returned from php Argoman $arg['RV']['value']
		$this->config['J_AFTER_ONCLICK'] = '0';
		
		//-------------------------------------------------------
		//this configs set php plugin and function that should run with onfocus event//
		
		$this->config['P_ONFOCUS_PLUGIN'] = '0';
		$this->config['P_ONFOCUS_FUNCTION'] = '0';		
		$this->config['J_ONFOCUS'] = '0';
		//it's can get all data from returned from php Argoman $arg['RV']['value']
		$this->config['J_AFTER_ONFOCUS'] = '0';

		//------------------------------------------------------
		//this configs set php plugin and function that should run with onblur event//
		$this->config['P_ONBLUR_PLUGIN'] = '0';
		$this->config['P_ONBLUR_FUNCTION'] = '0';
		//This configs set javascript function and src for run with onblur event//
		$this->config['J_ONBLUR'] = '0';
		//it's can get all data from returned from php Argoman $arg['RV']['value']
		$this->config['J_AFTER_ONBLUR'] = '0';
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
	public function draw(){
		return $this->module_draw($this->config);
	}

	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range');
	}
}
?>
