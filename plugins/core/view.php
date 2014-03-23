<?php
class core_view{
	private $page;
	private $raintpl;
	
	function __construct(){
		//create an object from raintpl class
		$this->raintpl = new cls_raintpl;
		$this->page = new cls_page;
		
	}
	public function show_core_page($plugins_menu,$content){
		//atteche headers to page
		$this->raintpl->configure("tpl_dir", "plugins/core/tpl/" );
		$this->raintpl->assign( "page_headers", $this->page->load_headers(false));
		$this->raintpl->assign( "plugins_menu", $plugins_menu);
		$this->raintpl->assign( "main_menu", _('Main Menu'));
		$this->raintpl->assign( "content", $content[1]);
		//set_page_tittle
		global $sys_page;
		$sys_page->set_page_tittle($content[0]);
		$this->page->show_block(true,  'title not show' , $this->raintpl->draw( 'panel', true ), 'NONE');
	
	}
	public function core_menu(){
		$this->raintpl->configure("tpl_dir", "plugins/core/tpl/" );
		$this->cache = $this->raintpl->cache('core_menu', 60);
		if($this->cache){
			return $this->cache;
		}
		else{
			$this->raintpl->assign( "url", cls_general::create_url(array('panel','admin','plugin','core','action','default_core_page')));
			$this->raintpl->assign( "core_menu_label", _('Core Settings') );
			return $this->page->show_block(false,  '' , $this->raintpl->draw( 'core_menu', true), 'NONE');
		}	
	}
	public function show_default_page($view){
		$this->raintpl->configure("tpl_dir", "plugins/core/tpl/" );
		$this->cache = $this->raintpl->cache('main_page', 60);
		if($this->cache){
			return array(_('Default Core Page'), $this->cache);
		}
		else{
			$this->raintpl->assign( "url_regional", cls_general::create_url(array('panel','admin','plugin','language','action','default_core_page')));
			$this->raintpl->assign( "RegionalandLanguages", _('Regional and Languages'));
			
			$this->raintpl->assign( "url_appearance", cls_general::create_url(array('panel','admin','plugin','language','action','default_core_page')));
			$this->raintpl->assign( "Appearance", _('Appearance'));
			
			$this->raintpl->assign( "url_plugins", cls_general::create_url(array('panel','admin','plugin','plugin','action','default_core_page')));
			$this->raintpl->assign( "Plugins", _('Plugins'));
			
			$this->raintpl->assign( "url_blocks", cls_general::create_url(array('panel','admin','plugin','block','action','default_core_page')));
			$this->raintpl->assign( "Blocks", _('Blocks'));
			
			$this->raintpl->assign( "url_uap", cls_general::create_url(array('panel','admin','plugin','users','action','default_core_page')));
			$this->raintpl->assign( "UsersandPermations", _('Users and Permations'));
			
			$this->raintpl->assign( "url_basic", cls_general::create_url(array('panel','admin','plugin','core','action','basic_settings')));
			$this->raintpl->assign( "BasicSettings", _('Basic Settings'));
			return array(_('Default Core Page'), $this->page->show_block(false,  'tittle not show' , $this->raintpl->draw( 'main_page', true), 'NONE'));
		}
	}
	//this function show single content on page without any menus and ect and just show $content that send for this
	public function show_single_page($content){
		$this->raintpl->configure("tpl_dir", "plugins/core/tpl/" );
		$this->raintpl->assign( "content", $content[1]);
		$this->raintpl->assign( "page_headers", $this->page->load_headers(false));
		return array($content[0], $this->page->show_block(true,  '' , $this->raintpl->draw( 'core_single_page', true), 'NONE'));

	
	}
}
?>