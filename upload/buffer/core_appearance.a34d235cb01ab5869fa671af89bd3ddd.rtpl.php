<div class="core_plugin_list">
		<script language="javascript" type="text/javascript" src="../plugins/core/scripts/core.js"></script>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href=".#core_theme_list" data-toggle="tab"><?php echo $label_themes;?></a></li>
		  <li><a href=".#core_theme_install" data-toggle="tab"><?php echo $label_install;?></a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="core_theme_list">
		  <!-- content -->
					<table class="table">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th><?php echo $label_screen;?></th>
			                <th><?php echo $label_name;?></th>
			                <th><?php echo $label_author;?></th>
			                <th><?php echo $label_options;?></th>
			            </tr>
			        </thead>
			        <tbody>
			    	   	<?php $counter1=-1; if( isset($themes) && is_array($themes) && sizeof($themes) ) foreach( $themes as $key1 => $value1 ){ $counter1++; ?>


			    	    	<tr  id="core_plugin_<?php echo $value1["name"];?>" class="info">
							    <td><?php echo $key1 +1;?></td>
							    <td><img src=".<?php echo $value1["img"];?>" height="50px" width="100px"></td>
							    <td><?php echo $value1["folder_name"];?></td>
							    <td><?php echo $value1["author"];?></td>			    	   		
							    <td>
						    	   			    	   	
											    	   	<?php if( $theme_count > 1 ){ ?>

												    	   	<?php if( $value1["default"] == 0 ){ ?>

								  								<button type="button" class="btn btn-success btn-xs" value="1*<?php echo $value1["name"];?>" onclick="core_plugins_changestate(this.id, this.value)"><?php echo $label_enable;?></button>
												    	   	<?php } ?>

												    	   	<?php if( $value1["default"] == 1 ){ ?>

							  									<button type="button" disabled="disabled" class="btn btn-primary btn-xs" value="0*<?php echo $value1["name"];?>" onclick=""><?php echo $label_disable;?></button>
											    	   		<?php } ?>

											    	   	<?php } ?>

											    	   	
						    	   			
						    	</td>
							</tr>
						<?php } ?>

			        </tbody>
			    </table>
			<!-- /content -->
	    
		  </div>
		  <div class="tab-pane" id="core_theme_install">
		  sorry. This part is under development!
		  </div>

		</div>
		
		
		  	