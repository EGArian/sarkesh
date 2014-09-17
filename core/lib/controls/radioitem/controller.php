<?php
namespace core\control;
use \core\control as control;

class radioitem extends control\radioitem\module{

	private $config;
	function __construct(){
		parent::__construct();
		$this->config = [];
		$this->config['NAME'] = 'radiobutton';
		$this->config['ID'] = 'radiobutton';
		$this->config['FORM'] = 'R_FORM';
		$this->config['STYLE'] = '';
		$this->config['CLASS'] = '';
		$this->config['CSS_FILE'] = '';
		$this->config['VALUE'] = 'radiobutton';
		$this->config['SIZE'] = 12;
		$this->config['LABEL'] = 'Form Label';
		$this->config['CHECKED'] = FALSE;
		$this->config['DISABLED'] = FALSE;
		$this->config['LABEL'] = 'radiobutton';
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
