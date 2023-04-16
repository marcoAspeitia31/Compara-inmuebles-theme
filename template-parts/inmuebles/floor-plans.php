<?php
/**
 * Display the floor plans of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
if (! empty( $planos ) ):
    ?>

    <h4 class="title-2">Floor Plans</h4>
    <!-- APARTMENTS PLAN AREA START -->
    <div class="ltn__apartments-plan-area product-details-apartments-plan mb-60">
        <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase--- text-center---">
            <div class="nav">
                <?php
                    $planos = get_post_meta(get_the_ID(), 'grupo_planos', true);
                    $i_planos = 1;
                    foreach ($planos as $plano):
                      $nombre_tab = $plano['nombre'] ? $plano['nombre'] : 'Plano '.$i_planos;
                      ?>
                      <a data-toggle="tab" class="<?php echo esc_attr(( ($i_planos == 1) ? 'active show' : '')); ?>" href="#liton_tab_3_<?php echo esc_attr($i_planos); ?>"><?php echo esc_html($nombre_tab); ?></a>
                      <?php
                      $i_planos++;  
                    endforeach;
                ?>
            </div>
        </div>
        <div class="tab-content">
            <?php
            $i_planos = 1;
              foreach ($planos as $plano):
                  ?>
                  <div class="tab-pane fade <?php echo esc_attr(($i_planos == 1) ? 'active show' : '' ); ?>" id="liton_tab_3_<?php echo esc_attr(($i_planos));?>">
                      <div class="ltn__apartments-tab-content-inner">
                          <div class="row">
                              <div class="col-lg-7">
                                  <div class="apartments-plan-img">
                                    <img src="<?php echo isset($plano['image']) ? esc_attr(esc_url($plano['image'])): ''; ?>" alt="Imagen del plano">
                                  </div>
                              </div>
                              <div class="col-lg-5">
                                  <div class="apartments-plan-info ltn__secondary-bg--- text-color-white---">
                                      <h2><?php echo isset($plano['nombre']) ? esc_html($plano['nombre']) : ''; ?></h2>
                                      <p><?php echo isset($plano['desc']) ? esc_html($plano['desc']) : ''; ?></p>
                                  </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="product-details-apartments-info-list  section-bg-1">
                                      <div class="row">
                                          <div class="col-lg-6">
                                              <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                  <ul>
                                                      <li><label>Total Area</label> <span><?php echo isset($plano['area']) ? esc_html($plano['area']) : ''; ?> m²</span></li>
                                                      <li><label>Bedroom</label> <span><?php echo isset($plano['recamara']) ? esc_html($plano['recamara']) : ''; ?> m²</span></li>
                                                  </ul>
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="apartments-info-list apartments-info-list-color mt-40---">
                                                  <ul>
                                                      <li><label>Belcony/Pets</label> <span><?php echo isset($plano['mascotas']) ? esc_html($plano['mascotas']) : ''; ?></span></li>
                                                      <li><label>Lounge</label> <span><?php echo isset ($plano['salon']) ? esc_html($plano['salon']) : ''; ?> m²</span></li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                  $i_planos++;
              endforeach;
            ?>
        </div>
    </div>
  <?php
endif;