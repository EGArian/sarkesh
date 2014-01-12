<!DOCTYPE html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $sys_page->load_headers();?>

<title></#PAGE_TITTLE#/></title>
</head>
<body>
<div id="page" class="page">
	<div id="header-menu" class="row">
		<div class="col-md-12">
			<div id="menu_tab">                                     
				<ul class="menu">                                                                               
				<li><a href="./" class="nav_selected"> Home </a></li>
				<li class="divider">|</li>
				<li><a href="#" class="nav"> Themes </a></li>
				<li class="divider">|</li>
				<li><a href="projects.html" class="nav"> Plugins </a></li>
				<li class="divider">|</li>
				<li><a href="#" class="nav"> Download </a></li>
				<li class="divider">|</li>
				<li><a href="contact.html" class="nav"> Forums </a></li>
				</ul>
			</div> 
		</div>
	</div>
	
	<div id="main" class="row main">
		<div class="col-md-9">
			<p>
			Sarkesh is a php framework. with that you can create high traffic sites with high performenc in short time.Sarkesh is based on OOP and has some inner librarry for do something.
			</p>
			<?php $sys_page->set_position('content');?>
		</div>
		<div class="col-md-3">
			<?php $sys_page->set_position('sidebar1');?>
			<?php $sys_page->set_position('sidebar2');?> 
		</div>			
	</div>
	
</div>
</body>
</html>