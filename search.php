<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Compara_inmuebles
 */

get_header();
get_template_part( 'template-parts/content', 'breadcrumb-search' );
?>

<?php if ( have_posts() ) : ?>

	<div class="ltn__blog-area mb-120">
		<div class="container">
				<div class="row">
						<div class="col-lg-8">
								<div class="ltn__blog-list-wrap">
										<?php
										while(have_posts(  )): the_post(  );
												get_template_part( 'template-parts/posts/post' );
										endwhile; 
										?>
								</div>
								<?php ci_pagination(); ?>
						</div>
						<div class="col-lg-4">
								<?php get_sidebar( 'blog' ); ?>
						</div>
				</div>
		</div>
</div>

<?php
else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>
<?php
get_footer();
