<?php
class users_view{
	private $settings;
	function __construct($settings){
		$this->settings = $settings;
	}
	public function view_login_block(){
		$username = new ctr_textbox();
		$username->configure('NAME','txt_username');
		$username->configure('INLINE',TRUE);
		$username->configure('ADDON','U');
		$username->configure('PLACE_HOLDER',_('Username'));
		
		$password = new ctr_textbox();
		$password->configure('NAME','txt_password');
		$password->configure('INLINE',TRUE);
		$password->configure('LABEL',_('Password:'));
		$password->configure('ADDON','P');
		$password->configure('PLACE_HOLDER',_('Password'));
		$password->configure('PASSWORD',true);
		
		$remember = new ctr_checkbox;
		$remember->configure('NAME','ckb_remember');
		$remember->configure('LABEL',_('Remember me!'));
		
		$login = new ctr_button;
		$login->configure('NAME','btn_login');
		$login->configure('LABEL',_('Sign in'));
		$login->configure('P_ONCLICK_PLUGIN','users');
		$login->configure('P_ONCLICK_FUNCTION','btn_login_onclick');
		$login->configure('TYPE','primary');
		
		$forget = new ctr_button;
		$forget->configure('NAME','btn_reset_password');
		$forget->configure('LABEL', _('Reset Password'));
		$forget->configure('HREF',cls_general::create_url(array('plugin','users','action','reset_password')));
		$forget->configure('TYPE','link');
		
		$r = new ctr_row;
		$r->add($login,3);
		$r->add($forget,9);
		
		$form = new ctr_form;
		$form->configure('NAME','users_login');
		$form->add_array(array($username,$password,$remember,$r));
		
		//users can register?
		if($this->settings['register'] == '1'){
			$form->add_spc();
			$lbl = new ctr_label(_("Don't have account?"));
			$register = new ctr_button;
			$register->configure('NAME','btn_register');
			$register->configure('LABEL', _('Register'));
			$register->configure('HREF',cls_general::create_url(array('plugin','users','action','register')));
			$register->configure('TYPE','success');
			$r1 = new ctr_row;
			$r1->add($lbl,7);
			$r1->add($register,5);
			$form->add($r1);
		}
		
		return array(_('Sign in'),$form->draw());
	}
	
	/*
	 * INPUT: Object >redbeanphp user info
	 * INPUT: boolean > Admin permation
	 * 
	 * This function show user profile in block mode and content mode
	 * block mode draw with small information about user
	 * content mode draw all information about user
	 * OUTPUT:form
	 */
	 protected function view_profile_block($user,$admin){
		 $form = new ctr_form('USERS_PROFILE_BLOCK');
		 $row = new ctr_row;
		 $avatar = new ctr_image;
		 $avatar->configure('SRC','./plugins/users/images/def_avatar_64.png');
		 $avatar->configure('TYPE','img-thumbnail');
		 $avatar->configure('LABEL',_('Hello') . ' ' . $user->username);
		 $row->add($avatar,12);
		 
		 $row1 = new ctr_row;
		 $btn_logout = new ctr_button;
		 $btn_logout->configure('NAME','btn_logout');
		 $btn_logout->configure('LABEL','Sign Out!');
		 $btn_logout->configure('TYPE','info');
		 $btn_logout->configure('P_ONCLICK_PLUGIN','users');
		 $btn_logout->configure('P_ONCLICK_FUNCTION','btn_logout_onclick');
		 $row1->add($btn_logout,6);
		 
		 if($admin){
			$btn_admin = new ctr_button;
			$btn_admin->configure('NAME','JUMP_ADMIN');
			$btn_admin->configure('LABEL',_('Admin panel'));
			$btn_admin->configure('HREF',cls_general::create_url(array('panel','admin')));
			$row1->add($btn_admin,6);
		 }
		 
		 $form->add_array(array($row,$row1));
		 return array(_('User Profile'),$form->draw());
	 }
	 

}
?>
