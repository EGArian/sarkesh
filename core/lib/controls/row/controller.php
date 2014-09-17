<?php
namespace core\control;
use \core\control as control;
class row extends control\row\module{
	private $e;
	public $controls;
	private $config;
	function __construct(){
		parent::__construct();
		$this->e = [];
		$this->controls = [];
		$this->config = [];
		$this->config['STYLE'] = '';
		$this->config['FORM'] = 'DEFAULT';
		$this->config['CLASS'] = '';
		$this->config['CSS_FILE'] = '';
	}
	
	public function draw(){
		foreach($this->controls as $c){
			call_user_func(array($c['object'],"configure"),'FORM',$this->config['FORM']);
			$e['width'] = $c['width'];
			$e['offset'] = $c['offset'];
			$e['body'] = call_user_func(array($c['object'],"draw"));
			array_push($this->e, $e);
		}
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

	public function add($element,$width=1,$offset=0){
		
		$e['width'] = $width;
		$e['object'] = $element;
		$e['offset'] = $offset;
		
		array_push($this->controls, $e);

	}
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range row');
	}
}
