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
		$this->config['STATE'] = TRUE;
		$this->config['NAME'] = 'SWITCH';
		$this->config['ON_LABLE'] = 'ON';
		$this->config['OFF_LABLE'] = 'OFF';
		//ON_COLOR AND OFF_COLOR VALUES
		// -> 'primary', 'info', 'success', 'warning', 'danger', 'default'
		$this->config['ON_COLOR'] = 'success';
		$this->config['OFF_COLOR'] = 'danger';
		$this->config['CENTER_LABLE'] = '=';
		$this->config['FORM'] = 'DEFAULT_FORM_NAME';
		$this->config['DISABLED'] = FALSE;
		$this->config['READ_ONLY'] = FALSE;
		
		//abow configure is for handle events
		$this->config['PHP_CLICK_PLUGIN'] = '';
		$this->config['PHP_CLICK_FUNCTION'] = '';
		$this->config['JS_AFTER_CLICK_FUNCTION'] = '';
		$this->config['JS_AFTER_CLICK_FILE'] = '';
		//SIZE  VALUES
		// -> null, 'mini', 'small', 'normal', 'large'
		$this->config['SIZE'] = 'normal';
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
		return $this->module_draw($this->config);
	}
	
	public function p_click($plugin_name, $function_name){
		$this->config['PHP_CLICK_PLUGIN'] = $plugin_name;
		$this->config['PHP_CLICK_FUNCTION'] = $function_name;
	}
	
	public function j_after_click($function_name, $src){
		$this->config['JS_AFTER_CLICK_FUNCTION'] = $j_after_click;
		$this->config['JS_AFTER_CLICK_FILE'] = $src;
	}
	public function service($service){
		
			
	}
}
?>