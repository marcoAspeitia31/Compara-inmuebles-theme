<?php
/**
 * Template part for displaying tipos de inmueble in front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$terms = get_terms( array(
  'taxonomy' => 'tipos_inmuebles',
  'orderby' => 'count',
  'order' => 'DESC',
  'number' => 5,
) );
if (!empty($terms)):
?>
<div class="ltn__banner-area bg-8 pt-60">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title-area ltn__section-title-2--- text-center">
                  <h6 class="section-subtitle section-subtitle-2 text-white">Propiedad</h6>
                  <h1 class="section-title ">Tipo de inmuebles</h1>
              </div>
          </div>
      </div>
      <div class="row">
        <?php
        $i_terms = 1;
        $custom_pages = get_pages(array(
          'meta_key' => '_wp_page_template',
          'meta_value' => 'page-inmuebles.php'
        ));
        $link_buscar = $custom_pages ? get_permalink($custom_pages[0]->ID) : '#' ;
        foreach($terms as $term):
          $class = $i_terms == 1 ? 'col-lg-8 col-md-6' : 'col-lg-4 col-md-6';
          $imagen = get_term_meta( $term->term_id, 'image', true ) ? get_term_meta( $term->term_id, 'image', true ) : '#' ;
          ?>
          <div class="<?php echo esc_attr($class); ?>">
            <div class="ltn__banner-item ltn__banner-style-4 text-color-white bg-image" data-bg="<?php echo esc_attr(esc_url($imagen)); ?>">                        
                <div class="ltn__banner-info">
                    <h3><a href="<?php echo esc_attr(esc_url($link_buscar.'?tipo_inmueble[0]='.$term->slug)); ?>"> <?php echo esc_html($term->name); ?> </a></h3>
                    <p> Great Deals Available</p>
                    <mark> <?php echo esc_html($term->count); ?> listados</mark>
                </div>
            </div>
          </div>
          <?php
          $i_terms++;
        endforeach;
        ?>
      </div>
  </div>
</div>
<?php
endif;