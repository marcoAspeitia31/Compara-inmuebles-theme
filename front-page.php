<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 */
$slides = get_post_meta(get_the_ID(), 'front_page_grupo_slider1',true);
if( ! empty( $slides ) ){
    get_header("front");
}
else{
    get_header();
}
?>
        <?php get_template_part( 'template-parts/front-page/main', 'banner' ); ?>

        <?php get_template_part( 'template-parts/front-page/search', 'form'); ?>

        <?php get_template_part( 'template-parts/front-page/services'); ?>

        <!-- PRODUCT SLIDER AREA START -->
        <div class="ltn__product-slider-area ltn__product-gutter pt-115 pb-90 plr--7">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 text-white">Properties</h6>
                            <h1 class="section-title">Featured Listings</h1>
                        </div>
                    </div>
                </div>
                <div class="row ltn__product-slider-item-four-active-full-width slick-arrow-1">
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/product-3/1.jpg" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-purple">For Rent</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$34,900<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">New Apartment Nice View</a></h2>
                                <div class="product-description">
                                    <p>Beautiful Huge 1 Family House In Heart Of <br>
                                        Westbury. Newly Renovated With New Wood</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>3 <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>2 <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/author.jpg" alt="#"></a>
                                    </div>
                                    <div class="agent-brief">
                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                        <small>Estate Agents</small>
                                    </div>
                                </div>
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
                                            <a href="product-details.html" title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/product-3/2.jpg" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-purple---">For Sale</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$34,900<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">Modern Apartments</a></h2>
                                <div class="product-description">
                                    <p>Beautiful Huge 1 Family House In Heart Of <br>
                                        Westbury. Newly Renovated With New Wood</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>3 <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>2 <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/author.jpg" alt="#"></a>
                                    </div>
                                    <div class="agent-brief">
                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                        <small>Estate Agents</small>
                                    </div>
                                </div>
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
                                            <a href="product-details.html" title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/product-3/3.jpg" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-purple">For Rent</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$34,900<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">Comfortable Apartment</a></h2>
                                <div class="product-description">
                                    <p>Beautiful Huge 1 Family House In Heart Of <br>
                                        Westbury. Newly Renovated With New Wood</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>3 <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>2 <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/author.jpg" alt="#"></a>
                                    </div>
                                    <div class="agent-brief">
                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                        <small>Estate Agents</small>
                                    </div>
                                </div>
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
                                            <a href="product-details.html" title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/product-3/4.jpg" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-purple">For Rent</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$34,900<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">Luxury villa in Rego Park </a></h2>
                                <div class="product-description">
                                    <p>Beautiful Huge 1 Family House In Heart Of <br>
                                        Westbury. Newly Renovated With New Wood</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>3 <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>2 <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/author.jpg" alt="#"></a>
                                    </div>
                                    <div class="agent-brief">
                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                        <small>Estate Agents</small>
                                    </div>
                                </div>
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
                                            <a href="product-details.html" title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ltn__product-item -->
                    <div class="col-lg-12">
                        <div class="ltn__product-item ltn__product-item-4 text-center---">
                            <div class="product-img">
                                <a href="product-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/product-3/5.jpg" alt="#"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge bg-purple">For Rent</li>
                                    </ul>
                                </div>
                                <div class="product-img-location-gallery">
                                    <div class="product-img-location">
                                        <ul>
                                            <li>
                                                <a href="locations.html"><i class="flaticon-pin"></i> Belmont Gardens, Chicago</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-img-gallery">
                                        <ul>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-camera"></i> 4</a>
                                            </li>
                                            <li>
                                                <a href="product-details.html"><i class="fas fa-film"></i> 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-price">
                                    <span>$34,900<label>/Month</label></span>
                                </div>
                                <h2 class="product-title"><a href="product-details.html">Beautiful Flat in Manhattan </a></h2>
                                <div class="product-description">
                                    <p>Beautiful Huge 1 Family House In Heart Of <br>
                                        Westbury. Newly Renovated With New Wood</p>
                                </div>
                                <ul class="ltn__list-item-2 ltn__list-item-2-before">
                                    <li><span>3 <i class="flaticon-bed"></i></span>
                                        Bedrooms
                                    </li>
                                    <li><span>2 <i class="flaticon-clean"></i></span>
                                        Bathrooms
                                    </li>
                                    <li><span>3450 <i class="flaticon-square-shape-design-interface-tool-symbol"></i></span>
                                        square Ft
                                    </li>
                                </ul>
                            </div>
                            <div class="product-info-bottom">
                                <div class="real-estate-agent">
                                    <div class="agent-img">
                                        <a href="team-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/author.jpg" alt="#"></a>
                                    </div>
                                    <div class="agent-brief">
                                        <h6><a href="team-details.html">William Seklo</a></h6>
                                        <small>Estate Agents</small>
                                    </div>
                                </div>
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
                                            <a href="product-details.html" title="Product Details">
                                                <i class="flaticon-add"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- PRODUCT SLIDER AREA END -->

        <!-- VIDEO AREA START -->
        <div class="ltn__video-popup-area ltn__video-popup-margin---">
            <div class="ltn__video-bg-img ltn__video-popup-height-600--- bg-overlay-black-30 bg-image bg-fixed ltn__animation-pulse1" data-bg="<?php echo esc_url( get_template_directory_uri(  ) );?>/assets/img/bg/19.jpg">
                <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0" data-rel="lightcase:myCollection">
                    <i class="fa fa-play"></i>
                </a>
            </div>
        </div>
        <!-- VIDEO AREA END -->

        <!-- BLOG AREA START (blog-3) -->
        <div class="ltn__blog-area pt-115--- pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area ltn__section-title-2--- text-center">
                            <h6 class="section-subtitle section-subtitle-2 text-white">News & Blogs</h6>
                            <h1 class="section-title">Leatest News Feeds</h1>
                        </div>
                    </div>
                </div>
                <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/1.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Decorate</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">10 Brilliant Ways To Decorate Your Home</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/2.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Interior</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">The Most Inspiring Interior Design Of 2021</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>July 23, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/3.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Estate</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">Recent Commercial Real Estate Transactions</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>May 22, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/4.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Room</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">Renovating a Living Room? Experts Share Their Secrets</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Item -->
                    <div class="col-lg-12">
                        <div class="ltn__blog-item ltn__blog-item-3">
                            <div class="ltn__blog-img">
                                <a href="blog-details.html"><img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/blog/5.jpg" alt="#"></a>
                            </div>
                            <div class="ltn__blog-brief">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><i class="far fa-user"></i>by: Admin</a>
                                        </li>
                                        <li class="ltn__blog-tags">
                                            <a href="#"><i class="fas fa-tags"></i>Trends</a>
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="ltn__blog-title"><a href="blog-details.html">7 home trends that will shape your house in 2021</a></h3>
                                <div class="ltn__blog-meta-btn">
                                    <div class="ltn__blog-meta">
                                        <ul>
                                            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>June 24, 2021</li>
                                        </ul>
                                    </div>
                                    <div class="ltn__blog-btn">
                                        <a href="blog-details.html">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
        <!-- BLOG AREA END -->
  
</body>
</html>


<?php
get_footer();
