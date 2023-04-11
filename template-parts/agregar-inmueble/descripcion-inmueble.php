<?php
/**
 * Template part for displaying a descripcion del inmueble form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$terms_estado_inmuebles = get_terms('estados_de_inmueble', array('hide_empty' => false));
$terms_tipos_inmuebles = get_terms('tipos_inmuebles', array('hide_empty' => false));
?>
<h2>Descripción del inmueble</h2>
<div class="row">
    <div class="col-md-12">
        <h6>Titulo</h6>
        <div class="input-item input-item-name ltn__custom-icon">
            <input type="text" name="titulo" placeholder="Titulo (Obligatorio)">
        </div>
        <h6>Descripción</h6>
        <div class="input-item input-item-textarea ltn__custom-icon">
            <textarea name="descripcion" placeholder="Descripcion"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <h6>Año de construcción</h6>
        <div class="input-item input-item-name ltn__custom-icon">
            <input type="text" name="year_construccion" placeholder="2002">
        </div>
    </div>
    <div class="col-md-6">
      <div class="input-item">
            <h6>Estado de inmueble</h6>
            <select class="nice-select">
            <?php
            if (!empty ($terms_estado_inmuebles) ):
              foreach($terms_estado_inmuebles as $term):
              ?>
                <option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name);?></option>
              <?php
              endforeach;
            endif;
            ?>
            </select>
        </div>
    </div>
    <div class="col-md-6">
      <div class="input-item">
            <h6>Tipo de inmueble</h6>
            <select class="nice-select">
            <?php
            if (!empty ($terms_tipos_inmuebles) ):
              foreach($terms_tipos_inmuebles as $term):
              ?>
                <option value="<?php echo esc_attr($term->slug); ?>"><?php echo esc_html($term->name);?></option>
              <?php
              endforeach;
            endif;
            ?>
            </select>
        </div>
    </div>
</div>