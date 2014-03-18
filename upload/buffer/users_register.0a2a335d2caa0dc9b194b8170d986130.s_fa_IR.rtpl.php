<div id="users_register" class="users_register" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_register_msg" ></div>
	<form>
		<div class="form-group users_register">
			<label for="users_username"> نام کاربری: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder=" نام کاربری" onblur="users_is_registered_username();">
			<label for="users_username"> پست الکترونیکی: </label>
			<input type="email" id="users_email" class="form-control" name="users_email" placeholder="پست الکترونیکی" onblur="users_is_registered_email();">
			<label for="users_password"> کلمه عبور: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******" onblur="users_check_password();">
			<label for="users_repassword"> تکرار کلمه عبور </label>
			<input type="password" id="users_repassword" class="form-control" name="users_repassword" placeholder="******" onblur="users_check_repassword()";>
			<br />		
<div class="row">
  <div class="col-md-3">
  <img src=".?service=1&plugin=captcha&action=draw" alt="if you do not see capcha please refresh page again." class="img-thumbnail"><br />
  </div>
  <div class="col-md-9">
  <label  for="users_username"> Captcha </label>
			<input type="text" id="captcha_captcha" class="form-control" name="captcha_captcha" placeholder="Captcha">
			<p class="text-info">capcha is a way for seperate humans from machins.</p>
  </div>
</div>
			<br />
			<div class="alert alert-warning">
				کلیک بر روی دکمه عضویت به معنی پذیرش شرایط و قوانین ارائه خدمات خواهد بود.
			</div>
			<br>
			<button type="button" class="btn btn-primary" data-loading-text="Loading..." onclick="users_register()" >عضویت</button>
			<button type="button" class="btn btn-default" onclick="users_cancel_register()">انصراف</button>

		</div>
	</form>
</div>
