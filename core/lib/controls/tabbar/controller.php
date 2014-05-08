<?php
class ctr_tabbar extends ctr_tabbar_module{
	private $tabs;
	private $config;
	public $active_tab;
	function __construct(){
		parent::__construct();
		$this->tabs = [];
		$this->config = [];
		$this->config['NAME'] = "TABBAR_";
		$this->config['ACTIVE_TAB'] = "0";
		$this->config['ACTIVE_INDEX'] = "0";
		$this->active_tab=false;
	}
	
	public function draw(){
		return $this->module_draw($this->tabs,$this->config);
	}
	
	public function add($form){
		if($this->active_tab == false){
			$e['active'] = true;
			$this->active_tab =true;
		}
		else{
			$e['active'] = false;
		}
		
		$e['id'] = $form->get('NAME');
		$e['label'] = $form->get('LABEL');
		$e['body'] = $form->draw();
		array_push($this->tabs, $e);
	}
}
