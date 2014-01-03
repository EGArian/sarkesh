<?php
class languages_view{

	private $obj_page;
	function __construct(){
		$this->obj_page = new cls_page;
	}
	
	public function show_languages($languages, $view){
		$form  = '<div id="languages_select" class="languages_select" >';
		$form .= '<script language="javascript" type="text/javascript" src="./plugins/languages/scripts/languages.js"></script>';
		$form .= '<div id="msg" class="languages_select_msg" ></div>';
		$form .= '<select class="languages_selector" onchange="languages_change()">';
		foreach($languages as $language){
			  $form .= '<option value="' . $language['language'] . '">' . $language['language_name'] . '</option>';
		}
		$form .= '<select>';
		$form .= '</div>';
		$this->obj_page->show_block(_('Languages') , $form, $view);
	}
	
	public function show_in_box($header, $content, $show_close = true){
		$this->obj_page->show_in_box($header, $content, $show_close);
	}
}
?>