<!-- post -->
<div class="post">
            <p class="post-meta">
	      <span class="post-date" ><?php echo $post_date;?></span> <?php echo $by;?> 
	      <span class="post_author" ><a href=".<?php echo $post_author_profile;?>"><?php echo $post_author;?></a></span>
	    </p>

            <p class="post-body">
            <?php $counter1=-1; if( isset($post_content) && is_array($post_content) && sizeof($post_content) ) foreach( $post_content as $key1 => $value1 ){ $counter1++; ?>

	      <?php echo $value1["value"];?>

	    <?php } ?>

            </p>
          </div>
<!-- post -->