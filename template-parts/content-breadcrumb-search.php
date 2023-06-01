<?php
/**
 * Template part for displaying breadcrumb for search
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 */
$search_query = get_search_query();
$resultados = have_posts(  ) ? $wp_query->found_posts : 0;
if (get_the_post_thumbnail_url(get_the_ID())){
	$imagen = get_the_post_thumbnail_url(get_the_ID());
}
else{
	$imagen = cmb2_get_option('compara_inmuebles_theme_options', 'breadcrumb') ? cmb2_get_option('compara_inmuebles_theme_options', 'breadcrumb'): get_template_directory_uri(  )."/assets/img/bg/14.jpg";
}
?>
<div class="ltn__utilize-overlay"></div>
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bg="<?php echo esc_url(esc_attr($imagen)); ?>" >
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ltn__breadcrumb-inner">
          <h1 class="page-title"><?php echo esc_html($resultados.' Resultados para: '.$search_query); ?></h1>
          <div class="ltn__breadcrumb-list">
            <ul>
              <li><a href="<?php echo esc_url( home_url('/')); ?>"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
              <li><?php echo esc_html($resultados.' Resultados para: '.$search_query); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	<!-- BREADCRUMB AREA END -->
