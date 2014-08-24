<?php
class core_view{
	private $raintpl;
	
	function __construct(){
		//create an object from raintpl class//
		$this->raintpl = new cls_raintpl;
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','plugins/core/tpl/');
		
	}
	
	protected function view_load($content){

		//Assign variables
		$this->raintpl->assign( "page_headers", cls_page::load_headers(false));
		$this->raintpl->assign( "page_title", $content[0]);
		$this->raintpl->assign( "page_content", $content[1]);
		
		//draw and return back content
		return $this->raintpl->draw('core_panel', true );
	}
	
	//this function show main part of core plug
	//$menu is plugins special menu
	protected function view_main($menu,$content){
		
		cls_page::add_header('<link href="./plugins/core/style/core_content.css" rel="stylesheet">');
		//Assign variables
		$this->raintpl->assign( "menu", $menu);	
		$this->raintpl->assign( "content", $content);
		
		$this->raintpl->assign( "user_logout", _('Log Out')	);
		$this->raintpl->assign( "user_logout_url", '#'	);
		
		$this->raintpl->assign( "user_name", _('babak alizadeh')	);
		
		$this->raintpl->assign( "user_profile", _('Profile')	);
		$this->raintpl->assign( "user_profile_url", '#'	);
		
		$this->raintpl->assign( "user_settings", _('Settings')	);
		$this->raintpl->assign( "user_settings_url", '#'	);

		$this->raintpl->assign( "sarkesh_admin", _('Sarkesh Administrator')	);
		$this->raintpl->assign( "sarkesh_admin_url", '#');		
		//draw and return back menus
		return $this->raintpl->draw('core_content', true );
	
	}
}
?>
