



<nav class="navbar yamm navbar-default " role="navigation">

     <ul class="nav navbar-nav">
       <li class="dropdown">
	<?php $counter1=-1; if( isset($parent_menus) && is_array($parent_menus) && sizeof($parent_menus) ) foreach( $parent_menus as $key1 => $value1 ){ $counter1++; ?>

		<a href=".<?php echo $value1["url"];?>" class="dropdown-toggle" data-toggle="dropdown"><?php echo $value1["label"];?></a>
		
			<?php $counter2=-1; if( isset($user_list) && is_array($user_list) && sizeof($user_list) ) foreach( $user_list as $key2 => $value2 ){ $counter2++; ?>

			<?php echo $key2;?> - <?php echo $value2["name"];?></br>
		
				<ul class="dropdown-menu">
				  <li>
				      <div class="yamm-content">
					  <div class="row"> 
					    اطلاعات اضافی 				bmw
				  </li>
				</ul>
		
		
			<?php } ?>

		  
		
		
	
	
		
	<?php } ?>

       
       </li>
     </ul>

</nav>












<nav class="navbar yamm navbar-default " role="navigation">

     <ul class="nav navbar-nav">
       <li class="dropdown">
         <a href=".#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
         <ul class="dropdown-menu">
           <li>
               <div class="yamm-content">
                  <div class="row"> 
                    اطلاعات اضافی bmw
           </li>
         </ul>
       </li>
     </ul>

</nav>

<ul class="nav navbar-nav">
            <li><a href=".#about">Download</a></li>
            <li><a href=".#services">Plugins</a></li>
            <li><a href=".#contact">Themes</a></li>
            <li><a href=".#contact">About</a></li>
            <li><a href=".#contact">Contact</a></li>

</ul>