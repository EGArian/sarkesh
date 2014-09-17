<?php
namespace core\control\textarea;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{
	
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new template\raintpl;
		$this->raintpl->configure("tpl_dir","./core/lib/controls/textarea/");
	}
	protected function view_draw($config){
		
		if($config['EDITOR']){
				browser\page::add_header('<script src="./core/lib/controls/textarea/editors/nicedit/nicEdit.js" type="text/javascript"></script>');
}
		if($config['CSS_FILE'] != ''){ browser\page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}

		
		$this->raintpl->assign("name",$config['NAME']);
		$this->raintpl->assign("label",$config['LABEL']);
		$this->raintpl->assign("help",$config['HELP']);
		$this->raintpl->assign("id",$config['NAME']);
		$this->raintpl->assign("rows",$config['ROWS']);
		$this->raintpl->assign("size",$config['SIZE']);
		$this->raintpl->assign("style",$config['STYLE']);
		$this->raintpl->assign("value",$config['VALUE']);
		$this->raintpl->assign("editor",$config['EDITOR']);
		$this->raintpl->assign("form",$config['FORM']);
		$this->raintpl->assign("class",$config['CLASS']);
		
		return $this->raintpl->draw("ctr_textarea",true);
	}
}
?>
