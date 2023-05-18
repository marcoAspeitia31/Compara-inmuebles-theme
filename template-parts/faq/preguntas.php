<?php
/**
 * Template part for displaying faq in faq template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$preguntas = get_post_meta(get_the_ID(), 'grupo_preguntas',true);
$formulario_newsletter =cmb2_get_option('compara_inmuebles_theme_options', 'newsletter'); 
if (!empty($preguntas)):?>
 <!-- FAQ AREA START (faq-2) (ID > accordion_2) -->
<div class="ltn__faq-area mb-100">
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              <div class="ltn__faq-inner ltn__faq-inner-2">
                  <div id="accordion_2">
                      <!-- card -->
                      <?php
                      $i_pregunta = 1;
                      foreach($preguntas as $pregunta):
                      ?>
                      <div class="card">
                          <h6 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-<?php echo esc_attr($i_pregunta); ?>" aria-expanded="false">
                              <?php echo esc_html($pregunta['pregunta']); ?>
                          </h6>
                          <div id="faq-item-2-<?php echo esc_attr($i_pregunta); ?>" class="collapse" data-parent="#accordion_2">
                              <div class="card-body">
                                  <p><?php echo esc_html($pregunta['respuesta']); ?></p>
                              </div>
                          </div>
                      </div>
                      <?php
                      $i_pregunta++;
                      endforeach;
                      ?>
                  </div>
                  <div class="need-support text-center mt-100">
                      <h2>¿Necesitas ayuda? Llama a soporte:</h2>
                      <div class="btn-wrapper mb-30">
                          <a href="" class="theme-btn-1 btn">Contáctanos</a>
                      </div>
                      <?php if(cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto')): ?><h3><i class="fas fa-phone"></i> <?php echo esc_html( cmb2_get_option('compara_inmuebles_theme_options', 'telefono_contacto') ); ?></h3><?php endif; ?>
                  </div>
              </div>
          </div>
          <div class="col-lg-4">
              <aside class="sidebar-area ltn__right-sidebar">
                  <!-- Newsletter Widget -->
                  <div class="widget ltn__search-widget ltn__newsletter-widget">                            
                    <?php if($formulario_newsletter): echo $formulario_newsletter; endif; ?>
                    <div class="ltn__newsletter-bg-icon">
                        <i class="fas fa-envelope-open-text"></i>
                    </div>
                  </div>
                  <!-- Banner Widget -->
                  <div class="widget ltn__banner-widget">
                      <a href=""><img src="" alt="Banner Image"></a>
                  </div>

              </aside>
          </div>
      </div>
  </div>
</div>
<!-- FAQ AREA START -->
<?php
endif;