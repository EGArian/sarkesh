<!DOCTYPE html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php $sys_page->load_headers();?>

<title></#PAGE_TITTLE#/></title>


<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
</head>
<body>

<div id="main_container">
     <div id="header">
    <div class="logo">

    </div>
    
    </div>
    
            <div id="menu_tab">                                     
                    <ul class="menu">                                                                               
                         <li><a href="./" class="nav_selected"> Home </a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav"> Themes </a></li>
                         <li class="divider"></li>
                         <li><a href="projects.html" class="nav"> Plugins </a></li>
                         <li class="divider"></li>
                         <li><a href="#" class="nav"> Download </a></li>
                         <li class="divider"></li>
                         <li><a href="contact.html" class="nav"> Forums </a></li>

                    </ul>
            </div> 
            
            
    <div id="main_content">
    
    	<div id="middle_banner">
        	<div class="middle_banner_content">
       			 <img src="./themes/beez/images/banner_content.png" alt="" title="" width="417" height="142" />
            </div>
        </div>
        
        
        <div id="left_content">
        <h1>About Sarkesh</h1>
        <p>
        Sarkesh is a php framework. with that you can create high traffic sites with high performenc in short time.Sarkesh is based on OOP and has some inner librarry for do something.
        </p>
        <?php $sys_page->set_position('content');?>   
        </div>
    
        <div id="right_content"> 
 	
	  <?php $sys_page->set_position('sidebar1');?>
	
         <?php $sys_page->set_position('sidebar2');?> 
                   
        
        </div>
        
               

    <div id="footer"> © 2013 Negareh Sarkesh Ltd. Sarkesh is registered trademarks of Negareh Sarkesh Ltd. <br />
    <?php $sys_page->set_position('footer');?>
    </div>
    </div>

</div>
</body>
</html>