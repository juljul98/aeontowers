<?php 
/**
 * Search form for the mobile menu
 *
 * @package Definity
 * @version 2.0
 */

 ?>

 <form action="/" method="get" class="mobile-menu-search mm-search-off">
 	<div class="form-content">
 		<span class="form-close"><i class="fa fa-times"></i></span>
 		<input type="search" name="s" id="d-mm-search-field" class="form-control" placeholder="<?php esc_html_e( 'Type search term...', 'definity' ); ?>" value="<?php the_search_query(); ?>" />
 		<button class="mobile-menu-search-submit-bnt"><i class="fa fa-search"></i></button>
 	</div>
 </form>