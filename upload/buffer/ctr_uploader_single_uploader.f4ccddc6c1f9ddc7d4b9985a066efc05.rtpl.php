<script language="javascript" type="text/javascript" src="../core/lib/controls/uploader/scripts/ctr_uploader.js"></script>
<div id="<?php echo $name;?>_uploader" class="panel panel-default">
	<input type="hidden" id="<?php echo $name;?>_uploader_file_types" value="<?php echo $file_types;?>" />
	<input type="hidden" id="<?php echo $name;?>_uploader_max_file_size" value="<?php echo $max_file_size;?>" />
	<div class="panel-heading">
		<div class="panel-title">
				<?php echo $title;?> : <?php echo $description;?>

		</div>
	</div>
	<div class="panel-body">
			<div class="row">
				<div class="col-xs-4">
					<button class="btn btn-success" id="<?php echo $name;?>_uploader_open_file_selector" onclick="document.getElementById('<?php echo $name;?>_uploader_select_file').click();"><?php echo $label_select_file;?></button>
					<button class="btn btn-default hide" id="<?php echo $name;?>_uploader_start_upload" onclick="ctr_uploader_upload_file('<?php echo $name;?>');"><?php echo $label_start_upload;?></button>
						<input type="file" name="uploader" id="<?php echo $name;?>_uploader_select_file" class="hide" onchange="ctr_uploader_file_selected(this, '<?php echo $name;?>');">
						<input type="hidden" id="<?php echo $name;?>_uploader_file_types" value="<?php echo $file_types;?>" />
						<input  form="<?php echo $form_name;?>" type="hidden" id="<?php echo $name;?>_uploader_file_id" value="0">
						<input type="hidden" id="<?php echo $php_progressbar_request_name;?>" value="<?php echo $php_progressbar_request_value;?>">
				</div>
				<div id="<?php echo $name;?>_uploader_this_file_info" class="col-xs-7 hide container">
					<div class="row well well-sm">
						<div class="col-xs-2">
							<img id="<?php echo $name;?>_uploader_image_preview" height="60px" width="60px" src="."/>
						</div>
						<div class="col-xs-8">
							
								 <?php echo $label_this_file_name;?><span id="<?php echo $name;?>_uploader_this_file_name"></span><br />
								 <?php echo $label_this_file_size;?><span id="<?php echo $name;?>_uploader_this_file_size"></span>
								 <span id="<?php echo $name;?>_uploader_this_file_size_unit"></span><br />
								 <div id="<?php echo $name;?>_uploader_progressbar_block" class="progress progress-striped active hide">
								 	<div id="<?php echo $name;?>_uploder_progressbar" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
								 </div>
						
						</div>
						<div id="<?php echo $name;?>_uploader_complete_icon" class="col-xs-2 hide">
							<img src="../core/lib/controls/uploader/images/complete_64.png" />
						</div>
					</div>
				</div>
				
			</div>
			<br />
			<div class="row">
				<div class="col-xs-12">
					<span>
						<?php echo $label_file_types;?> : <?php echo $file_types;?> , <?php echo $label_file_size;?> : <?php echo $label_calculated_file_size;?> <?php echo $label_size_unit;?>

					</span>
				</div>
			</div>
			
	</div>
				
</div>