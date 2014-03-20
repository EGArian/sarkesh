<?php
class admin_view{
	private $page;
	private $raintpl;
	
	function __construct(){
		//create an object from raintpl class
		$this->raintpl = new cls_raintpl;
		$this->page = new cls_page;
		
	}
	public function show_panel($plugins_menu){
		//atteche headers to page
		$this->raintpl->configure("tpl_dir", "plugins/admin/tpl/" );
		$this->raintpl->assign( "page_headers", $this->page->load_headers(false));
		$this->raintpl->assign( "plugins_menu", $plugins_menu);
		$this->page->show_block(true,  'title not show' , $this->raintpl->draw( 'panel', true ), 'NONE');
	
	}
}
?>