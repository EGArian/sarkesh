<?php
class ctr_table extends ctr_table_module{
	
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
		$this->config['BS_CONTROL'] = true;
		$this->config['BORDER'] = TRUE;
		$this->config['HOVER'] = TRUE;
		$this->config['STRIPED'] = TRUE;
		$this->config['CSS_FILE'] = '';
		$this->config['CLASS'] = '';
		
	}
	//this function designed for add rows
	public function add_row($row){
		$this->config['TYPE'] = 'NORMAL';
		array_push($this->config['ROWS'],$row->draw());
		
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
