<?php
#this function render theme file and replace contents with tags that defined in that.

function sys_render($buffer)
{
	// first replace headers 
	// like css java scripts and ect
	$buffer = str_replace("</#PAGE_TITTLE#/>", \core\cls\browser\page::get_page_tittle(), $buffer);
	
	//LOAD HEADERS
	$buffer = str_replace("</#HEADERS#/>",  \core\cls\browser\page::load_headers(false), $buffer);
	
	return $buffer;
}



?>
