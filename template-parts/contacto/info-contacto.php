<?php
/**
 * Template part for displaying info in contacto template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$correo_contacto = cmb2_get_option('compara_inmuebles_theme_options', 'correo_contacto');
$numero_contacto = cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto');
$direccion = cmb2_get_option('compara_inmuebles_theme_options', 'short_address') .', '. cmb2_get_option('compara_inmuebles_theme_options', 'country');
?>
<!-- CONTACT ADDRESS AREA START -->
<div class="ltn__contact-address-area mb-90">
    <div class="container">
        <div class="row">
            <?php if($correo_contacto): ?>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/10.png" alt="Icon Image">
                        </div>
                        <h3>Email Address</h3>
                        <p><?php echo esc_html( $correo_contacto ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($numero_contacto): ?>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/11.png" alt="Icon Image">
                        </div>
                        <h3>Phone Number</h3>
                        <p><?php echo esc_html( $numero_contacto ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($direccion): ?>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/12.png" alt="Icon Image">
                        </div>
                        <h3>Office Address</h3>
                        <p><?php echo esc_html( $direccion ); ?></p>
                    </div>
                </div>
            <?php endif; ?>
      </div>
  </div>
</div>
<!-- CONTACT ADDRESS AREA END -->