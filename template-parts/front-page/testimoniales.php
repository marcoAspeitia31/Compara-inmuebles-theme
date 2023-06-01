<?php
/**
 * Template part for displaying testimoniales part in front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$imagen_fondo = get_post_meta(get_the_ID(), 'imagen_testimonial',true);
$query_args = array(
    'post_type' => 'testimonios',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$testimonios = new WP_Query($query_args);
if ($testimonios->have_posts() && !empty($testimonios)):
?>
<div class="ltn__testimonial-area section-bg-1--- bg-image-top pt-115 pb-0" data-bg="<?php echo esc_attr(esc_url($imagen_fondo)); ?>">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title-area ltn__section-title-2--- text-center">
                  <h6 class="section-subtitle section-subtitle-2 text-white">Testimoniales</h6>
                  <h1 class="section-title white-color">Comentarios de clientes</h1>
              </div>
          </div>
      </div>
      <div class="row ltn__testimonial-slider-6-active slick-arrow-1 mt-60">
        <?php
        while($testimonios->have_posts()): $testimonios->the_post();
        ?>
          <div class="col-lg-12">
              <div class="ltn__testimonial-item ltn__testimonial-item-7 ltn__testimonial-item-8">
                  <div class="ltn__testimoni-info">
                      <div class="ltn__testimoni-author-ratting">
                          <div class="ltn__testimoni-info-inner">
                              <div class="ltn__testimoni-img">
                                  <img src="<?php echo esc_attr(esc_url(get_post_meta(get_the_ID(),'imagen',true))); ?>" alt="#">
                              </div>
                              <div class="ltn__testimoni-name-designation">
                                  <h5><?php the_title(); ?></h5>
                                  <label><?php echo esc_html(get_post_meta(get_the_ID(),'puesto_testimonio',true)); ?></label>
                              </div>
                          </div>
                          <div class="ltn__testimoni-rating">
                              <div class="product-ratting">
                                  <ul>
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                      <li><a href="#"><i class="fas fa-star"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <p><?php the_content(); ?></p>
                  </div>
              </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
  </div>
</div>
<?php
endif;