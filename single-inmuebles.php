<?php
  get_header();
  while(have_posts(  )):the_post(  );
  set_post_views(get_the_ID());
  get_template_part('template-parts/content','breadcrumb');?>
  <!-- IMAGE SLIDER AREA START (img-slider-3) -->
  <div class="ltn__img-slider-area mb-90" style='margin-top: -120px;'>
        <div class="container-fluid">
            <div class="row ltn__image-slider-5-active slick-arrow-1 slick-arrow-1-inner ltn__no-gutter-all">
            <?php 
                $imagenes = get_post_meta(get_the_ID(),'field_imagenes_slider',true);
                foreach ($imagenes as $id=>$imagen){
                ?>
                <div class="col-lg-12">
                    <div class="ltn__img-slide-item-4">
                        <a href="<?php echo esc_url($imagen); ?>" data-rel="lightcase:myCollection">
                            <img src="<?php echo esc_url(wp_get_attachment_image_url($id, 'inmueble-slider')); ?>" alt="Imagen slide">
                        </a>
                    </div>
                </div>
              <?php
                }
              ?>
            </div>
        </div>
    </div>
    <!-- IMAGE SLIDER AREA END -->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="ltn__shop-details-inner ltn__page-details-inner mb-60">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-category">
                                    <a href="#">Featured</a>
                                </li>
                                <li class="ltn__blog-category">
                                  <?php
                                    $est_inm = get_the_terms(get_the_ID(), 'estados_de_inmueble');
                                    $term_1 = array_shift($est_inm);
                                    $tipo_inm = get_the_terms(get_the_ID(), 'tipos_inmuebles');
                                    $term_2 = array_shift($tipo_inm);
                                  ?>
                                    <a class="bg-orange" href="<?php echo esc_url(get_term_link($term_1->term_id)); ?>"><?php echo $term_1->name; ?></a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i><?php echo get_the_date("F j, Y", get_the_ID()) ?>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i><?php echo get_comments_number(get_the_ID());?> Comentarios</a>
                                </li>
                            </ul>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> <?php echo get_post_meta(get_the_ID(), 'inmueble_direccion', true); ?></label>
                        <h4 class="title-2">Descripción</h4>
                        <p><?php the_content(); ?></p>

                        <h4 class="title-2">Property Detail</h4>  
                        <div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
                            <ul>
                                <li><label>Property ID:</label> <span>HZ29</span></li>
                                <li><label>Tamaño construcción: </label> <span><?php echo get_post_meta(get_the_ID(),'field_tamano_construccion',true); ?>  m²</span></li>
                                <li><label>Cuartos:</label> <span><?php echo get_post_meta(get_the_ID(),'field_numero_cuartos',true); ?> </span></li>
                                <li><label>Baños:</label> <span><?php echo get_post_meta(get_the_ID(),'field_numero_banos',true); ?> </span></li>
                                <li><label>Año de construcción:</label> <span><?php echo get_post_meta(get_the_ID(),'field_ano_construccion',true); ?></span></li>
                            </ul>
                            <ul>
                                <li><label>Lot Area:</label> <span>HZ29 </span></li>
                                <li><label>Tamaño terreno:</label> <span><?php echo get_post_meta(get_the_ID(),'field_tamano_terreno',true); ?>  m²</span></li>
                                <li><label>Recamaras:</label> <span><?php echo get_post_meta(get_the_ID(),'field_numero_recamaras',true); ?></span></li>
                                <li><label>Precio:</label> <span>$<?php echo get_post_meta(get_the_ID(),'field_precio',true); ?></span></li>
                                <li><label>Status de la propiedad:</label> <span><?php echo $term_1->name; ?></span></li>
                            </ul>
                        </div>
                                        
                        <h4 class="title-2">Facts and Features</h4>
                        <div class="property-detail-feature-list clearfix mb-45">                            
                            <ul>
                                <?php
                                    $features = get_post_meta(get_the_ID(),'grupo_facts_features',true);
                                    foreach ($features as $feature){
                                    ?>
                                <li>
                                    <div class="property-detail-feature-list-item">
                                        <i class="<?php echo esc_attr($feature['iconselect']); ?>"></i>
                                        <div>
                                            <h6><?php echo $feature['feature']; ?></h6>
                                            <small><?php echo $feature['desc']; ?></small>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>

                        <h4 class="title-2">From Our Gallery</h4>
                        <div class="ltn__property-details-gallery mb-30">
                            <div class="row">
                                <?php 
                                $imagenes = get_post_meta(get_the_ID(),'field_galeria_imagenes',true);
                                $i_col_img = 0;
                                $i_col_img_gnr = 0;
                                foreach ($imagenes as $id=>$imagen){
                                    if ($i_col_img == 0){
                                ?>
                                <div class="col-md-6">
                                <?php
                                    }
                                ?>
                                    <?php
                                        if(($i_col_img_gnr+1)%3 == 0 && $i_col_img_gnr != 0){
                                            $i_col_img =2;
                                            ?>
                                            <a href="<?php echo esc_url($imagen); ?>" data-rel="lightcase:myCollection">
                                                <img class="mb-30" src="<?php echo esc_url(wp_get_attachment_image_url($id, 'inmueble-galeria-2'));; ?>" alt="Image">
                                            </a>
                                    <?php        
                                        }
                                        else{
                                            $i_col_img++;
                                            ?>
                                            <a href="<?php echo esc_url($imagen); ?>" data-rel="lightcase:myCollection">
                                                <img class="mb-30" src="<?php echo esc_url(wp_get_attachment_image_url($id, 'inmueble-galeria-1'));; ?>" alt="Image">
                                            </a>
                                    <?php 
                                        }
                                  $i_col_img_gnr++;
                                  if ($i_col_img == 2 || end($imagenes) == $imagen){
                                    $i_col_img = 0;
                                    ?>
                                </div>
                                <?php
                                  }
                                }
                                ?>
                                <div class="col-md-6">
                                    <a href="img/others/16.jpg" data-rel="lightcase:myCollection">
                                       <img class="mb-30" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'inmueble-galeria-2')); ?>" alt="Imagen grande galeria" >
                                    </a>
                                </div>
                            </div>
                        </div>

                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                <?php
                                $amenidades = get_the_terms(get_the_ID(), 'areas_amenidades');
                                $i_col = 0;
                                foreach($amenidades as $amenidad){
                                    if ($i_col == 0){
                                ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="ltn__menu-widget">
                                            <ul>
                                    <?php
                                        }
                                    ?>
                                                <li>
                                                    <label class="checkbox-item"><?php echo $amenidad->name; ?>
                                                        <input type="checkbox" checked="checked">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                <?php
                                        $i_col++;
                                if ($i_col == 5 || end($amenidades)->term_id == $amenidad->term_id){
                                    $i_col = 0;
                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php
                                    }                                
                                }
                                ?>
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60">
                            <iframe src="https://maps.google.com/maps?q=<?php echo get_post_meta(get_the_ID(),'field_location', true)['latitude']; ?>,<?php echo get_post_meta(get_the_ID(),'field_location', true)['longitude']; ?>&hl=es&z=14&amp;output=embed" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>

                        <h4 class="title-2">Floor Plans</h4>
                        <!-- APARTMENTS PLAN AREA START -->
                        <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60">
                            <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
                                <div class="nav">
                                    <?php
                                        $planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
                                        $i_planos = 1;
                                        foreach ($planos as $plano){
                                            ?>
                                    <a data-toggle="tab" class="<?php echo esc_attr( ($i_planos == 1) ? 'active show' : '' ); ?>" href="#liton_tab_3_<?php echo esc_attr($i_planos); ?>"><?php echo $plano['nombre']; ?></a>

                                    <?php
                                        $i_planos++;  
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="tab-content">
                                <?php
                                    $planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
                                    $i_planos = 1;
                                    foreach ($planos as $plano){
                                        ?>
                                        <div class="tab-pane fade <?php echo esc_attr( ($i_planos == 1) ? 'active show' : '' ); ?>" id="liton_tab_3_<?php echo esc_attr($i_planos);?>">
                                            <div class="ltn__apartments-tab-content-inner">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="apartments-plan-img">
                                                            <img src="<?php echo esc_url($plano['image']); ?>" alt="#">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                            <h2><?php echo $plano['nombre']; ?></h2>
                                                            <p><?php echo $plano['desc']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="product-details-apartments-info-list  section-bg-1">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                        <ul>
                                                                            <li><label>Total Area</label> <span><?php echo $plano['area']; ?> m²</span></li>
                                                                            <li><label>Bedroom</label> <span><?php echo $plano['recamara']; ?> m²</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                        <ul>
                                                                            <li><label>Belcony/Pets</label> <span><?php echo $plano['mascotas']; ?></span></li>
                                                                            <li><label>Lounge</label> <span><?php echo $plano['salon']; ?> m²</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $i_planos++;
                                    }
                                ?>
                            </div>
                        </div>
                        <!-- APARTMENTS PLAN AREA END -->

                        <h4 class="title-2">Property Video</h4>
                        <?php
                        $video = get_post_meta( get_the_ID(),'field_video' , true);
                        $oembed = new WP_oEmbed();
                        $video_data =$oembed->get_data($video);
                        $url_embed = preg_replace(
                            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                            "www.youtube.com/embed/$2",
                            $video);
                        ?>
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60" data-bg="<?php echo esc_url($video_data->thumbnail_url); ?>">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="<?php echo esc_url($url_embed).'?autoplay=1&showinfo=0'; ?>" data-rel="lightcase:myCollection">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                        <div class="ltn__shop-details-tab-content-inner--- ltn__shop-details-tab-inner-2 ltn__product-details-review-inner mb-60">
                            <h4 class="title-2">Customer Reviews</h4>
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
                            <hr>
                            <!-- comment-area -->
                            <div class="ltn__comment-area mb-30">
                                <div class="ltn__comment-inner">
                                    <ul>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/1.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 3, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/3.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ltn__comment-item clearfix">
                                                <div class="ltn__commenter-img">
                                                    <img src="img/testimonial/2.jpg" alt="Image">
                                                </div>
                                                <div class="ltn__commenter-comment">
                                                    <h6><a href="#">Adam Smit</a></h6>
                                                    <div class="product-ratting">
                                                        <ul>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, omnis fugit corporis iste magnam ratione.</p>
                                                    <span class="ltn__comment-reply-btn">September 2, 2020</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- comment-reply -->
                            <div class="ltn__comment-reply-area ltn__form-box mb-30">
                                <form action="#">
                                    <h4>Add a Review</h4>
                                    <div class="mb-30">
                                        <div class="add-a-review">
                                            <h6>Your Ratings:</h6>
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
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea placeholder="Type your comments...."></textarea>
                                    </div>
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" placeholder="Type your name....">
                                    </div>
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" placeholder="Type your email....">
                                    </div>
                                    <div class="input-item input-item-website ltn__custom-icon">
                                        <input type="text" name="website" placeholder="Type your website....">
                                    </div>
                                    <label class="mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label>
                                    <div class="btn-wrapper">
                                        <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <h4 class="title-2">Related Properties</h4>
                        <div class="row">
                          <?php
                            compara_inmuebles_inmuebles(2,array(array('taxonomy' => 'estados_de_inmueble', 'field' => 'slug', 'terms' => $term_1->slug)), array(get_the_ID()));
                          ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar( 'inmuebles-single' ); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- CALL TO ACTION START (call-to-action-6) -->
    <div class="ltn__call-to-action-area call-to-action-6 before-bg-bottom" data-bg="img/1.jpg--">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call-to-action-inner call-to-action-inner-6 ltn__secondary-bg text-center---">
                        <div class="coll-to-info text-color-white">
                            <h1>Looking for a dream home?</h1>
                            <p>We can help you realize your dream of a new home</p>
                        </div>
                        <div class="btn-wrapper">
                            <a class="btn btn-effect-3 btn-white" href="<?php echo esc_url(get_permalink(get_page_by_path( 'contacto'))); ?>">Explore Properties <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->
  <?php
  endwhile;
  get_footer();