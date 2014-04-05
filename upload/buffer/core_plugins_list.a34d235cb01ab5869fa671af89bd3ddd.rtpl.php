<div class="core_plugin_list">
		<script language="javascript" type="text/javascript" src="../plugins/core/scripts/core.js"></script>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href=".#core_plugins_list" data-toggle="tab"><?php echo $label_plugins;?></a></li>
		  <li><a href=".#core_plugins_install" data-toggle="tab"><?php echo $label_install;?></a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="core_plugins_list">
		  <!-- content -->
					<table class="table">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th><?php echo $label_name;?></th>
			                <th><?php echo $label_description;?></th>
			                <th><?php echo $label_author;?></th>
			                <th><?php echo $label_version;?></th>
			                <th><?php echo $label_options;?></th>
			            </tr>
			        </thead>
			        <tbody>
			    	   	<?php $counter1=-1; if( isset($plugins) && is_array($plugins) && sizeof($plugins) ) foreach( $plugins as $key1 => $value1 ){ $counter1++; ?>

			    	   	<?php if( $value1["enable"] == 0 ){ ?>

			    	    	<tr  id="core_plugin_<?php echo $value1["name"];?>" class="danger">
			    	   	<?php } ?>

			    	   	<?php if( $value1["enable"] == 1 ){ ?>

			    	    	<tr  id="core_plugin_<?php echo $value1["name"];?>" class="success">
			    	   	<?php } ?>

						    	   		<td><?php echo $key1;?></td>
						    	   		<td><?php echo $value1["name"];?></td>
						    	   		<td><?php echo $value1["description"];?></td>
						    	   		<td><?php echo $value1["author"];?></td>			    	   		
						    	   		<td><?php echo $value1["version"];?></td>
						    	   		<td>
						    	   			    	   	<?php if( $value1["enable"] == 0 ){ ?>

							  								<button type="button" class="btn btn-success btn-xs" value="1*<?php echo $value1["name"];?>" onclick="core_plugins_changestate(this.id, this.value)"><?php echo $label_Edite_enable;?></button>
											    	   	<?php } ?>

											    	   	<?php if( $value1["enable"] == 1 ){ ?>

											    	    	<?php if( $value1["can_edite"] == 1 ){ ?>

							  									<button type="button" class="btn btn-primary btn-xs" value="0*<?php echo $value1["name"];?>" onclick="core_plugins_changestate(this.id, this.value)"><?php echo $label_Edite;?></button>
											  		  	   	<?php } ?>

											  		  	   	<?php if( $value1["can_edite"] == 0 ){ ?>

							  									<button type="button" class="btn btn-danger btn-xs" disabled="disabled"><?php echo $label_Edite_disabled;?></button>
											  		  	   	<?php } ?>

											    	   	<?php } ?>

						    	   			
						    	   		</td>
						</tr>
						<?php } ?>

			        </tbody>
			    </table>
			<!-- /content -->
	    
		  </div>
		  <div class="tab-pane" id="core_plugins_install">
		  sorry. This part is under development!
		  </div>

		</div>
		
		
		  	