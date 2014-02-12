<div id="users_register" class="users_register" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_register_msg" ></div>
	<form>
		<div class="form-group users_register">
			<label for="users_username"> Username: </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder=" Username" onblur="users_is_registered_username();">
			<label for="users_username"> Email: </label>
			<input type="email" id="users_email" class="form-control" name="users_email" placeholder="Email" onblur="users_is_registered_email();">
			<label for="users_password"> Password: </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******" onblur="users_check_password();">
			<label for="users_repassword"> Re Password </label>
			<input type="password" id="users_repassword" class="form-control" name="users_repassword" placeholder="******" onblur="users_check_repassword()";>
			<br />
			<div class="alert alert-warning">
				By clicking submit you are agreeing to the Terms and Conditions.
			</div>
			<br>
			<button type="button" class="btn btn-primary" data-loading-text="Loading..." onclick="users_register()" >Sign up</button>
			<button type="button" class="btn btn-default" onclick="users_cancel_register()">Cancel</button>

		</div>
	</form>
</div>

