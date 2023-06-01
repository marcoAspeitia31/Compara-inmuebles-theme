<?php
/**
 * Display the location map of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$ubicacion = get_post_meta(get_the_ID(),'field_location', true);
if (! empty ( $ubicacion ) ):
 ?>
  <h4 class="title-2">Location</h4>
  <div class="property-details-google-map mb-60">
      <iframe src="https://maps.google.com/maps?q=<?php echo esc_attr($ubicacion['latitude']); ?>,<?php echo esc_attr($ubicacion['longitude']); ?>&hl=es&z=14&amp;output=embed" width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
<?php
endif;