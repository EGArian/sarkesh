<div id="users_reset_password" class="users_reset_password" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_reset_password" ></div>
	<form>
		<div class="form-group users_reset">
			<label for="users_reset_code"> کد </label>
			<input type="text" id="users_reset_code" class="form-control" name="users_reset_code" placeholder="کد بازیابی کلمه عبور">
			<br />
			<div><p>For reset your password enter code that you get from your email.</p></div>
			<input type="button" class="form-control btn-primary" onclick="users_reset_password()" value="بازیابی کلمه عبور">
		</div>
	</form>
</div>