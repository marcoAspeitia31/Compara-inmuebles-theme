<?php
/**
 * Template part for displaying a search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$terms_estado_inmuebles = get_terms('estados_de_inmueble', array('hide_empty' => false));
$terms_tipos_inmuebles = get_terms('tipos_inmuebles', array('hide_empty' => false));
global $wpdb;
$estados = $wpdb->get_col(
    $wpdb->prepare(
        "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'administrative_area_level_1'"
    )
);

$localidades = $wpdb->get_col(
  $wpdb->prepare(
      "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'locality'"
  )
);

if ( !empty ($terms_estado_inmuebles) ):
?>
<div class="ltn__slider-area ltn__slider-4">
  <div class="ltn__slide-one-active----- slick-slide-arrow-1----- slick-slide-dots-1----- arrow-white----- ltn__slide-animation-active">
      <!-- ltn__slide-item -->
      <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-4 bg-image">
          <div class="ltn__slide-item-inner text-left">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 align-self-center">
                          <div class="slide-item-car-dealer-form">
                              <div class="ltn__car-dealer-form-tab">
                                  <div class="ltn__tab-menu  text-uppercase">
                                      <div class="nav">
                                          <?php
                                          $i_ciclo_estado_inmuebles = 1;
                                          foreach($terms_estado_inmuebles as $term):
                                            $class_active = $i_ciclo_estado_inmuebles == 1 ? "active show" : "";
                                          ?>
                                          <a class="<?php echo esc_attr($class_active); ?>" data-toggle="tab" href="#ltn__form_tab_1_<?php echo esc_attr($i_ciclo_estado_inmuebles); ?>"><i class="fas fa-home"></i><?php echo esc_html($term->name) ?></a>
                                          <?php
                                          $i_ciclo_estado_inmuebles++;
                                          endforeach;
                                          ?>
                                      </div>
                                  </div>
                                  <div class="tab-content">
                                    <?php
                                    $i_ciclo_estado_inmuebles = 1;
                                    foreach($terms_estado_inmuebles as $term):
                                      $class_active = $i_ciclo_estado_inmuebles == 1 ? "active show" : "";
                                    ?>
                                      <div class="tab-pane fade <?php echo esc_attr($class_active); ?>" id="ltn__form_tab_1_<?php echo esc_attr($i_ciclo_estado_inmuebles); ?>">
                                          <div class="car-dealer-form-inner">
                                              <form action="#" class="ltn__car-dealer-form-box row">
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-calendar col-lg-4 col-md-6">
                                                      <select class="nice-select">
                                                          <option>Property Type</option>
                                                          <?php
                                                          if (!empty ($terms_tipos_inmuebles) ):
                                                            foreach($terms_tipos_inmuebles as $term):
                                                            ?>
                                                              <option value="<?php echo esc_attr($term->term_id); ?>"><?php echo esc_html($term->name);?></option>
                                                            <?php
                                                            endforeach;
                                                          endif;
                                                          ?>
                                                      </select>
                                                  </div> 
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-car col-lg-4 col-md-6">
                                                      <select class="nice-select location-select">
                                                          <option>Location</option>
                                                          <?php
                                                          if (!empty($estados)): 
                                                            foreach($estados as $estado):
                                                              ?>
                                                              <option value="<?php echo esc_attr($estado); ?>"><?php echo esc_html($estado); ?></option>
                                                              <?php
                                                            endforeach;
                                                          endif;
                                                          ?>
                                                      </select>
                                                  </div> 
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-meter col-lg-4 col-md-6">
                                                      <select class="nice-select sublocation-select">
                                                          <option>Sub Location</option>
                                                          <?php
                                                          if (!empty($localidades)): 
                                                            foreach($localidades as $localidad):
                                                              ?>
                                                              <option value="<?php echo esc_attr($localidad); ?>"><?php echo esc_html($localidad); ?></option>
                                                              <?php
                                                            endforeach;
                                                          endif;
                                                          ?>
                                                      </select>
                                                  </div> 
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-ring col-lg-4 col-md-6">
                                                      <select class="nice-select">
                                                          <option>Bedrooms</option>
                                                          <option>1</option>
                                                          <option>2</option>
                                                          <option>3</option>
                                                          <option>4</option>
                                                      </select>
                                                  </div> 
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-4 col-md-6">                                                            
                                                      <div class="input-item input-item-name ltn__custom-icon">
                                                          <input type="text" name="name" placeholder="Min size (in sqft)">
                                                      </div>
                                                  </div> 
                                                  <div class="ltn__car-dealer-form-item ltn__custom-icon ltn__icon-cog col-lg-4 col-md-6">                                                            
                                                      <div class="input-item input-item-name ltn__custom-icon">
                                                          <input type="text" name="name" placeholder="Max size (in sqft)">
                                                      </div>
                                                  </div> 
                                                  <div class="car-price-filter-range col-lg-12">
                                                      <div class="price_filter">
                                                          <div class="price_slider_amount">
                                                              <input type="submit"  value="Your range:"/> 
                                                              <input type="text" class="amount" name="price"  placeholder="Add Your Price" /> 
                                                          </div>
                                                          <div class="slider-range"></div>
                                                      </div>
                                                      <div class="btn-wrapper text-center">
                                                          <!-- <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</button> -->
                                                          <a href="shop-right-sidebar.html" class="btn theme-btn-1 btn-effect-1 text-uppercase">Search Inventory</a>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
                                    <?php
                                    $i_ciclo_estado_inmuebles++;
                                    endforeach;
                                    ?>
                                  </div>
                              </div>                                        
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php
endif;