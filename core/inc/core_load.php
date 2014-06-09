<?php
/*	this file is perpare application of user for start working
	in this file set functions for start and use in themes
*/
ob_start("sys_render");
		//going to admin panel
		//set plugin varible
		if(isset($_REQUEST['plugin'])){
			$plugin = $_REQUEST['plugin'];
		}
		else{
			$plugin = 'default';
		}
		//set action varible
		if(isset($_REQUEST['action'])){
			$action = $_REQUEST['action'];
		}
		else{
			$action = 'default';
		}
		$admin = new core;
		$users = new users;
		if($users->is_logedin()){
			//first of all we want to check that user has permission to access to admin area?
			if($users->has_permission('core_admin_panel')){
				//going to show admin panel
			}
			else{
				//access deined
				echo 'no access';
			}
		}
		else{
			//show login panel
			cls_router::jump_page(cls_general::create_url(array('plugin','users','action','login','jump','panel=admin')));
		}
			
ob_end_flush();
?>


