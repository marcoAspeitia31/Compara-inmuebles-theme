<?php
/**
 * Display the property details of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
    $estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
    $field_precio = get_post_meta(get_the_ID(),'field_precio',true);
    $precio = $field_precio ? number_format($field_precio,2,'.',) : '';
    if ($estados_de_inmueble):
        $term_1 = array_shift($estados_de_inmueble);
        $term_1_name = $term_1->name;
    endif;
?>
<h4 class="title-2">Property Detail</h4>  
<div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
    <ul>
        <li><label>Property ID:</label> <span>HZ29</span></li>
        <li><label>Tamaño construcción: </label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_tamano_construccion',true)); ?>  m²</span></li>
        <li><label>Cuartos:</label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_numero_cuartos',true)); ?> </span></li>
        <li><label>Baños:</label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_numero_banos',true)); ?> </span></li>
        <li><label>Año de construcción:</label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_ano_construccion',true)); ?></span></li>
    </ul>
    <ul>
        <li><label>Lot Area:</label> <span>HZ29 </span></li>
        <li><label>Tamaño terreno:</label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_tamano_terreno',true)); ?>  m²</span></li>
        <li><label>Recamaras:</label> <span><?php echo esc_html(get_post_meta(get_the_ID(),'field_numero_recamaras',true)); ?></span></li>
        <li><label>Precio:</label> <span>$<?php echo esc_html($precio); ?></span></li>
        <li><label>Estatus de la propiedad:</label> <span><?php echo isset( $term_1_name ) ? $term_1_name : ''; ?></span></li>
    </ul>
</div>