<?php
#this function render theme file and replace contents with tags that defined in that.

function sys_render($buffer)
{
	// first replace headers 
	// like css java scripts and ect
	$buffer = str_replace("</#PAGE_TITTLE#/>", cls_page::get_page_tittle(), $buffer);
	
	//LOAD HEADERS
	$buffer = str_replace("</#HEADERS#/>", cls_page::load_headers(false), $buffer);
	
	return $buffer;
}



?>
