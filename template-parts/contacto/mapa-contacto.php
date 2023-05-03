<?php
/**
 * Template part for displaying map in contacto template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$ubicacion = cmb2_get_option('compara_inmuebles_theme_options', 'location');
?>
<!-- GOOGLE MAP AREA START -->
<div class="google-map mb-120">
    
    <iframe src="https://maps.google.com/maps?q=<?php echo esc_attr($ubicacion['latitude']); ?>,<?php echo esc_attr($ubicacion['longitude']); ?>&hl=es&z=14&amp;output=embed" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div>
<!-- GOOGLE MAP AREA END -->