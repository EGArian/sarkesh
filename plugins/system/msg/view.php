<?php
namespace plugin\msg;
class view{
	//if you want to work with templates you should use raintpl class
	//for more information about raintpl see http://raintpl.com
	private $raintpl;

	public function __construct(){
	      $this->raintpl = new \template\raintpl;
	      $this->raintpl->configure("tpl_dir", "plugins/system/msg/tpl/" );

	}
	
	//this function use cls_page and raintpl for show hello world message
	protected function view_404(){
		//first configurate raintpl 
		//you should set that place you store your templates files
			//add css page
			\browser\page::add_header('<link rel="stylesheet" type="text/css" href="./plugins/system/msg/styles/404.css" />');
			$this->cache = $this->raintpl->cache('404', 60);
			if($this->cache){
				//file is exist in cache 
				//going to show that on page with cls_page
				//for more information about show_block function in cls_page see cls_page documents
				$page_content =  $this->cache;
			}
			else{
				//file is not exist in cache going to create that
				//add tag for show messages
				//with assign you send value for varible in html file
				//for more information about cls_raintpl->assign see cls_raintpl documents
				$this->raintpl->assign( "msg_404", _('Page Not Found!') );
				//after set all varibles we going to show that on page with cls_page
				$page_content = $this->raintpl->draw( '404', true );
			}
			//return tittle of content you want to show
			return array(_('Not Found!'),$page_content);
	  
	}
	
	protected function view_msg($header, $body, $type){
		$label = new \control\label($body);
		$label->configure('TYPE', $type);
		
		$form = new \control\form('msg');
		$form->add($label);
		$form->configure('PANEL',TRUE);
		$form->configure('LABEL',$header);
		$form->configure('TYPE',$type);
		return ['',$form->draw()];
	}

}
?>
