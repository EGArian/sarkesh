<?php
class ctr_textbox_view{
	
	private $raintpl;
	private $page;
	function __construct(){
		$this->page = new cls_page;
		$this->raintpl = new cls_raintpl;
	}
	
	public function view_draw($config, $show){
		//configure raintpl //
		$this->raintpl->configure('tpl_dir','core/lib/controls/textbox/tpl/');
		
		//add headers to page//
		cls_page::add_header('<script src="./core/ect/scripts/events/functions.js"></script>');		
		if($config['SCRIPT_SRC'] != ''){cls_page::add_header('<script src="' . $config['SCRIPT_SRC'] . '"></script>'); }		
		if($config['CSS_FILE'] != ''){ cls_page::add_header('<link rel="stylesheet" type="text/css" href="' . $config['CSS_FILE']) . '" />';}
		
		//Assign variables
		$this->raintpl->assign( "id", $config['NAME']);
		$this->raintpl->assign( "form", $config['FORM']);
		$this->raintpl->assign( "password", $config['PASSWORD']);
		$this->raintpl->assign( "value", $config['VALUE']);
		$this->raintpl->assign( "label", $config['LABEL']);
		$this->raintpl->assign( "help", $config['HELP']);
		$this->raintpl->assign( "size", $config['SIZE']);
		$this->raintpl->assign( "type", $config['TYPE']);
		$this->raintpl->assign( "bs_control", $config['BS_CONTROL']);
		$this->raintpl->assign( "inline", $config['INLINE']);
		$this->raintpl->assign( "placeholder", $config['PLACE_HOLDER']);
		$this->raintpl->assign( "styles", $config['STYLE']);
		$this->raintpl->assign( "class", $config['CLASS']);
		$this->raintpl->assign( "addon", $config['ADDON']);
		
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
		$ctr = $this->raintpl->draw('ctr_textbox', true );
		if($show){
			echo $ctr;
		}	
		return $ctr;
			
	}
}
?>
