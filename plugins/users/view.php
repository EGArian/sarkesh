<?php
class users_view{
	private $settings;
	function __construct($settings){
		$this->settings = $settings;
	}
	public function view_login(){
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
		
		$remember = new ctr_checkbox;
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
			$register->configure('J_ONCLICK', _('Register'));
			$register->configure('TYPE','success');
			$r1 = new ctr_row;
			$r1->add($lbl,7);
			$r1->add($register,5);
			$form->add($r1);
		}
		
		return array(_('Sign in'),$form->draw());
	}

}
?>
