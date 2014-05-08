<?php
class ctr_form extends ctr_form_module{
	private $config;
	function __construct(){
		parent::construct();
		$config['TYPE']=''
	}
	
	public function get($key){
		if(key_exists($key, $this->config)){
			return $this->config[$key];
		}
		die('Index is out of range');
	}
}
?>
}
?>
