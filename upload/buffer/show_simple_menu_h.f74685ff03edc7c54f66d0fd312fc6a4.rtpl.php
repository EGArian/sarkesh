 <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
	      <?php $counter1=-1; if( isset($links) && is_array($links) && sizeof($links) ) foreach( $links as $key1 => $value1 ){ $counter1++; ?>

	      
	      <li><a href=".<?php echo $value1["url"];?>"><?php echo $value1["label"];?></a></li>

	      <?php } ?>

              
            </ul>
</div>