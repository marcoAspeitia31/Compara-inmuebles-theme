<?php
function compara_inmuebles_inmuebles($cantidad = -1, $tax_args =array(), $post_not_in = array()){
  $args = array(
    'post_type' => 'inmuebles',
    'posts_per_page' => $cantidad,
    'tax_query' => $tax_args,
    'post__not_in' => $post_not_in,
  );

  $inmuebles = new WP_Query($args);

  while ($inmuebles->have_posts()): $inmuebles->the_post();
    ?>
    <!-- ltn__product-item -->
    <div class="col-xl-6 col-sm-6 col-12">
      <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
        <div class="product-img">
          <a href="<?php esc_url(the_permalink()) ?>">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'grid-inmueble'); ?>" alt="Imagen destacada del inmueble">
        </a>
          <div class="real-estate-agent">
            <div class="agent-img">
              <a href="team-details.html"><img src="img/blog/author.jpg" alt="#"></a>
            </div>
          </div>
        </div>
        <div class="product-info">
          <div class="product-badge">
            <ul>
              <?php
              $terms = get_the_terms(get_the_ID(), 'estados_de_inmueble');
              $term = array_shift($terms);
              ?>
              <li class="sale-badg"><?php echo $term->name; ?></li>
            </ul>
          </div>
          <h2 class="product-title"><a href="<?php esc_url(the_permalink()) ?>"><?php the_title(); ?></a></h2>
          <div class="product-img-location">
            <ul>
              <li>
                <a href="locations.html"><i class="flaticon-pin"></i><?php echo get_post_meta(get_the_ID(), 'inmueble_direccion',true); ?></a>
              </li> 
            </ul>
          </div>
          <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
            <li><span><?php echo get_post_meta(get_the_ID(),'field_numero_cuartos',true); ?> </span>
              Rec
            </li>
            <li><span><?php echo get_post_meta(get_the_ID(),'field_numero_banos',true); ?>  </span>
              Baños
            </li>
            <li><span><?php echo get_post_meta(get_the_ID(),'field_tamano_construccion',true); ?> </span>
              m²
            </li>
          </ul>
          <div class="product-hover-action">
            <ul>
              <li>  
                <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal<?php echo esc_attr(get_the_ID());?>">
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
        <div class="product-info-bottom">
          <div class="product-price">
            <span>$<?php echo get_post_meta(get_the_ID(),'field_precio',true); ?><label>/Month</label></span>
          </div>
        </div>
      </div>
    </div>
    <!-- ltn__product-item -->
    <!-- MODAL AREA START (Quick View Modal) -->
    <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal<?php echo esc_attr( get_the_ID() ) ;?>" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                          <?php the_post_thumbnail( 'full', array('class'=>'img-fluid')); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h3><?php the_title(); ?></h3>
                                            <div class="product-price">
                                                <span>$<?php echo get_post_meta(get_the_ID(),'field_precio',true); ?></span>
                                                <del>$165.00</del>
                                            </div>
                                            <div class="modal-product-meta ltn__product-details-menu-1">
                                                <ul>
                                                    <li>
                                                        <strong>Categories:</strong> 
                                                        <span>
                                                          <?php
                                                            //Obtener las categorias
                                                            $est_inm = get_the_terms(get_the_ID(), 'estados_de_inmueble');
                                                            $term_1 = array_shift($est_inm);
                                                            $tipo_inm = get_the_terms(get_the_ID(), 'tipos_inmuebles');
                                                            $term_2 = array_shift($tipo_inm);
                                                          ?>
                                                            <a href="<?php echo esc_url(get_term_link($term_1->term_id)); ?>"><?php echo $term_1->name; ?></a>
                                                            <a href="<?php echo esc_url(get_term_link($term_2->term_id)); ?>"><?php echo $term_2->name; ?></a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                                                            <i class="fas fa-shopping-cart"></i>
                                                            <span>ADD TO CART</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->
    
  <?php

  endwhile; wp_reset_postdata(  );
}