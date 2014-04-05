<!DOCTYPE html>
    <head>
    <?php echo $page_headers;?>

    <title></#PAGE_TITTLE#/></title>
    </head>
    <body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href=".?panel=admin">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href=".#">
            <i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href=".#">My Profile</a></li>
            <li><a href=".#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->
<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="panel panel-default">
			      <div class="panel-heading">
				    <h3 class="panel-title"><?php echo $main_menu;?></h3>
			      </div>
			      <div class="panel-body">
				    <ul class="nav nav-stacked">
					      <?php $counter1=-1; if( isset($plugins_menu) && is_array($plugins_menu) && sizeof($plugins_menu) ) foreach( $plugins_menu as $key1 => $value1 ){ $counter1++; ?>      
							    <?php echo $value1;?>

					      <?php } ?>             
				    </ul>
			      </div>
			</div>
		</div>
		<div class="col-sm-9">
		      <div class="core_main_content">
		      <?php echo $content;?>

		      </div>
		</div>
		
	</div>
</div>

<footer class="alert alert-success"><a href="http://sarkesh.org"><strong>Sarkesh</strong></a> is registered trademarks of Negareh Sarkesh Ltd</footer>

        
    </body>
</html>