<?php
namespace core\plugin\administrator;
use \core\cls\template as template;
use \core\cls\browser as browser;
use \core\cls\core as core;
use \core\control as control;
class view{
	private $raintpl;
	
	function __construct(){
		//create an object from raintpl class//
		$this->raintpl = new template\raintpl;
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','plugins/system/administrator/tpl/');
		
	}
	
	protected function view_load($title,$content,$single_panel=false){

		//Assign variables
		$this->raintpl->assign( "page_headers", browser\page::load_headers(false));
		$this->raintpl->assign( "page_title", $title);
		$this->raintpl->assign( "page_content", $content);
		$this->raintpl->assign( "single_panel", $single_panel);

		
		//draw and return back content
		return $this->raintpl->draw('core_panel', true );
	}
	
	//this function show main part of core plug
	//$menu is plugins special menu
	protected function view_main($menu,$content,$user){
		
		browser\page::add_header('<link href="./plugins/system/administrator/style/core_content.css" rel="stylesheet">');
		//Assign variables
		$this->raintpl->assign( "menu", $menu);	
		$this->raintpl->assign( "content", $content);
		
		$this->raintpl->assign( "user_logout", _('Log Out')	);
		$this->raintpl->assign( "user_logout_url", core\general::create_url(array('plugin','users','action','btn_logout_onclick')	)	);
		
		$this->raintpl->assign( "user_name", $user['username']	);
		
		$this->raintpl->assign( "user_profile", _('Profile')	);
		$this->raintpl->assign( "user_profile_url", core\general::create_url(array('plugin','users','action','profile')	)	);
		
		$this->raintpl->assign( "user_settings", _('Settings')	);
		$this->raintpl->assign( "user_settings_url", core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','settings')	)	);

		$this->raintpl->assign( "sarkesh_admin", _('Sarkesh Administrator')	);
		$this->raintpl->assign( "sarkesh_admin_url", core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','dashboard')	));
		
		//draw and return back menus
		return $this->raintpl->draw('core_content', true );
	
	}
	
	#This function show login page 
	protected function view_login_page($url){
		
	
	}
	
	#This function show themes panel
	protected function view_themes($themes,$themes_info,$active_theme){
		
		$form = new control\form("core_manage_themes");
		$tab = new control\tabbar;
		$table = new control\table;
		
		foreach($themes as $key=>$theme){
			$row = new control\row;
			
			//add id to table for count rows
			$lbl_id = new control\label($key+1);
			$row->add($lbl_id,1,1);
			
			//add theme name
			$lbl_theme_name = new control\label($themes_info[$key]['name']);
			$row->add($lbl_theme_name,2);
			
			//add author of theme
			$lbl_author = new control\label($themes_info[$key]['author']);
			$row->add($lbl_author,2);
			
			
			
			//add active theme button
			if($theme != $active_theme){
				$btn_active = new control\button;
				$btn_active->configure('LABEL',_('Active this'));
				$btn_active->configure('TYPE','success');
				$btn_active->configure('P_ONCLICK_PLUGIN','core');
				$btn_active->configure('P_ONCLICK_FUNCTION','btn_change_theme');
				$row->add($btn_active,1);
			}
			$table->add_row($row);
			
		}
		
		//add headers to table
		$table->configure('HEADERS',array(_('ID'),_('Name'),_('Author'),_('Options')));
		$table->configure('HEADERS_WIDTH',array(1,2,3,4));
		$form->add($table);
		
		$tab->add($form);
		
		return array(_('Appearance'),$tab->draw());
		//Assign variables
		$this->raintpl->assign( "label_themes", _('Themes'));
		$this->raintpl->assign( "label_disable", _('Disable'));
		$this->raintpl->assign( "label_enable", _('Enable'));
		$this->raintpl->assign( "label_install",_('Install new theme'));
		$this->raintpl->assign( "label_name", _('Name'));
		$this->raintpl->assign( "label_screen", _('Splash screen'));
		$this->raintpl->assign( "label_author", _('Author'));
		$this->raintpl->assign( "label_options", _('Options'));
		$this->raintpl->assign( "active_theme", $active_theme);
		$this->raintpl->assign( "themes", $themes_info);
		$this->raintpl->assign( "theme_count", max(array_keys($themes_info)	)	);
		
		//draw and return back content
		//return array(_('Themes'),$this->raintpl->draw('core_appearance', true )	);
	}
	
	//this function return dashboard of administrator area
	protected function view_dashboard(){
		//Assign variables
		$this->raintpl->assign( "BasicSettings", _('Basic Settings'));
		$this->raintpl->assign( "RegionalandLanguages", _('Regional and Languages'));
		$this->raintpl->assign( "Appearance", _('Appearance'));
		$this->raintpl->assign( "Plugins",_('Plugins'));
		$this->raintpl->assign( "Blocks", _('Blocks'));
		$this->raintpl->assign( "Usersandpermissions", _('Users and permissions'));
		$this->raintpl->assign( "url_regional", _('Author'));
		$this->raintpl->assign( "url_appearance", core\general::create_url(array('service','1','plugin','administrator','action','main','p','administrator','a','themes')	));
		$this->raintpl->assign( "url_plugins", _('Author'));
		$this->raintpl->assign( "url_blocks", _('Author'));
		$this->raintpl->assign( "url_uap", _('Author'));
		$this->raintpl->assign( "url_basic", _('Author'));
		
		//draw and return back content
		return array(_('Dashboard'),$this->raintpl->draw('core_dashboard', true )	);
	}
}
?>
