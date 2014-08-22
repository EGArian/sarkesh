<?php
class core_view{
	private $raintpl;
	
	function __construct(){
		//create an object from raintpl class//
		$this->raintpl = new cls_raintpl;
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','plugins/core/tpl/');
		
	}
	
	public function view_load($content){

		//Assign variables
		$this->raintpl->assign( "page_headers", cls_page::load_headers(false));
		$this->raintpl->assign( "page_title", $content[0]);
		$this->raintpl->assign( "page_content", $content[1]);
		
		//draw and return back content
		return $this->raintpl->draw('panel', true );
	}
}
?>
