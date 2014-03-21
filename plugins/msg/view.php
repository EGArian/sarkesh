<?php
class msg_view{
	//if you want to work with templates you should use raintpl class
	//for more information about raintpl see http://raintpl.com
	private $raintpl;
	//this is an object of cls_page class
	private $page;
	public function __construct(){
	      $this->raintpl = new cls_raintpl;
	      $this->page = new cls_page;
	}
	
	//this function use cls_page and raintpl for show hello world message
	public function show_msg($msg, $view,$show=true){
		//first configurate raintpl 
		//you should set that place you store your templates files
		$this->raintpl->configure("tpl_dir", "plugins/msg/tpl/" );
		  
		// check that what message user want to show
		if($msg == '404'){
			$this->cache = $this->raintpl->cache('404', 60);
			if($this->cache){
				//file is exist in cache 
				//going to show that on page with cls_page
				//for more information about show_block function in cls_page see cls_page documents
				$page_content = $this->page->show_block($show,  _('Not Found!') , $this->cache, $view);
			}
			else{
				//file is not exist in cache going to create that
				//add tag for show messages
				//with assign you send value for varible in html file
				//for more information about cls_raintpl->assign see cls_raintpl documents
				$this->raintpl->assign( "msg_404", _('Page Not Found!') );
				//after set all varibles we going to show that on page with cls_page
				$page_content = $this->page->show_block($show,  _('Not Found!') , $this->raintpl->draw( '404', true ), $view);
			}
			//return tittle of content you want to show
			return array(_('Not Found!'),$page_content);
		}
		  
		  
		  
		  
		  
		 
		  
	}

}
?>