<?php
class ctr_table extends ctr_table_module{
	
	private $config;
	
	function __construct(){
		parent::__construct();
		
		$this->config = [];
		$this->config['NAME'] = 'TABLE';
		$this->config['ROWS'] = [];
		$this->config['HEADERS'] = [];
		$this->config['SIZE'] = 6;
		$this->config['BS_CONTROL'] = true;
		$this->config['BORDER'] = TRUE;
		$this->config['HOVER'] = TRUE;
		$this->config['STRIPED'] = TRUE;
		$this->config['CSS_FILE'] = '';
		$this->config['CLASS'] = '';
		
	}
	//this function designed for add rows
	public function add_row($row){
		array_push($this->config['ROWS'],$row);
		
	}
	public function add_source($source){
		
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
