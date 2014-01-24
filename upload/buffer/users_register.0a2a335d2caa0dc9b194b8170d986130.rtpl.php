<div id="users_register" class="users_register" >
	<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
	<div id="msg" class="users_register_msg" ></div>
	<form>
		<div class="form-group users_register">
			<label for="users_username"> <?php echo $label_username;?> </label>
			<input type="text" id="users_username" class="form-control" name="users_username" placeholder=" <?php echo $username;?>" onblur="is_registered();">
			<label for="users_username"> <?php echo $label_email;?> </label>
			<input type="text" id="users_email" class="form-control" name="users_email" placeholder=" <?php echo $email;?>">
			<label for="users_password"> <?php echo $label_password;?> </label>
			<input type="password" id="users_password" class="form-control" name="users_password" placeholder="******">
			<label for="users_repassword"> <?php echo $label_repassword;?> </label>
			<input type="password" id="users_repassword" class="form-control" name="users_repassword" placeholder="******">
			<br />
			<div class="alert alert-warning">
				<?php echo $agree_terms;?>

			</div>
			<br>
			<button type="button" class="btn btn-primary" data-loading-text="Loading..." onclick="users_register()" ><?php echo $sign_up;?></button>
			<button type="button" class="btn btn-default" onclick="users_cancel_register()"><?php echo $Cancel;?></button>

		</div>
	</form>
</div>