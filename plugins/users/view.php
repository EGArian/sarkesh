<?php
class users_view{

	
	function __construct(){

	}
	
	public function show_login_page(){
		echo '<h1>' . _('Sing In Users') . '<h1>';
	}
	
	public function show_profile_page(){
		echo '<h1>' . _('User Profile') . '<h1>';
	}
	public function show_register_page(){
		echo '<h1>' . _('Sign Up') . '<h1>';
	}
}
?>