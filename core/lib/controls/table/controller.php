<?php
namespace control;

class table extends control\table\module{
	
	private $config;
	
	function __construct(){
		parent::__construct();
		
		$this->config = [];
		$this->config['NAME'] = 'TABLE';
		// valid : NORMAL | SOURCE
		$this->config['TYPE'] = 'NORMAL';
		$this->config['ROWS'] = [];
		$this->config['HEADERS'] = [];
		$this->config['SIZE'] = 12;
		$this->config['BS_CONTROL'] = false;
		$this->config['BORDER'] = FALSE;
		$this->config['HOVER'] = FALSE;
		$this->config['STRIPED'] = FALSE;
		$this->config['CSS_FILE'] = '';
		$this->config['CLASS'] = '';
		$this->config['HEADERS_WIDTH'] = (array) null;
		
	}
	//this function designed for add rows
	public function add_row($row){
		$this->config['TYPE'] = 'NORMAL';
		$items = (array) null;
		foreach($row->controls as $control){
			array_push($items,$control['object']->draw());
		}
		array_push($this->config['ROWS'],$items);
		
	}
	public function add_source($source){
		$this->config['TYPE'] = 'SOURCE';
		$this->config['ROWS'] = array_merge($this->config['ROWS'],$source);
		
	}
	public function draw(){
		return $this->module_draw($this->config);
	}
	public function configure($key,$value){
		if(key_exists($key, $this->config)){			
			$this->config[$key] = $value;
			return TRUE;
		}
		//key not exists//
		return FALSE;
	}
}

?>
