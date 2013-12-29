<?php
#This file is Sarkesh web framework main configration file

#database type. now only mysql supported
define ("DatabaseType","mysql");

#mysql connect information
define ("DatabaseUser","root");
define ("DatabasePassword","136431");
define ("DatabaseHost","localhost");
define ("DatabaseName","sarkesh");
define ("TablePrefix","");

//save system Root
define ("SiteRoot","http://localhost/");

#config file system
define('AppPath',dirname(__file__) . '/');
?>