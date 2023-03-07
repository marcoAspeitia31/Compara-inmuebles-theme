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
                <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
                    <h3 class="mb-10">Advance Information</h3>
                    <label class="mb-30"><small>About 9,620 results (0.62 seconds) </small></label>
                    <!-- Advance Information widget -->
                    <div class="widget ltn__menu-widget">
                        <h4 class="ltn__widget-title">Property Type</h4>
                        <ul>
                            <li>
                                <label class="checkbox-item">House
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,924</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Single Family
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,610</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Apartment
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,912</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Office Villa
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,687</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Luxary Home
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">1,853</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Studio
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">893</span>
                            </li>
                        </ul>
                        <hr>
                        <h4 class="ltn__widget-title">Amenities</h4>
                        <ul>
                            <li>
                                <label class="checkbox-item">Dishwasher
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,924</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Floor Coverings
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,610</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Internet
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,912</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Build Wardrobes
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,687</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Supermarket
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">1,853</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Kids Zone
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">893</span>
                            </li>
                        </ul>
                        <hr>
                        <h4 class="ltn__widget-title">Price Renge</h4>
                        <ul>
                            <li>
                                <label class="checkbox-item">Low Budget
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">$5,000 - $10,000</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Medium
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">$10,000 - $30,000</span>
                            </li>
                            <li>
                                <label class="checkbox-item">High Budget
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">$30,000 Up</span>
                            </li>
                        </ul>
                        <hr>
                        <!-- Price Filter Widget -->
                        <div class="widget--- ltn__price-filter-widget">
                            <h4 class="ltn__widget-title ltn__widget-title-border---">Filter by price</h4>
                            <div class="price_filter">
                                <div class="price_slider_amount">
                                    <input type="submit"  value="Your range:"/> 
                                    <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                </div>
                                <div class="slider-range"></div>
                            </div>
                        </div>
                        <hr>
                        <h4 class="ltn__widget-title">Bed/bath</h4>
                        <ul>
                            <li>
                                <label class="checkbox-item">Single
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,924</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Double
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,610</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Up To 3
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,912</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Up To 5
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,687</span>
                            </li>
                        </ul>
                        <hr>
                        <h4 class="ltn__widget-title">Catagory</h4>
                        <ul>
                            <li>
                                <label class="checkbox-item">Buying
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,924</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Renting
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">3,610</span>
                            </li>
                            <li>
                                <label class="checkbox-item">Selling
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <span class="categorey-no">2,912</span>
                            </li>
                        </ul>
                    </div>
                    <!-- Category Widget -->
                    <div class="widget ltn__menu-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Product categories</h4>
                        <ul>
                            <li><a href="#">Body <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Interior <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Lights <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Parts <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Tires <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Uncategorized <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                            <li><a href="#">Wheel <span><i class="fas fa-long-arrow-alt-right"></i></span></a></li>
                        </ul>
                    </div>
                    <!-- Price Filter Widget -->
                    <div class="widget ltn__price-filter-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Filter by price</h4>
                        <div class="price_filter">
                            <div class="price_slider_amount">
                                <input type="submit"  value="Your range:"/> 
                                <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                            </div>
                            <div class="slider-range"></div>
                        </div>
                    </div>
                    <!-- Top Rated Product Widget -->
                    <div class="widget ltn__top-rated-product-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Top Rated Product</h4>
                        <ul>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/1.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Mixel Solid Seat Cover</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/2.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">3 Rooms Manhattan</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="top-rated-product-item clearfix">
                                    <div class="top-rated-product-img">
                                        <a href="product-details.html"><img src="img/product/3.png" alt="#"></a>
                                    </div>
                                    <div class="top-rated-product-info">
                                        <div class="product-ratting">
                                            <ul>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <h6><a href="product-details.html">Coil Spring Conversion</a></h6>
                                        <div class="product-price">
                                            <span>$49.00</span>
                                            <del>$65.00</del>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Search Widget -->
                    <div class="widget ltn__search-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Search Objects</h4>
                        <form action="#">
                            <input type="text" name="search" placeholder="Search your keyword...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <!-- Tagcloud Widget -->
                    <div class="widget ltn__tagcloud-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Popular Tags</h4>
                        <ul>
                            <li><a href="#">Popular</a></li>
                            <li><a href="#">desgin</a></li>
                            <li><a href="#">ux</a></li>
                            <li><a href="#">usability</a></li>
                            <li><a href="#">develop</a></li>
                            <li><a href="#">icon</a></li>
                            <li><a href="#">Car</a></li>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Repairs</a></li>
                            <li><a href="#">Auto Parts</a></li>
                            <li><a href="#">Oil</a></li>
                            <li><a href="#">Dealer</a></li>
                            <li><a href="#">Oil Change</a></li>
                            <li><a href="#">Body Color</a></li>
                        </ul>
                    </div>
                    <!-- Size Widget -->
                    <div class="widget ltn__tagcloud-widget ltn__size-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Product Size</h4>
                        <ul>
                            <li><a href="#">S</a></li>
                            <li><a href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">XXL</a></li>
                        </ul>
                    </div>
                    <!-- Color Widget -->
                    <div class="widget ltn__color-widget d-none">
                        <h4 class="ltn__widget-title ltn__widget-title-border">Product Color</h4>
                        <ul>
                            <li class="black"><a href="#"></a></li>
                            <li class="white"><a href="#"></a></li>
                            <li class="red"><a href="#"></a></li>
                            <li class="silver"><a href="#"></a></li>
                            <li class="gray"><a href="#"></a></li>
                            <li class="maroon"><a href="#"></a></li>
                            <li class="yellow"><a href="#"></a></li>
                            <li class="olive"><a href="#"></a></li>
                            <li class="lime"><a href="#"></a></li>
                            <li class="green"><a href="#"></a></li>
                            <li class="aqua"><a href="#"></a></li>
                            <li class="teal"><a href="#"></a></li>
                            <li class="blue"><a href="#"></a></li>
                            <li class="navy"><a href="#"></a></li>
                            <li class="fuchsia"><a href="#"></a></li>
                            <li class="purple"><a href="#"></a></li>
                            <li class="pink"><a href="#"></a></li>
                            <li class="nude"><a href="#"></a></li>
                            <li class="orange"><a href="#"></a></li>

                            <li><a href="#" class="orange"></a></li>
                            <li><a href="#" class="orange"></a></li>
                        </ul>
                    </div>
                    <!-- Banner Widget -->
                    <div class="widget ltn__banner-widget d-none">
                        <a href="shop.html"><img src="img/banner/banner-2.jpg" alt="#"></a>
                    </div>

                </aside>
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