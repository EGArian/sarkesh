<?php
namespace core\control\checkbox;
use \core\cls\template as template;
use \core\cls\browser as browser;
class view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new browser\page;
		$this->raintpl = new template\raintpl;
	}
	
	public function view_draw($config, $show){
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','core/lib/controls/checkbox/');
		
		//add headers to page//
		browser\page::add_header('<script src="./core/ect/scripts/events/functions.js"></script>');		
		if($config['SCRIPT_SRC'] != ''){browser\page::add_header('<script src="' . $config['SCRIPT_SRC'] . '"></script>'); }		
		if($config['CSS_FILE'] != ''){ browser\page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
		
		//Assign variables
		$this->raintpl->assign( "id", $config['NAME']);
		$this->raintpl->assign( "form", $config['FORM']);
		$this->raintpl->assign( "value", $config['VALUE']);
		$this->raintpl->assign( "label", $config['LABEL']);

$this->raintpl->assign( "size", $config['SIZE']);
		$this->raintpl->assign( "checked", $config['CHECKED']);
		$this->raintpl->assign( "styles", $config['STYLE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "j_onclick", $config['J_ONCLICK']);
		$this->raintpl->assign( "p_onclick_f", $config['P_ONCLICK_FUNCTION']);
		$this->raintpl->assign( "p_onclick_p", $config['P_ONCLICK_PLUGIN']);
		$this->raintpl->assign( "j_after_onclick", $config['J_AFTER_ONCLICK']);

		$this->raintpl->assign( "j_onfocus", $config['J_ONFOCUS']);
		$this->raintpl->assign( "p_onfocus_f", $config['P_ONFOCUS_FUNCTION']);
		$this->raintpl->assign( "p_onfocus_p", $config['P_ONFOCUS_PLUGIN']);
		$this->raintpl->assign( "j_after_onfocus", $config['J_AFTER_ONFOCUS']);
		
		$this->raintpl->assign( "j_onblur", $config['J_ONBLUR']);
		$this->raintpl->assign( "p_onblur_f", $config['P_ONBLUR_FUNCTION']);
		$this->raintpl->assign( "p_onblur_p", $config['P_ONBLUR_PLUGIN']);
		$this->raintpl->assign( "j_after_onblur", $config['J_AFTER_ONBLUR']);
		
		
		if($config['DISABLE']){
			$this->raintpl->assign( "disabled", 'disabled');
		}
		else{
			$this->raintpl->assign( "disabled", 'enabled');
		}
		
		
		//return control
		$ctr = $this->raintpl->draw('ctr_checkbox', true );
		if($show){
			echo $ctr;
		}	
		return $ctr;
			
	}
}
?>
