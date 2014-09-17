<?php
/*	this file is perpare application of user for start working
	in this file set functions for start and use in themes
*/
ob_start("sys_render");
$registry = new \core\cls\core\registry;
include_once('./themes/' . $registry->get('administrator', 'active_theme') . '/index.php');
ob_end_flush();
?>


