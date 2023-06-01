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
$direccion = cmb2_get_option('compara_inmuebles_theme_options', 'short_address');
$telefono = cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto');
$correo_contacto = cmb2_get_option('compara_inmuebles_theme_options', 'correo_contacto');
$formulario_newsletter =cmb2_get_option('compara_inmuebles_theme_options', 'newsletter'); 
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
                                        <?php if ($direccion): ?>
                                            <li>
                                                <div class="footer-address-icon">
                                                    <i class="icon-placeholder"></i>
                                                </div>
                                                <div class="footer-address-info">
                                                    <p><?php echo esc_html($direccion); ?></p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($telefono): ?>
                                            <li>
                                                <div class="footer-address-icon">
                                                    <i class="icon-call"></i>
                                                </div>
                                                <div class="footer-address-info">
                                                    <p><a href="tel:<?php echo esc_attr($telefono); ?><"><?php echo esc_html($telefono); ?></a></p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($correo_contacto): ?>
                                            <li>
                                                <div class="footer-address-icon">
                                                    <i class="icon-mail"></i>
                                                </div>
                                                <div class="footer-address-info">
                                                    <p><a href="mailto:<?php echo esc_attr($correo_contacto); ?>"><?php echo esc_html( $correo_contacto );?></a></p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="ltn__social-media mt-20">
                                    <ul>
                                        <?php if (cmb2_get_option('compara_inmuebles_theme_options', 'facebook')):?><li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'facebook'))); ?>"><i class="fab fa-facebook-f"></i></a></li><?php endif; ?>
                                        <?php if (cmb2_get_option('compara_inmuebles_theme_options', 'twitter')):?><li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'twitter'))); ?>"><i class="fab fa-twitter"></i></a></li><?php endif; ?>
                                        <?php if (cmb2_get_option('compara_inmuebles_theme_options', 'linkedin')):?><li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'linkedin'))); ?>"><i class="fab fa-linkedin"></i></a></li><?php endif; ?>
                                        <?php if (cmb2_get_option('compara_inmuebles_theme_options', 'youtube')):?><li><a href="<?php echo esc_attr(esc_url(cmb2_get_option('compara_inmuebles_theme_options', 'youtube'))); ?>"><i class="fab fa-youtube"></i></a></li><?php endif; ?>
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
                                <?php if($formulario_newsletter): echo $formulario_newsletter; endif; ?>
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