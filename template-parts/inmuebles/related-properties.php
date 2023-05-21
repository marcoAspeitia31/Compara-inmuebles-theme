<?php
/**
 * Display the property video of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
$term_1 = array_shift( $estados_de_inmueble );
$args = array(
  'post_type' => 'inmuebles',
  'posts_per_page' => 2,
  'tax_query' => array(array('taxonomy' => 'estados_de_inmueble', 'field' => 'slug', 'terms' => $term_1->slug)),
  'post__not_in' => array(get_the_ID()),
);
$inmuebles = new WP_Query($args);
if ($inmuebles):
?>
  <h4 class="title-2">Related Properties</h4>
  <div class="row">
    <?php while ($inmuebles->have_posts()): $inmuebles->the_post(); ?>
    <div class="col-xl-6 col-sm-6 col-12">
      <?php get_template_part( 'template-parts/inmuebles-list/inmueble'); ?>
    </div>
    <?php endwhile; ?>
  </div>
<?php
endif;
