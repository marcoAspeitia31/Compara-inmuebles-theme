<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 */

?>
	<div class="ltn__utilize-overlay"></div>
	<!-- BREADCRUMB AREA START -->
	<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/bg/14.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__breadcrumb-inner">
						<h1 class="page-title"><?php the_title(); ?></h1>
						<div class="ltn__breadcrumb-list">
							<ul>
								<li><a href="<?php echo esc_url( home_url('/')); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
								<li><?php the_title(); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- BREADCRUMB AREA END -->
