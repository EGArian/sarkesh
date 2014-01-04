<?php
class languages_view{

	private $obj_page;
	private $raintpl;
	function __construct(){
		//config raintpl
		cls_raintpl::configure("tpl_dir", "plugins/languages/tpl/" );
		$this->raintpl = new cls_raintpl;
		$this->obj_page = new cls_page;
	}
	
	public function languages_show($languages, $view){
		if( $cache = $this->raintpl->cache('languages_show', 60) ){
			$this->obj_page->show_block( _('User Sign in') , $cache, $view);
		}
		else{
		$this->raintpl->assign( "languages_list", $languages );
		$this->obj_page->show_block( _('Languages') , $this->raintpl->draw( 'languages_show', true ), $view);
		}
	}
	
	public function show_in_box($header, $content, $show_close = true){
		$this->obj_page->show_in_box($header, $content, $show_close);
	}
}
?>