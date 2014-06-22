<?php
#This file is Sarkesh web framework main configration file

#database type. now only mysql supported
define ("DatabaseType","mysql");

#mysql connect information
define ("DatabaseUser","root");
define ("DatabasePassword","");
define ("DatabaseHost","localhost");
define ("DatabaseName","test");

#save system Access domain
define ("SiteDomain","http://localhost/sarkesh/");

#config file system
define('AppPath',dirname(__file__) . '/');

#this url use for installing plugin 
#in this address sore plugins
define('PluginsCenter','http://plugins.sarkesh.org/');

?>
