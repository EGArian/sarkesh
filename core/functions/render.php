<?php
#this function render theme file and replace contents with tags that defined in that.

function sys_render($buffer)
{
	// first replace headers 
	// like css java scripts and ect
	global $sys_page;
	$buffer = str_replace("</#headers#/>", $sys_page->load_headers(), $buffer);
	$buffer = str_replace("</#PAGE_TITTLE#/>", $sys_page->get_page_tittle(), $buffer);
	
	//now we want to find theme blocks
	//first check for that is blocks position cached
	if(file_exists("./cache/theme.php")){
		//blocks cached before
	}
	else{
		//going to create cached file .after that use created file for using 
		//first find blocks tags
		$start_search_from = 0;
		$end_tag = 0;
		while($start_search_from = strpos($buffer, '<##block##>',$start_search_from + 1)){
			//find end of tag that end with /
			$end_tag = strpos($buffer , '</##block##>', $start_search_from + 1);
			//now replace tag with php function
			strreplace
		}
	}
  
  $buffer = str_replace("</#block#sidebar#1#/>", "Sarkesh Home Page", $buffer);
  return $buffer;
}



?>
