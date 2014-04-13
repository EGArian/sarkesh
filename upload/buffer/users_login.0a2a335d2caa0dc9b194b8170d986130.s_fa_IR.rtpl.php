<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_login_msg" ></div>
	<form id="users_login">
		<div class="form-group users_login">
			<label for="users_username"> نام کاربری: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder="نام کاربری">
			<label for="users_password"> گذرواژه: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="users_remember" name="users_remember" value="yes">
					مرا فراموش مکن!
				</label>
			</div>
			<input type="button" class="form-control btn btn-primary" onclick="users_login()" value="ورود">
			<a href=".?plugin=users&action=forget_password" >گذر واژه خود را فراموش کرده اید؟</a>
			<br />
			
				
				<br />
				<div>
					<p>حساب کاربری ندارید؟ <a href=".?plugin=users&action=register" class="btn btn-primary btn-sm" role="button"> ثبت نام </a></p>
				</div>
			
		</div>
	</form>
</div>