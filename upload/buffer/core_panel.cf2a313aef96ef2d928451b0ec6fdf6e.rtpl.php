<!DOCTYPE html>
    <head>
    <?php echo $page_headers;?>
    <title><?php echo $page_title;?></title>
    </head>
    <body>
		<?php if( $single_panel ){ ?>
		<div class="container" style="width:40%;">
			<?php echo $page_content;?>
		</div>
		<?php } ?>
		<?php if( !$single_panel ){ ?>
			<?php echo $page_content;?>
		<?php } ?>
    </body>
</html>
