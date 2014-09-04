<?php
//This file get system language and translate all _() function with po and mo difined files
//for add tranlations create your language folder in languages like fa_IR
//step 2 create LC_MESSAGES folder on it and put your mo and po files inside it
$obj_localize = new cls_localize;
$sys_language = $obj_localize->get_language();
putenv("LANG=" . $sys_language);
setlocale(LC_ALL, $sys_language);
bindtextdomain($sys_language, "./languages/");
textdomain($sys_language);
?>
