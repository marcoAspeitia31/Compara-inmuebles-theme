<?php
/**
 * Template part for displaying info in contacto template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>

<!-- CONTACT ADDRESS AREA START -->
<div class="ltn__contact-address-area mb-90">
  <div class="container">
      <div class="row">
          <div class="col-lg-4">
              <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                  <div class="ltn__contact-address-icon">
                      <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/10.png" alt="Icon Image">
                  </div>
                  <h3>Email Address</h3>
                  <p><?php echo esc_html( cmb2_get_option('compara_inmuebles_theme_options', 'correo_contacto') ); ?></p>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                  <div class="ltn__contact-address-icon">
                      <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/11.png" alt="Icon Image">
                  </div>
                  <h3>Phone Number</h3>
                  <p><?php echo esc_html( cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto') ); ?></p>
              </div>
          </div>
          <div class="col-lg-4">
              <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                  <div class="ltn__contact-address-icon">
                      <img src="<?php echo esc_url(get_template_directory_uri(  ))?>/assets/img/icons/12.png" alt="Icon Image">
                  </div>
                  <h3>Office Address</h3>
                  <p><?php echo esc_html( cmb2_get_option('compara_inmuebles_theme_options', 'short_address') .', '. cmb2_get_option('compara_inmuebles_theme_options', 'country') ); ?></p>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- CONTACT ADDRESS AREA END -->