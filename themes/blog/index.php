<?php use \core\cls\browser as browser;?>
<!DOCTYPE html> 
<head>
</#HEADERS#/>
<title></#PAGE_TITTLE#/></title>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Sarkesh</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <?php browser\page::set_position('header'); ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    
    <div class="container">

      <div class="row">
        <div class="col-xs-8 main">
	  <?php browser\page::set_position('content'); ?>	
        </div>
        
        <div class="col-xs-4 sidebar">
	  <div class="row">
	  <?php browser\page::set_position('sidebar1'); ?>
	  </div>
	  <div class="row">
	  <?php browser\page::set_position('sidebar2'); ?>
          </div>
        </div>
      </div>
      
      <hr>
      
      <footer>
        <div class="row">
          <div class="col-xs-12">
	    <p><?php browser\page::set_position('footer'); ?></p>
            <p><?php echo _('Copyright &copy; Sarkesh LTD 2013'); ?></p><br />
          </div>
        </div>
      </footer>

    </div><!-- /.container -->
  </body>
</html>
