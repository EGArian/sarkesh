<?php
/*	this file is perpare application of user for start working
	in this file set functions for start and use in themes
*/
ob_start("sys_render");
$localize = new cls_localize;
$settings = $localize->get_localize();
include_once('./themes/' . $settings['theme'] . '/index.php');
ob_end_flush();
?>


