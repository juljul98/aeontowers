<?php 
/**
 * Search form for the header menu
 *
 * @package Definity
 * @version 2.0
 */

 ?>

<li class="menu-item">
	<a href="#" class="dropdown-toggle search-dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php esc_html_e( 'Search', 'definity' ); ?></a>
	<ul class="dropdown-menu search-dropdown search-lg">
		<li>
			<form action="/" method="get">
				<input type="search" name="s" id="d-nav-search-field" class="form-control" placeholder="<?php  esc_html_e( 'Type serach term...', 'definity' ); ?>" value="<?php  the_search_query(); ?>" />
				<div class="btn-group">
					<input type="submit" value="">
					<i class="fa fa-search"></i>
				</div>
			</form>
		</li>
	</ul>
</li>