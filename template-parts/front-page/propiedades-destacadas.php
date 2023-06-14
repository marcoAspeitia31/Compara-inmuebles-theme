<?php
/**
 * Template part for displaying propiedades destacadas in front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$cant_inmuebles = get_post_meta(get_the_ID(), 'cantidad_inmuebles_dest',true) ? get_post_meta(get_the_ID(), 'cantidad_inmuebles_dest',true) : 5 ;
$query_args = array(
  'post_type' => 'inmuebles',
  'posts_per_page' => $cant_inmuebles,
  'meta_key' => 'post_views_count',
  'orderby' => 'meta_value_num',
  'order' => 'DESC',
);
$inmuebles = new WP_Query($query_args);
if (!empty($inmuebles)):
?>
<div class="ltn__product-slider-area ltn__product-gutter pt-115 bg-8 pb-90 plr--7">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2--- text-center">
                    <h6 class="section-subtitle section-subtitle-2 text-white">Propiedades</h6>
                    <h1 class="section-title">Propiedades destacadas</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
            <!-- ltn__product-item -->
            <?php
            while ($inmuebles->have_posts()): $inmuebles->the_post();
            ?>
            <div class="col-lg-12">
                <div class="ltn__product-item ltn__product-item-4 text-center---">
                    <div class="product-img">
                        <a href="<?php esc_attr( esc_url( the_permalink() ) ); ?>">
                            <?php the_post_thumbnail( 'grid-inmueble', array( 'class' => 'img-fluid' ) );?>
                        </a>
                        <div class="product-badge">
                            <ul>
                            <?php
                            $estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
                            if ( $estados_de_inmueble ) :
                                $term_1 = array_shift( $estados_de_inmueble );
                                $term_1_name = $term_1->name;
                                $bg = $term_1->slug == 'renta' ? 'bg-purple' : '';
                            ?>
                                <a href="<?php echo esc_url(esc_attr(get_term_link($term_1->term_id))) ?>"><li class="sale-badge <?php echo esc_attr($bg); ?>"><?php echo esc_html( 'EN '.$term_1_name); ?></li></a>
                            <?php endif;?>
                            </ul>
                        </div>
                        <div class="product-img-location-gallery">
                            <div class="product-img-location">
                                <ul>
                                    <li>
                                        <i class="flaticon-pin"></i> <?php echo esc_html( get_post_meta( get_the_ID(  ), 'locality', true ) );?>
                                    </li>
                                </ul>
                            </div>
                            <div class="product-img-gallery">
                                <ul>
                                    <?php
                                        $galeria = get_post_meta(get_the_ID(),'field_galeria_imagenes',true);
                                        if(!empty($galeria)):
                                    ?>
                                    <li>
                                        <a href="<?php esc_url(the_permalink()) ?>"><i class="fas fa-camera"></i> <?php echo esc_html(count($galeria)); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php
                                    $video = get_post_meta( get_the_ID(),'field_video' , true);
                                    if(!empty($video)):
                                    ?>
                                    <li>
                                        <a href="<?php esc_url(the_permalink()) ?>"><i class="fas fa-film"></i> 1</a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-price">
                          <?php
                          $field_precio = get_post_meta(get_the_ID(),'field_precio',true);
                          $precio = $field_precio ? '$'.number_format($field_precio,2,'.',',') : 'Sin precio publicado';
                          ?>
                          <span><?php echo esc_html($precio); ?></span>
                        </div>
                        <h2 class="product-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title( ); ?></a></h2>
                        <div class="product-description">
                            <p><?php echo wp_trim_excerpt(get_the_excerpt()); ?></p>
                        </div>
                        <ul class="ltn__list-item-2 ltn__list-item-2-before">
                            <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_numero_cuartos', true ) ); ?> <i class="flaticon-bed"></i></span>
                                Cuartos
                            </li>
                            <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_numero_banos', true ) ); ?> <i class="flaticon-clean"></i></span>
                                Baños
                            </li>
                            <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_tamano_construccion', true ) ); ?> <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                m²
                            </li>
                        </ul>
                    </div>
                    <div class="product-info-bottom"> 
                        <div class="product-hover-action">
                            <ul>
                                <li>
                                    <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                                        <i class="flaticon-expand"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                        <i class="flaticon-heart-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?php esc_url(the_permalink()) ?>" title="Product Details">
                                        <i class="flaticon-add"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            endwhile; wp_reset_postdata(  );
            ?>
            <!-- ltn__product-item -->
        </div>
    </div>
</div>
<?php
endif;