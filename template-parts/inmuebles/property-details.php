<?php
/**
 * Display the property details of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$estados_de_inmueble = get_the_terms(get_the_ID(), 'estados_de_inmueble');
$field_precio = get_post_meta(get_the_ID(),'field_precio',true);
$precio = $field_precio ? '$'.number_format($field_precio,2,'.',',') : 'Sin precio publicado';
if ($estados_de_inmueble):
    $term_1 = array_shift($estados_de_inmueble);
    $term_1_name = $term_1->name;
endif;
$tamano_const = get_post_meta(get_the_ID(),'field_tamano_construccion',true);
$cuartos = get_post_meta(get_the_ID(),'field_numero_cuartos',true);
$numero_banos = get_post_meta(get_the_ID(),'field_numero_banos',true);
$ano_const = get_post_meta(get_the_ID(),'field_ano_construccion',true);
$tamano_terreno = get_post_meta(get_the_ID(),'field_tamano_terreno',true);
$recamaras = get_post_meta(get_the_ID(),'field_numero_recamaras',true);
$numero_medios_banos = get_post_meta(get_the_ID(),'field_numero_medios_banos',true);
$numero_cajones_estacionamiento = get_post_meta(get_the_ID(),'field_cajones_estacionamiento',true);
?>
<h4 class="title-2">Property Detail</h4>  
<div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
    <ul>
        <li><label>Tamaño construcción: </label> <span><?php echo esc_html($tamano_const); ?>  m²</span></li>
        <li><label>Cuartos:</label> <span><?php echo esc_html($cuartos); ?> </span></li>
        <li><label>Baños:</label> <span><?php echo esc_html($numero_banos); ?> </span></li>
        <li><label>Medios baños:</label> <span><?php echo esc_html($numero_medios_banos); ?> </span></li>
        <li><label>Año de construcción:</label> <span><?php echo esc_html($ano_const); ?></span></li>
    </ul>
    <ul>
        <li><label>Tamaño terreno:</label> <span><?php echo esc_html($tamano_terreno); ?>  m²</span></li>
        <li><label>Recamaras:</label> <span><?php echo esc_html($recamaras); ?></span></li>
        <li><label>Cajones de estacionamiento:</label> <span><?php echo esc_html($numero_cajones_estacionamiento); ?></span></li>
        <li><label>Precio:</label> <span><?php echo esc_html($precio); ?></span></li>
        <li><label>Estatus de la propiedad:</label> <span><?php echo isset( $term_1_name ) ? $term_1_name : ''; ?></span></li>
    </ul>
</div>