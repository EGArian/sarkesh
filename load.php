<?php
/*	this file is perpare application of user for start working
	in this file set functions for start and use in themes
*/
ob_start("sys_render");
include_once("./themes/default/index.php");
ob_end_flush();
?>


