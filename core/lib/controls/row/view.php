<?php
namespace control\row;

class view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new \template\raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/row/");
	}
	public function view_draw($e,$config){
		if($config['CSS_FILE'] != ''){	cls_page::add_header(''); }
		$this->raintpl->assign("e",$e);
		$this->raintpl->assign("style",$config['STYLE']);
		$this->raintpl->assign("class",$config['CLASS']);
		return $this->raintpl->draw("ctr_row",true);
	}
}
?>
