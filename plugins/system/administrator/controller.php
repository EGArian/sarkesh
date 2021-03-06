<?php
namespace core\plugin;
use \core\plugin\administrator as administrator;
use \core\cls\core as core;
class administrator extends administrator\module{

	private $msg;
	private $users;
	function __construct(){
		parent::__construct();
		$this->msg = new msg;
		$this->users = new users;
	}
	//this service load basic of html page of admin panel.
	//it's service and just return html elements of basic page
	//$content is an array [title of page,content of page]
	private function load($content){
			return $this->module_load($content);
	}
	
	
	///this function show administrator panel
	//it's service
	public function main(){
		//first check for permission
		if($this->users->is_logedin() && $this->users->has_permission('core_admin_panel')	){
			
			//check for that user come from login process
			if($_GET['p'] == 'users' && $_GET['a'] == 'login'){
				//user come from login process and now should jump to default administrator page
				core\router::jump_page(core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','dashboard')	)	);
			}
			else{
				//going to show content
				return $this->module_main();
			}
		}
		elseif(!$this->users->is_logedin()){
			//user do not has any permission to access  to administrator area
			if($_GET['p'] == 'users' && $_GET['a'] == 'login'){
				//show login page
				return $this->module_login_page();
			}
			else{
				//jump to login page
				core\router::jump_page(core\general::create_url(array('service','1','plugin','administrator','action','main','p','users','a','login')	)	);
			}
			
		}
		//show no permission message
		elseif($this->users->has_permission('core_admin_panel') != true){
			return $this->module_no_permission();
		}
		
		
	}
	
	//this function return url of core menus to admin area
	public static function core_menu(){
		$menus = [[core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','dashboard')	),_('Dashboard')],[\core\cls\core\general::create_url(array('service','1','plugin','core','action','main','p','core','a','settings')	),_('General Settings')],[\core\cls\core\general::create_url(array('service','1','plugin','core','action','main','p','core','a','themes')	), _('Appearance')],[\core\cls\core\general::create_url(array('service','1','plugin','core','action','main','p','core','a','plugins')	),_('Plugins')],[\core\cls\core\general::create_url(array('service','1','plugin','core','action','main','p','core','a','settings')	),_('Localize')]];
		
		return $menus;
	}
	
	//This function show themes panel for manage and select
	public function themes(){
		
		return $this->module_themes();
	}
	
	#This function return back dashboard of administrator area
	public function dashboard(){
		
		return $this->module_dashboard();
	}
	
	//with this function change selected theme
	public function btn_change_theme($e){
	
		
	}
	
	
}
	
	
