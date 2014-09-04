<?php
class cls_window{
	static $page_tittle;
	
	public function set_page_tittle($tittle){
		$page_tittle = $tittle;
	}
	public function get_page_tittle(){
		return self::page_tittle;
	}
	
}
cls_window::set_page_tittle('ddd');
echo cls_window::get_page_tittle();

?>