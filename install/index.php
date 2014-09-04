<?php
//this part is for installing sarkesh cms
//if file lock exsist installation will be stoped
define('AppPath',dirname(__file__) . '/');
if(file_exists(AppPath . 'lock.s')){
	//installed before
	echo "Lock is enabled";

}
else{
	//going to install system
	echo "system installing ...";
}