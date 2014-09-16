<?php
namespace control\
class ctr_radiobuttons_view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/radiobuttons/");
	}
	public function view_draw($e,$config){
		$this->raintpl->assign("e",$e);
		$this->raintpl->assign("size",$config['SIZE']);
		$this->raintpl->assign("inline",$config['INLINE']);
		
		return $this->raintpl->draw("ctr_radiobuttons",true);
	}
}
?>
