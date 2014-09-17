<?php
namespace core\control;
use \core\control as control;
class form extends control\form\module{
	private $e;
	private $config;
	function __construct($form_name="form"){
		parent::__construct();
		$this->e = [];
		$this->config = [];
		$this->config['NAME'] = $form_name;
		$this->config['SIZE'] = 12;
		$this->config['LABEL'] = 'Form Label';
		$this->config['INLINE'] = FALSE;
		$this->config['PANEL'] = FALSE;
		$this->config['TYPE'] = 'default';
		
	}
	
	public function draw(){
		
		return $this->module_draw($this->e,$this->config);
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
	public function add_array($element){
		foreach($element as $control){
			$this->add($control);
		}
	}
	public function add($element){
		
		//change form name of element
		call_user_func(array($element,"configure"),'FORM',$this->config['NAME']);
		//set form name on all child of element
		if(method_exists($element,'childs')){
			call_user_func(array($element,"childs"),'FORM',$this->config['NAME']);
		}
		$e['body'] = $element->draw();
		array_push($this->e, $e);

	}
	public function add_spc(){
		$e['body'] = '<hr />';
		array_push($this->e, $e);
	}
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range form');
	}
}
