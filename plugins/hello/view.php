<?php
class hello_view{
	private $raintpl;
	
	function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->raintpl->configure("tpl_dir", "plugins/hello/tpl/" );
	}
	protected function view_test_button(){
		$t = new ctr_form('bb');
		$tt = new ctr_tabbar;
		$button = new ctr_button;
		$button->configure("NAME","M");
		$button->configure("SIZE","lg");
		$button->configure("LABEL","Sample label for textbox");
		$button->configure("TYPE","success");
		$button->configure("SIZE","sm");
		$button->configure("SCRIPT_SRC","./plugins/hello/hello.js");
		$button->configure("J_AFTER_ONCLICK","SysShowModal");
		$button->configure("P_ONCLICK_PLUGIN","hello_controller");
		$button->configure("P_ONCLICK_FUNCTION","roydad");
		$t->add($button);
		$button->configure("NAME","FARMAN");
		$button->configure("SIZE","lg");
		$button->configure("LABEL","FARMAN");
		$t->add($button);
		$tt->add($t);
		$this->raintpl->assign("button",$tt->draw());
		$b = $this->raintpl->draw("test_button",false);
		return array(1,$b);
	}
	
	protected function view_test_textbox(){
		$textbox = new ctr_textbox;
		$textbox->configure("NAME","M");
		$textbox->configure("HELP","for complete your textbox please read this note.");
		$textbox->configure("LABEL","Sample label for textbox");
		$textbox->configure("PLACE_HOLDER","sample placeholder");
		$textbox->configure("BS_CONTROL",TRUE);
		$textbox->configure("SCRIPT_SRC","./plugins/hello/hello.js");
		//$textbox->configure("J_ONCLICK","test_button");
		$textbox->configure("INLINE",FALSE);
		//$textbox->configure("P_ONCLICK_PLUGIN","hello");
		//$textbox->configure("P_ONCLICK_FUNCTION","roydad");
		$a = $textbox->draw(false);
		$f = new ctr_button;
		$f->configure("NAME","ff");
		$f->configure("VALUE","0");
		$f->configure("P_ONCLICK_PLUGIN","hello");
		$f->configure("P_ONCLICK_FUNCTION","roydad");
		$f->configure("TYPE","success");
		
		$this->raintpl->assign("textbox",$a. $f->draw(false));
		$b = $this->raintpl->draw("test_textbox",false);
		return array(1,$b);
	}
	protected function view_test_combobox(){
		$combo = new ctr_combobox;
		$combo->configure("NAME","M");
		$combo->configure("LABEL","ali ghili sh  wali");
		$combo->configure("PLACE_HOLDER","MEYSAM");
		$db = new cls_database;;
		$db->do_query('select * from users');
		$combo->configure("TABLE",$db->get_array());
		$combo->configure("COLUMN","username");
		$combo->configure("SCRIPT_SRC","./plugins/hello/hello.js");
		//$combo->configure("J_ONCLICK","test_button");
		$combo->configure("INLINE",FALSE);
		//$combo->configure("P_ONCLICK_PLUGIN","hello");
		//$combo->configure("P_ONCLICK_FUNCTION","roydad");
		$a = $combo->draw(false);
		$f = new ctr_button;
		$f->configure("NAME","ff");
		$f->configure("VALUE","0");
		$f->configure("P_ONCLICK_PLUGIN","hello");
		$f->configure("P_ONCLICK_FUNCTION","roydad");
		$f->configure("TYPE","success");
		
		$this->raintpl->assign("textbox",$a. $f->draw(false));
		$b = $this->raintpl->draw("test_textbox",false);
		return array(1,$b);
	}
}
			
		 
