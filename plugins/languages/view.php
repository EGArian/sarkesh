<?php
class languages_view{

	private $raintpl;
	function __construct(){
		//config raintpl
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/languages/tpl/" );
	}
	
	public function languages_show($languages, $view){
		if( $cache = $this->raintpl->cache('languages_show', 60) ){
			return array(_('Languages'),cls_page::show_block(false,  _('Languages') , $cache, $view));
		}
		else{
			$this->raintpl->assign( "languages_list", $languages );
			return array(_('Languages'), cls_page::show_block(false,  _('Languages') , $this->raintpl->draw( 'languages_show', true ), $view));
		}
	}
	
	public function show_in_box($header, $content, $show_close = true){
		$this->obj_page->show_in_box($header, $content, $show_close);
	}
}
?>
