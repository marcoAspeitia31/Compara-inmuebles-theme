<?php

get_header();

if( have_posts(  ) ):

    get_template_part( 'template-parts/content', 'breadcrumb' );
    ?>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-lg-2 mb-100">
                    <div class="ltn__shop-options">
                        <ul class="justify-content-start">
                            <li>
                                <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-toggle="tab" id="grid-inmuebles" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                        <a data-toggle="tab" id="list-inmuebles" href="#liton_product_grid"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <div id="resultados-texto" class="showing-product-number text-right">
                                <span>Showing 1–12 of 18 results</span>
                                </div> 
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select order-by">
                                        <option value="<?php echo esc_url(esc_attr(remove_query_arg( array('orderby','sortby'), $_SERVER['REQUEST_URI']))); ?>"  >Default Sorting</option>
                                        <option value="<?php echo esc_url(esc_attr(add_query_arg('sortby','post_views_count',remove_query_arg('orderby', $_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'post_views_count' ? 'selected' : '' ?> >Sort by popularity</option>
                                        <option value="<?php echo esc_attr(esc_url(add_query_arg('orderby', 'ASC', remove_query_arg('sortby', $_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['orderby'] ) && $_GET['orderby'] === 'ASC' && !isset($_GET['sortby']) ? 'selected' : '' ?> >Sort by old arrivals</option>
                                        <option value="<?php echo esc_attr(esc_url(add_query_arg( array('sortby' => 'field_precio', 'orderby' => 'ASC' )))); ?>"  <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'field_precio' && isset($_GET['orderby']) ? 'selected' : '' ?> >Sort by price: low to high</option>
                                        <option value="<?php echo esc_attr(esc_url(add_query_arg('sortby', 'field_precio', remove_query_arg('orderby',$_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'field_precio' && !isset($_GET['orderby']) ? 'selected' : '' ?> >Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li>
                            <li>
                                <div class="short-by text-center">
                                    <select class="nice-select posts-per-page">
                                    <?php
                                    $posts_to_show  = array( 6, 12, 18, 24 );
                                    foreach($posts_to_show as $number):
                                        $selected = isset( $_GET['posts_to_show'] ) && (int) $_GET['posts_to_show'] === $number ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo esc_attr($number); ?>" <?php echo $selected; ?>>
                                        Por pagina: <?php echo esc_html($number);?>
                                    </option>
                                    <?php
                                        endforeach;
                                    ?>
                                    </select>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div id="inmuebles-container-view" class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Search Widget -->
                                    <div class="ltn__search-widget mb-30">
                                        <form id="buscar-inmuebles">
                                            <input type="text" name="search" placeholder="Search your keyword..." value="<?php echo esc_html(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                                            <button><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="col-12" id="ci-show-inmuebles">
                                        <div id="div-grid-inmuebles" class="row">
                                            <?php  while( have_posts(  ) ):  the_post(  ); ?>
                                            <div class="col-md-6 col-sm-6 col-12">
                                                <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                                    <div class="product-img">
                                                        <a href="<?php the_permalink( );?>"><?php the_post_thumbnail( 'grid-inmueble', array( 'class' => 'img-fluid' ) ); ?></a>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badg">For Rent</li>
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
                                                                        <i class="flaticon-heart-1"></i></a>
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
                                                            $precio = $field_precio ? number_format($field_precio,2,'.',) : '';
                                                            ?>
                                                            <span>$ <?php echo esc_html($precio); ?><label></label></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div id="llamar-spinner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                        <?php

                        global $wp_query;

                        if ($wp_query->max_num_pages > 1):
                            ?>
                            <button id="cargar-mas" class="btn theme-btn-1 btn-effect-1 text-uppercase">Cargar más</button>
                            <?php
                        endif;
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar( 'inmuebles-page' ); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endif;
    
get_footer(); 