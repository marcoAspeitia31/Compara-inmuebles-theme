<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Compara_inmuebles
 */
$page_for_posts_id = get_option('page_for_posts');
if ($page_for_posts_id) {
$noticias_permalink = get_permalink($page_for_posts_id);
$inmuebles_archive_link = get_post_type_archive_link( 'inmuebles' );
}
$pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-faq.php'
));

foreach ($pages as $page) {
    if (get_page_template_slug($page->ID) == 'page-faq.php') {
        $faq = get_permalink($page->ID);
        break; 
    }
}
?>
        <?php get_template_part( 'template-parts/footer/cta', 'footer' ); ?>

        <!-- FOOTER AREA START -->
        <footer class="ltn__footer-area  ">
            <div class="footer-top-area  section-bg-2 plr--5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-about-widget">
                                <div class="footer-logo">
                                    <div class="site-logo">
                                        <img src="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'logo_footer'))); ?>" alt="Logo">
                                    </div>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the and typesetting industry. Lorem Ipsum is dummy text of the printing.</p>
                                <div class="footer-address">
                                    <ul>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-placeholder"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><?php echo esc_html(cmb2_get_option('compara_inmuebles_theme_options', 'short_address')); ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-call"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="tel:<?php echo esc_attr(cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto')); ?><"><?php echo esc_html(cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto')); ?></a></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="footer-address-icon">
                                                <i class="icon-mail"></i>
                                            </div>
                                            <div class="footer-address-info">
                                                <p><a href="mailto:<?php echo esc_attr(cmb2_get_option('compara_inmuebles_theme_options', 'correo_contacto')); ?>"><?php echo esc_html( cmb2_get_option('compara_inmuebles_theme_options', 'correo_contacto') );?></a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__social-media mt-20">
                                    <ul>
                                        <li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'facebook'))); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'twitter'))); ?>"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'linkedin'))); ?>"><i class="fab fa-linkedin"></i></a></li>
                                        <li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'youtube'))); ?>"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title"><?php echo esc_html(wp_get_nav_menu_name('menu-footer-1')); ?></h4>
                                <div class="footer-menu">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-footer-1',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title"><?php echo esc_html(wp_get_nav_menu_name('menu-footer-2')); ?></h4>
                                <div class="footer-menu">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-footer-2',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-menu-widget clearfix">
                                <h4 class="footer-title"><?php echo esc_html(wp_get_nav_menu_name('menu-footer-3')); ?></h4>
                                <div class="footer-menu">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-footer-3',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                            <div class="footer-widget footer-newsletter-widget">
                                <h4 class="footer-title">Newsletter</h4>
                                <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                                <div class="footer-newsletter">
                                    <form action="#">
                                        <input type="email" name="email" placeholder="Email*">
                                        <div class="btn-wrapper">
                                            <button class="theme-btn-1 btn" type="submit"><i class="fas fa-location-arrow"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <h5 class="mt-30">We Accept</h5>
                                <img src="img/icons/payment-4.png" alt="Payment Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
                <div class="container-fluid ltn__border-top-2">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="ltn__copyright-design clearfix">
                                <p>All Rights Reserved @<?php echo get_bloginfo('name'); ?> <span class="current-year"></span></p>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 align-self-center">
                            <div class="ltn__copyright-menu text-right">
                                <ul>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Claim</a></li>
                                    <li><a href="#">Privacy & Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->

<?php wp_footer(); ?>

</body>
</html>
<!-- Body main wrapper end -->