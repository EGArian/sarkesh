<?php
class hello_view{
	//if you want to work with templates you should use raintpl class
	//for more information about raintpl see http://raintpl.com
	private $raintpl;
	public function __construct(){
	      $this->raintpl = new cls_raintpl;
	}
	
	//this function use cls_page and raintpl for show hello world message
	public function say_hello($view){
		  //first configurate raintpl 
		  //you should set that place you store your templates files
			$this->raintpl->configure("tpl_dir", "plugins/hello/tpl/" );
		  $this->cache = $this->raintpl->cache('hello_world_template', 60);
		  if($this->cache){
			  //file is exist in cache 
			  //going to show that on page with cls_page
			  //for more information about show_block function in cls_page see cls_page documents
			  $content = cls_page::show_block(false,  _('Tittle of message') , $this->cache, $view);
		  }
		  else{
		  //file is not exist in cache going to create that
		  //add tag for show messages
		  //with assign you send value for varible in html file
		  //for more information about cls_raintpl->assign see cls_raintpl documents
		  $this->raintpl->assign( "label_hello_world", _('Hello world!') );
		  //after set all varibles we going to show that on page with cls_page
		  $content = cls_page::show_block(false,  _('Tittle of message') , $this->raintpl->draw( 'hello_world_template', true ), $view);
		  }
		  //return tittle of content you want to show
		  return array(_('Users Login'), $content);;
		  //seccend check for that this file is cached before
		  
	}
	
	public function sample(){
		cls_page::add_header('<script src="./plugins/hello/hello.js"></script>');
		$this->raintpl->configure("tpl_dir", "plugins/hello/tpl/" );
		$res = $this->raintpl->draw("sample",true);
		$content = cls_page::show_block(false,"test me",$res,"MAIN");
		return array("test", $content);
		//echo $res;
	}

}
?>
