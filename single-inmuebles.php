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

                if(! empty( $imagenes ) ) :

                    foreach ($imagenes as $id=>$imagen):
                    ?>

                    <div class="col-lg-12">
                        <div class="ltn__img-slide-item-4">
                            <a href="<?php echo esc_attr(esc_url($imagen)); ?>" data-rel="lightcase:myCollection">
                                <img src="<?php echo esc_attr(esc_url(wp_get_attachment_image_url($id, 'inmueble-slider'))); ?>" alt="Imagen slide">
                            </a>
                        </div>
                    </div>

                    <?php

                    endforeach;

                endif;
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
                                    $estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
                                    
                                    if ( $estados_de_inmueble ) :
                                        $term_1 = array_shift( $estados_de_inmueble );
                                        $print_term_1 = sprintf(
                                                '<a class="bg-orange" href=%s>%s</a>',
                                                esc_attr( esc_url( get_term_link( $term_1->term_id ) ) ),
                                                esc_html( $term_1->name )
                                            );
                                        $term_1_name = $term_1->name;
                                        echo $print_term_1;                                        
                                    endif;

                                    $tipos_inmuebles = get_the_terms(get_the_ID(), 'tipos_inmuebles');
                                    
                                    if ( $tipos_inmuebles ) :
                                        $term_2 = array_shift( $tipos_inmuebles );
                                    endif;

                                  ?>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i><?php echo esc_html(get_the_date("F j, Y", get_the_ID())); ?>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i><?php echo get_comments_number(get_the_ID());?> Comentarios</a>
                                </li>
                            </ul>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <label><span class="ltn__secondary-color"><i class="flaticon-pin"></i></span> <?php echo esc_html(get_post_meta(get_the_ID(), 'inmueble_direccion', true)); ?></label>
                        <h4 class="title-2">Descripción</h4>
                        <p><?php the_content(); ?></p>

                        <?php get_template_part( 'template-parts/inmuebles/property', 'details' ); ?>

                        <?php get_template_part( 'template-parts/inmuebles/facts', 'features' ); ?>

                        <?php get_template_part( 'template-parts/inmuebles/our', 'gallery' ); ?>


                        <h4 class="title-2 mb-10">Amenities</h4>
                        <div class="property-details-amenities mb-60">
                            <div class="row">
                                <?php
                                $amenidades = get_the_terms(get_the_ID(), 'areas_amenidades');
                                $i_col = 0;
                                if( ! empty( $amenidades ) ):
                                    foreach($amenidades as $amenidad) :
                                        if ($i_col == 0) :
                                        ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="ltn__menu-widget">
                                                <ul>
                                        <?php  endif;    ?>
                                                    <li>
                                                        <label class="checkbox-item"><?php echo esc_html($amenidad->name); ?>
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                    <?php
                                            $i_col++;
                                    if ($i_col == 5 || end($amenidades)->term_id == $amenidad->term_id):
                                        $i_col = 0;
                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php
                                        endif;                            
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>

                        <h4 class="title-2">Location</h4>
                        <div class="property-details-google-map mb-60">
                            <iframe src="https://maps.google.com/maps?q=<?php echo esc_attr(get_post_meta(get_the_ID(),'field_location', true)['latitude']); ?>,<?php echo esc_attr(get_post_meta(get_the_ID(),'field_location', true)['longitude']); ?>&hl=es&z=14&amp;output=embed" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>

                        <h4 class="title-2">Floor Plans</h4>
                        <!-- APARTMENTS PLAN AREA START -->
                        <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60">
                            <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
                                <div class="nav">
                                    <?php
                                        $planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
                                        $i_planos = 1;

                                        if ( ! empty( $planos ) ):
                                        foreach ($planos as $plano):
                                            ?>
                                            <a data-toggle="tab" class="<?php echo esc_attr(( ($i_planos == 1) ? 'active show' : '')); ?>" href="#liton_tab_3_<?php echo esc_attr($i_planos); ?>"><?php echo esc_html($plano['nombre']); ?></a>

                                            <?php
                                        $i_planos++;  
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="tab-content">
                                <?php
                                    $planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
                                    $i_planos = 1;
                                    foreach ($planos as $plano){
                                        ?>
                                        <div class="tab-pane fade <?php echo esc_attr(($i_planos == 1) ? 'active show' : '' ); ?>" id="liton_tab_3_<?php echo esc_attr(($i_planos));?>">
                                            <div class="ltn__apartments-tab-content-inner">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="apartments-plan-img">
                                                            <img src="<?php echo esc_attr(esc_url($plano['image'])); ?>" alt="#">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                                            <h2><?php echo esc_html($plano['nombre']); ?></h2>
                                                            <p><?php echo esc_html($plano['desc']); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="product-details-apartments-info-list  section-bg-1">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                        <ul>
                                                                            <li><label>Total Area</label> <span><?php echo esc_html($plano['area']); ?> m²</span></li>
                                                                            <li><label>Bedroom</label> <span><?php echo esc_html($plano['recamara']); ?> m²</span></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                                        <ul>
                                                                            <li><label>Belcony/Pets</label> <span><?php echo esc_html($plano['mascotas']); ?></span></li>
                                                                            <li><label>Lounge</label> <span><?php echo esc_html($plano['salon']); ?> m²</span></li>
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
                            "https://www.youtube.com/embed/$2",
                            $video);
                        ?>
                        <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60" data-bg="<?php echo esc_attr(esc_url( $video_data ? $video_data->thumbnail_url : '')); ?>">
                            <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="<?php echo esc_attr(esc_url($url_embed.'?autoplay=1&showinfo=0')); ?>" data-rel="lightcase:myCollection">
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

  <?php
  endwhile;
  get_footer();