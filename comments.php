<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="ltn__comment-inner">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="title-2">
			<?php
			$compara_inmuebles_comment_count = get_comments_number();
			if ( '1' === $compara_inmuebles_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One Comment', 'compara-inmuebles' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comments', '%1$s Comments', $compara_inmuebles_comment_count, 'comments title', 'compara-inmuebles' ) ),
					number_format_i18n( $compara_inmuebles_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ul>
			<?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'compara-inmuebles' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	?>
	<hr>
	<?php
	$args_comments_form = array(
    'title_reply' => '<h4 class="title-2">Post Comment</h4>',
    'fields' => array(
        'author' => '<div class="input-item input-item-name ltn__custom-icon">' . 
                    '<input type="text" placeholder="Type your name...." name="author" id="author" required>' . 
                    '</div>',
        'email' => '<div class="input-item input-item-email ltn__custom-icon">' . 
                   '<input type="email" placeholder="Type your email...." name="email" id="email" required>' . 
                   '</div>',
        'url' => '<div class="input-item input-item-website ltn__custom-icon">' . 
                 '<input type="text" placeholder="Type your website...." name="url" id="url">' . 
                 '</div>',
    ),
    'comment_field' => '<div class="input-item input-item-textarea ltn__custom-icon">' .
                       '<textarea placeholder="Type your comments...." name="comment" id="comment" required></textarea>' . 
                       '</div>',
    'class_submit' => 'btn theme-btn-1 btn-effect-1 text-uppercase',
    'label_submit' => 'Post Comment',
	);
	?>
	<div class="ltn__comment-reply-area ltn__form-box mb-60---">
	<?php
		comment_form($args_comments_form);
	?>
	</div><!-- #comments -->
</div><!-- #comments -->
