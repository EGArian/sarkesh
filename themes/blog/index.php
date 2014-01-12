<!DOCTYPE html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $sys_page->load_headers();?>

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
          <a class="navbar-brand" href="/">Home Page</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#about">Download</a></li>
            <li><a href="#services">Plugins</a></li>
            <li><a href="#contact">Themes</a></li>
            <li><a href="#contact">About</a></li>
            <li><a href="#contact">Contact</a></li>

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    
    <div class="container">

      <div class="row">
        <div class="col-lg-8">
        
	  <?php $sys_page->set_position('content'); ?>
          
          <hr>

          <!-- the comments -->
          <h3>Start Bootstrap <small>9:41 PM on August 24, 2013</small></h3>
          <p>This has to be the worst blog post I have ever read. It simply makes no sense. You start off by talking about space or something, then you randomly start babbling about cupcakes, and you end off with random fish names.</p>

          <h3>Start Bootstrap <small>9:47 PM on August 24, 2013</small></h3>
          <p>Don't listen to this guy, any blog with the categories 'dinosaurs, spaceships, fried foods, wild animals, alien abductions, business casual, robots, and fireworks' has true potential.</p>

        </div>
        
        <div class="col-lg-4">
          <div class="well">
	  <?php $sys_page->set_position('sidebar1'); ?>
          </div><!-- /well -->
          <div class="well">
	  <?php $sys_page->set_position('sidebar2'); ?>
          </div><!-- /well -->
          
        </div>
      </div>
      
      <hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Sarkesh LTD 2013</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

  </body>
</html>