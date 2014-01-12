<div id="users_login" class="users_login" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_login_msg" ></div>
	<form>
		<div class="form-group">
			<label for="users_username"> نام کاربری: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder=" نام کاربری">
			<label for="users_password"> کلمه عبور: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******">
			<div class="checkbox">
				<input type="checkbox" id="users_remember" class="form-control" name="users_remember" value="yes">
			<label class="lcb>">مرا به یاد داشته باش!</label>
			</div>
			<input type="button" class="form-control btn btn-primary" data-loading-text="Loading..." onclick="users_login()" value="ورود">
			<a href=".?plugin=users&action=forget_password" >کلمه عبور را فراموش کرده اید؟</a>
		</div>
	</form>
</div>