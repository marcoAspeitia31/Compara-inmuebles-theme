<?php
/*
* Template Name: Lista inmuebles (sidebar derecho)
*/
get_header();

if( have_posts(  ) ):

    get_template_part( 'template-parts/content', 'breadcrumb' );
    ?>

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ltn__product-gutter mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
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
                            <li class="d-none">
                                <div class="showing-product-number text-right">
                                    <?php
                                    /* $count_posts = wp_count_posts( 'inmuebles' );

                                    if ( $count_posts ) {
                                        $published_posts = $count_posts->publish;
                                        echo $published_posts;
                                    } */
                                    ?>
                                    <span>Showing 1–12 of 18 results</span>
                                </div> 
                            </li>
                            <li>
                            <div class="short-by text-center">
                                    <select class="nice-select order-by">
                                        <option>Default Sorting</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by new arrivals</option>
                                        <option>Sort by price: low to high</option>
                                        <option>Sort by price: high to low</option>
                                    </select>
                                </div> 
                            </li>
                            <li>
                            <div class="short-by text-center">
                                    <select class="nice-select posts-per-page">
                                    <?php
                                    $posts_to_show  = array( 6, 12, 18, 24 );
                                    foreach($posts_to_show as $number){
                                        $selected = isset( $_GET['posts_to_show'] ) && (int) $_GET['posts_to_show'] === $number ? 'selected' : '';
                                        if($number == 6){
                                            ?>
                                            <option value="<?php echo esc_attr(esc_url(remove_query_arg ( 'posts_to_show',$_SERVER['REQUEST_URI']))); ?>" <?php echo $selected; ?>>
                                                Por pagina: <?php echo esc_html($number);?>
                                            </option>
                                        <?php
                                            continue;
                                        }
                                    ?>
                                        <option value="<?php echo esc_attr(esc_url(add_query_arg( 'posts_to_show',$number))); ?>" <?php echo $selected; ?>>
                                            Por pagina: <?php echo esc_html($number);?>
                                        </option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div> 
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form action="#">
                                                <input type="text" name="search" placeholder="Search your keyword...">
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
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
                                                            <span>$ <?php echo get_post_meta( get_the_ID(), 'field_precio', true ); ?><label></label></span>
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
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                        <?php

                        global $wp_query;

                        $big = 999999999;

                        $args = array(
                            'prev_text' => '<i class="fas fa-angle-double-left"></i>',
                            'next_text' => '<i class="fas fa-angle-double-right"></i>',
                            'type'      => 'list',
                            'mid_size' => 1,
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'total' => $wp_query->max_num_pages
                        );

                        echo paginate_links( $args );
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