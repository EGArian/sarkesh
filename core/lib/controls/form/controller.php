<?php
class ctr_form extends ctr_form_module{
	private $e;
	private $config;
	function __construct($form_name="form"){
		parent::__construct();
		$this->e = [];
		$this->config = [];
		$this->config['NAME'] = $form_name;
		$this->config['LABEL'] = 'Form Label';
	}
	
	public function draw(){
		
		return $this->module_draw($this->e);
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
	public function add($element){
		//change form name of element
		call_user_func(array($element,"configure"),'FORM',$this->config['NAME']);
		$e['object'] = $element;
		$e['body'] = $element->draw();
		array_push($this->e, $e);
	}
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range form');
	}
}
