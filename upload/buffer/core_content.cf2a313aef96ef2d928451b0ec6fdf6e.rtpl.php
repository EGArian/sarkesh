
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $sarkesh_admin_url;?>"><?php echo $sarkesh_admin;?></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php $counter1=-1; if( isset($menu) && is_array($menu) && sizeof($menu) ) foreach( $menu as $key1 => $value1 ){ $counter1++; ?>
						<li>
							<a href="<?php echo $value1["0"];?>"><i class="fa fa-fw fa-dashboard"></i><?php echo $value1["1"];?></a>
						</li>
					<?php } ?>                
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">2</span> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">2 New Messages</li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="message-preview">
                                <a href="#">
                                    <span class="avatar"><i class="fa fa-bell"></i></span>
                                    <span class="message">Security alert</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                        </ul>
                    </li>
                    <li class="dropdown user-dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user_name;?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo $user_profile_url;?>"><i class="fa fa-fw fa-user"></i><?php echo $user_profile;?></a>
							</li>
							<li>
								<a href="<?php echo $user_settings_url;?>"><i class="fa fa-fw fa-gear"></i> <?php echo $user_settings;?></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo $user_logout_url;?>"><i class="fa fa-fw fa-power-off"></i><?php echo $user_logout;?></a>
							</li>
						</ul>
					</li>
                    
                </ul>
            </div>
        </nav>
        <div class="row">
			<div id="page-wrapper">
				<div class="col-xs-12"><?php echo $content;?></div>
				<div class="col-xs-12">
					<div id="page-wrapper">
						<div class="alert alert-success" role="alert">
							Powered by 
						  <a href="http://sarkesh.org" class="alert-link">SarkeshMVC</a>
						</div>
					</div>
				</div>	
			</div>
        </div>
