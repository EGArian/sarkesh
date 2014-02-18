<?php
class email_view{
	public $local;
	public $template_file;
	public $template_name;
	function __construct(){
		//config raintpl
		$registry = new cls_registry;
		$this->template_name = $registry->get('email', 'template');
		$this->raintpl = new cls_raintpl;
		//get template direction name
		//for use in rtl languages
		$this->template_file = $this->template_name;
		$localize = new cls_localize;
		$this->local = $localize->get_localize();
		if($this->local['direction'] == 'RTL'){
			$this->template_file = $this->template_name . '_rtl';
		}
	}
	
	//this function add template to $body
	public function add_template($body, $subject){
		$this->raintpl->configure("tpl_dir", "plugins/email/tpl/" . $this->template_name . '/');
		$this->cache = $this->raintpl->cache($this->template_file, 60);
		if( $this->cache){
			return $this->cache;
		}
		else{
			$this->raintpl->assign( "body",_($body));
			$this->raintpl->assign( "header", _($subject));
			$this->raintpl->assign( "site_name", _($this->local['name']) );
			return $this->raintpl->draw( $this->template_file, true );
		}
	
	}

}
?>