<?php
#this function render theme file and replace contents with tags that defined in that.

function sys_render($buffer)
{
	// first replace headers 
	// like css java scripts and ect
	global $sys_page;
	$buffer = str_replace("</#PAGE_TITTLE#/>", $sys_page->get_page_tittle(), $buffer);
	return $buffer;
}



?>
