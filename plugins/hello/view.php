<?php
class hello_view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/hello/tpl/" );
	}
	protected function view_table(){
		
		$form = new ctr_form('name');
		$table = new ctr_table;
		$row = new ctr_row;
		$text = new ctr_textbox;
		$button = new ctr_button;
		$row->add($text,6);
		$row->add($button,6);
		
		$table->add_row($row->draw());
		echo $table->draw();
		$form->add($table);
		return array('tittle',$form->draw());
		
		
	}
	protected function view_show($result){
		

		$form = new ctr_form('login');
		$username = new ctr_textbox;
		$username->configure('NAME','username');
		$username->configure('ADDON','U');
		$username->configure('LABEL','Username:');
		$username->configure('PLACE_HOLDER','Username');
		
		$password = new ctr_textbox;
		$password->configure('NAME','password');
		$password->configure('ADDON','P');
		$password->configure('STYLE','color:red;');
		$password->configure('LABEL','Passord:');
		$password->configure('PLACE_HOLDER','Password');
		
		
		
		$form->add_array(array($username,$password));
		return array('login',$form->draw());
	}
}
			
		 
