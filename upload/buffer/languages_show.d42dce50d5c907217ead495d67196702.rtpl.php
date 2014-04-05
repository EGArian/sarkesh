<div id="languages_select" class="languages_select" >
	<script language="javascript" type="text/javascript" src="../plugins/languages/scripts/languages.js"></script>
	<div id="msg" class="languages_select_msg" ></div>
	<form>
		<select class="languages_selector form-control" onchange="languages_change()">
			<?php $counter1=-1; if( isset($languages_list) && is_array($languages_list) && sizeof($languages_list) ) foreach( $languages_list as $key1 => $value1 ){ $counter1++; ?>

				<option value="<?php echo $value1["language"];?>">  <?php echo $value1["language_name"];?> </option>
			<?php } ?>

		</select>
	</form>
</div>