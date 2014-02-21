<?php
class captcha_view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
	}
	
	public function captcha_show_full(){
		$this->raintpl->configure("tpl_dir", "plugins/captcha/tpl/" );
		$this->cache = $this->raintpl->cache('captcha_draw_full', 60);
		if($this->cache){
			return $this->cache;
		}
		else{
		//add tag for show messages
		$this->raintpl->assign( "captcha_not_show", _('if you do not see capcha please refresh page again.') );
		$this->raintpl->assign( "label_captcha", _("Captcha") );
		$this->raintpl->assign( "captcha_info", _('capcha is a way for seperate humans from machins.') );
		$this->raintpl->assign( "captcha", _('Captcha') );

		return $this->raintpl->draw( 'captcha_draw_full', true );
		}
	
	
	}

}
?>