<?php
/*
* Template Name: Lista inmuebles (sidebar derecho)
*/
get_header(); ?>
<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'breadcrumb' );?>
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
                                        <a data-toggle="tab" id="list-inmuebles" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                    </div>
                                </div>
                            </li>
                            <li class="d-none">
                               <div class="showing-product-number text-right">
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
                                        if($number == 6):
                                            ?>
                                            <option value="<?php echo esc_attr(esc_url(remove_query_arg ( 'posts_to_show',$_SERVER['REQUEST_URI']))); ?>" <?php echo $selected; ?>>
                                                Por pagina: <?php echo esc_html($number);?>
                                            </option>
                                        <?php
                                            continue;
                                        endif;
                                    ?>
                                        <option value="<?php echo esc_attr(esc_url(add_query_arg( 'posts_to_show',$number))); ?>" <?php echo $selected; ?>>
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
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Search Widget -->
                                        <div class="ltn__search-widget mb-30">
                                            <form >
                                                <input type="text" name="search" placeholder="Search your keyword..." value="<?php echo esc_html(isset($_GET['search']) ? $_GET['search'] : ''); ?>">
                                                <button ><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="div-grid-inmuebles" class="row">
                                    </div>
                                    <div id="llamar-spinner">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_product_list">
                            <div class="ltn__product-tab-content-inner ltn__product-list-view">
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
                                    <div id="div-list-inmuebles" class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        <div class="ltn__pagination">
                            <?php                          
                            $count_inmuebles = wp_count_posts('inmuebles') ? wp_count_posts('inmuebles') : 0 ;
                            $posts_per_page = isset($_GET['posts_to_show']) ? $_GET['posts_to_show'] : 6;
                            $max_pages = ceil($count_inmuebles->publish / $posts_per_page);
                            echo paginate_links( array(
                                'total' => $max_pages,
                                'current' => get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1,
                                'type' => 'list',
                                'prev_next' => true,
                                'prev_text' => '<i class="fas fa-angle-double-left"></i>',
                                'next_text' => '<i class="fas fa-angle-double-right"></i>',
                                'current_before' => '<a class="active">',
                                'current_after' => '</a>',
                            ) );
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
                            <a class="btn btn-effect-3 btn-white" href="contact.html">Explore Properties <i class="icon-next"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CALL TO ACTION END -->

      <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
<?php
get_footer(); 