<?php
class menu_view{
	//this is an object of cls_page class
	private $page;
	//this varible store active menu content
	//warrning menus dont follow tpl templates(raintpl)
	private $active_menu;
	public function __construct(){
		$this->raintpl = new cls_raintpl;
		$this->page = new cls_page;
		$this->active_menu .= '<ul class="nav navbar-nav">' . "\n";
	      }
	
	//this function use cls_page and raintpl for show hello world message
	public function show_menus($view, $menus){
		
	 
	}
}
?>