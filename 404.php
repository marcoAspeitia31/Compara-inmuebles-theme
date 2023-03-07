<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Compara_inmuebles
 */

get_header();
?>

	<main id="primary" class="site-main">

		<!-- BREADCRUMB AREA START -->
		<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="img/bg/14.jpg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="ltn__breadcrumb-inner">
							<h1 class="page-title">404 Page</h1>
							<div class="ltn__breadcrumb-list">
								<ul>
									<li><a href="<?php echo esc_attr( esc_url( home_url( '/' ) ) );?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
									<li>404</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- BREADCRUMB AREA END -->

		<section class="error-404 not-found ltn__404-area ltn__404-area-1 mb-120">

			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="error-404-inner text-center">
							<div class="error-img mb-30">
								<img src="<?php echo esc_attr( esc_url( get_template_directory_uri(  ) ) );?>/assets/img/others/error-404.png" alt="Error 404 compara inmuebles">
							</div>
							<h1 class="error-404-title d-none">404</h1>
							<h2>Page Not Found!</h2>
							<!-- <h3>Oops! Looks like something going rong</h3> -->
							<p>Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
							<div class="btn-wrapper">
								<a href="<?php echo esc_attr( esc_url( home_url( '/' ) ) );?>" class="btn btn-transparent"><i class="fas fa-long-arrow-alt-left"></i> BACK TO HOME</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section><!-- .error-404 -->

	</main><!-- #main -->

    <!-- 404 area start -->
    <div class="ltn__404-area ltn__404-area-1 mb-120">
        
    </div>
    <!-- 404 area end -->

<?php
get_footer();
