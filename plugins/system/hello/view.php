<?php
namespace core\plugin\hello;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new template\raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/hello/tpl/" );
	}
	protected function view_table(){
		
		$form = new control\form('name');
		$table = new control\table;
		$row = new control\row;
		$text = new control\textbox;
		$button = new control\button;
		$row->add($text,6);
		$row->add($button,6);
		$db = new cls_database;
		$db->do_query('select * from users');
		
		$table->add_source($db->get_array());
		$form->add($table);
		return array('tittle',$form->draw());
		
		
	}
	protected function view_show($result){
		

		$form = new control\form('login');
		$username = new control\textbox;
		$username->configure('NAME','username');
		$username->configure('ADDON','U');
		$username->configure('LABEL','Username:');
		$username->configure('PLACE_HOLDER','Username');
		
		$password = new control\textbox;
		$password->configure('NAME','password');
		$password->configure('ADDON','P');
		$password->configure('STYLE','color:red;');
		$password->configure('LABEL','Passord:');
		$password->configure('PLACE_HOLDER','Password');
		
		
		
		$form->add_array(array($username,$password));
		return array('login',$form->draw());
	}
}
			
		 
