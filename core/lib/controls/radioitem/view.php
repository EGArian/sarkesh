<?php
class ctr_radioitem_view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/radioitem/");
	}
	public function view_draw($config){
		
		if($config['CSS_FILE'] != ''){ cls_page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
		
		$this->raintpl->assign("name",$config['NAME']);
		$this->raintpl->assign("label",$config['LABEL']);
		$this->raintpl->assign("id",$config['NAME']);
		$this->raintpl->assign("style",$config['STYLE']);
		$this->raintpl->assign("class",$config['CLASS']);
		$this->raintpl->assign("disabled",$config['DISABLED']);
		$this->raintpl->assign("form",$config['FORM']);
		$this->raintpl->assign("value",$config['VALUE']);
		$this->raintpl->assign("checked",$config['CHECKED']);
		return $this->raintpl->draw("ctr_radioitem",true);
	}
}
?>
