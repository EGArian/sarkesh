<?php
class ctr_checkbox extends ctr_checkbox_module{
	
	#$name use to access this class on the page#
	
	private $config;
		
	function __construct(){
		parent::__construct();
		$this->config['NAME'] = 'ctr_combobox';
		
		//this config show abow of element
		$this->config['LABEL'] = 'checkbox';
		
		//this config show below of element
		$this->config['HELP'] = '';
		
		//this config is for show width of element and most be between 1 and 12
		$this->config['SIZE'] = '6';
		
		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
		//this config is for set value for element
		
		//THIS CONFIG IS FOR SET STATE OF CHECKBOX
		$this->config['CHECKED'] = TRUE;
		

		//this config is for set value for element
		
		$this->config['VALUE'] = '';
		
		$this->config['DISABLE'] = FALSE;
		//this config use for attech javascript(js) file to header of page
		
		$this->config['SCRIPT_SRC'] = '0';
		
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
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists//
		return FALSE;
	}
	public function draw($show = false){
		return $this->module_draw($this->config, $show);
	}
	
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range');
	}
}
?>
