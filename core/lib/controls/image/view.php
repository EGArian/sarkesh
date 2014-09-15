<?php
namespace control\image;
class view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new \template\raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/image/");
	}
	public function view_draw($e){
		$this->raintpl->assign("label",$e['LABEL']);
		$this->raintpl->assign("size",$e['SIZE']);
		$this->raintpl->assign("href",$e['HREF']);
		$this->raintpl->assign("class",$e['CLASS']);
		$this->raintpl->assign("style",$e['STYLE']);
		$this->raintpl->assign("responsive",$e['RESPONSIVE']);
		$this->raintpl->assign("bs_control",$e['BS_CONTROL']);
		$this->raintpl->assign("type",$e['TYPE']);
		$this->raintpl->assign("alt",$e['ALT']);
		$this->raintpl->assign("size",$e['SIZE']);
		$this->raintpl->assign("src",$e['SRC']);
		$this->raintpl->assign("border",$e['BORDER']);

		return $this->raintpl->draw("ctr_image",true);
	}
}
?>
