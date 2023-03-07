<?php
/*
* Template Name: Lista inmuebles (sidebar derecho)
*/
get_header();

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
                                </div>
                                <div class="col-12" id="ci-show-inmuebles">
                                    <div id="div-grid-inmuebles" class="row"></div>
                                </div>
                                <div id="llamar-spinner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination">
                        <?php 
                        $count_inmuebles = wp_count_posts('inmuebles');
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

<?php
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
    comments_template();
endif;
    
get_footer(); 