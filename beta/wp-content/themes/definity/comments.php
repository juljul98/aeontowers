<?php
/**
 * The template for displaying comments & comment form
 *
 * @package Definity
 * @version 1.0
 */

if ( post_password_required() ) {
	return;
}
?>
<div class="row">
	<div id="comments" class="col-md-12 comments-area">

		<?php
		// You can start editing here -- including this comment!
		if ( have_comments() ) : ?>
			<h4 class="comments-title">
				<?php
					printf( // WPCS: XSS OK.
						esc_html( _nx( 'Comment', 'Comments (%1$s)', get_comments_number(), 'comments title', 'definity' ) ),
						number_format_i18n( get_comments_number() ),
						'<span>' . get_the_title() . '</span>'
					);
				?>
			</h4>


			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 60
					) );
				?>
			</ol><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation post-navigation">
				<h4 class="screen-reader-text hide"><?php esc_html_e( 'Comment navigation', 'definity' ); ?></h4>
				<div class="nav-links">
					<div class="nav-previous">
						<?php previous_comments_link( '<span class="linea-arrows-slim-left"></span>' . esc_html__( 'Older Comments', 'definity' ) ); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link( esc_html__( 'Newer Comments', 'definity' ) . '<span class="linea-arrows-slim-right"></span>' ); ?>
					</div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php
			endif; // Check for comment navigation.

		endif; // Check for have_comments().


		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'definity' ); ?></p>
		<?php
		endif;


		// Leave a replay
		$req 		= get_option( 'require_name_email' );
		$aria_req 	= ( $req ? " aria-required='true'" : '' );
		$comments_args = array(
	        'class_submit'			=> 'btn pull-right btn-submit-comment',
	        'title_reply_before'	=> '<h4 id="reply-title" class="comment-reply-title">',
	        'title_reply_after'		=> '</h4>',
	        'comment_notes_after' 	=> '',

	        'comment_field' 		=> '<div class="comment-form-comment col-md-12 form-group no-gap">' . '<label for="comment">' . esc_attr_x( 'Comment', 'noun', 'definity' ) . '</label>' . ( $req ? '<span>*</span>' : '' ) . '<textarea id="comment" class="form-control" name="comment" aria-required="true" placeholder="Your comment"></textarea></div>',

	        'fields' => apply_filters( 'comment_form_default_fields', array(

	        	'author' => '<div class="comment-form-author col-md-6 form-group no-gap-left"><label for="author">' . esc_attr__( 'Name', 'definity' ) . '</label>' . ( $req ? '<span>*</span>' : '' ) . '<input id="author" class="form-control" name="author" type="text" placeholder="Enter your name"/></div>',

	            'email'  => '<div class="comment-form-email col-md-6 form-group no-gap-right"><label for="email">' . esc_attr__( 'Email', 'definity' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) . '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="Enter your email" /></div>',

	            'url'    => '' ) 
	        ),
		);
		comment_form( $comments_args ); ?>

	</div><!-- #comments .col-md-12 -->
</div><!-- / .row -->