<?php
/**
 * Display a inmueble for inmuebles list
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>
<div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
  <div class="product-img">
    <a href="<?php the_permalink( );?>"><?php the_post_thumbnail( 'grid-inmueble', array( 'class' => 'img-fluid' ) ); ?></a>
  </div>
  <div class="product-info">
    <div class="product-badge">
      <ul>
      <?php
      $estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
      if ( $estados_de_inmueble ) :
        $term_1 = array_shift( $estados_de_inmueble );
        $term_1_name = $term_1->name;
      ?>
        <li class="sale-badg"><?php echo esc_html($term_1_name); ?></li>
      <?php
      endif;	
      ?>
      </ul>
    </div>
    <h2 class="product-title"><a href="<?php the_permalink( );?>"><?php the_title( ); ?></a></h2>
    <div class="product-img-location">
      <ul>
        <li>
          <i class="flaticon-pin"></i> <?php echo esc_html( get_post_meta( get_the_ID(  ), 'locality', true ) );?>
        </li>
      </ul>
    </div>
    <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
      <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_numero_cuartos', true ) ); ?></span>
        Recámaras
      </li>
      <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_numero_banos', true ) ); ?></span>
        Baños
      </li>
      <li><span><?php echo esc_html( get_post_meta( get_the_ID(), 'field_tamano_construccion', true ) ); ?></span>
        m²
      </li>
    </ul>
    <div class="product-hover-action">
      <ul>
        <li>
          <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
            <i class="flaticon-expand"></i>
          </a>
        </li>
        <li>
          <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
            <i class="flaticon-heart-1"></i>
          </a>
        </li>
        <li>
          <a href="<?php the_permalink( ); ?>" title="Product Details">
            <i class="flaticon-add"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="product-info-bottom">
    <div class="product-price">
      <?php
      $field_precio = get_post_meta(get_the_ID(),'field_precio',true);
      $precio = $field_precio ? '$'.number_format($field_precio,2,'.',',') : 'Sin precio publicado';
      ?>
      <span><?php echo esc_html($precio); ?><label></label></span>
    </div>
  </div>
</div>