<?php
#This file is Sarkesh web framework main configration file

#database type. now only mysql supported
define ("DatabaseType","mysql");

#mysql connect information
define ("DatabaseUser","root");
define ("DatabasePassword","123456");
define ("DatabaseHost","localhost");
define ("DatabaseName","sarkesh");

#save  domain for load system
define ("SiteDomain","http://localhost/");

#config file system
define('AppPath',dirname(__file__) . '/');

#this url use for installing plugin 
#in this address sore plugins
define('PluginsCenter','http://plugins.sarkesh.org/');

#error reporting state. for more info about this variable see php documents
define('ERROR_REPORTING',E_ALL);
?>
