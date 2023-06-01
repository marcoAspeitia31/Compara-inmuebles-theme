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
                <div class="col-lg-8 order-lg-2 mb-100">
                    <?php get_template_part( 'template-parts/inmuebles-list/shop','options' );  ?>
                    <div class="tab-content" id="inmuebles-search-form-page">
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
                            <button id="cargar-mas" class="btn theme-btn-1 btn-effect-1 text-uppercase">Cargar más</button>
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
endwhile; // End of the loop.
get_footer(); 