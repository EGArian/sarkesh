<?php
#this function render theme file and replace contents with tags that defined in that.

function sys_render($buffer)
{
	// first replace headers 
	// like css java scripts and ect
	global $sys_page;
	$buffer = str_replace("</#PAGE_TITTLE#/>", $sys_page->get_page_tittle(), $buffer);
	$buffer = str_replace("</#block#sidebar#1#/>", "Sarkesh Home Page", $buffer);
	return $buffer;
}



?>
