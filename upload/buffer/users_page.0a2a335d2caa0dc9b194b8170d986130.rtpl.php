<div class=container>
	<div id="users_page" class="users_page" >
		<script language="javascript" type="text/javascript" src="../plugins/users/scripts/users.js"></script>
		<div id="msg" class="users_page_msg" ></div>
		
		<img class="img-thumbnail" src="../plugins/users/images/def_avatar_64.png"> <?php echo $hello . '  ' .  $username;?> <br />
		<br />
		<p>
			<button type="button" class="btn btn-primary btn-md" onclick="users_logout()"><?php echo $logout;?></button>
			<?php if( $admin_permission == '1' ){ ?>

				<button type="button" class="btn btn-default btn-md" onclick="sys_jump_page('?panel=admin')"><?php echo $label_admin_area;?></button>
			
			<?php } ?>

		</p>
	</div>
</div>