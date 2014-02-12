<?php
class languages_view{

	private $obj_page;
	private $raintpl;
	function __construct(){
		//config raintpl
		cls_raintpl::configure("tpl_dir", "plugins/email/templates/" );
		$this->raintpl = new cls_raintpl;
		$this->obj_page = new cls_page;
	}
	
	public function send_email($subject, $body){
		$this->raintpl->assign( "subject", $subject );
		$this->raintpl->assign( "body", $body);
		//getting site name
		$localize = new cls_localize;
		$site_info = $localize->get_localize();
		$this->raintpl->assign( "site_name", $site_info['site_name'] );
		return $this->raintpl->draw( 'email_template', true );
	}
	
}
?>