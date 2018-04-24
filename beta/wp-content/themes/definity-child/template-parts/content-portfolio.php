<?php
/**
 * Template part for single portfolio post.
 *
 * @package Definity
 * @version 2.0
 */
?>
	
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

		the_content(); 

	?>
</div>