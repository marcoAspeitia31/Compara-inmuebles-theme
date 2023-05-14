<?php
/**
 * Display the property datos de contacto of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$correo_contacto = get_post_meta(get_the_ID(),'field_correo_contacto',true);
$tipo_propietario = get_post_meta(get_the_ID(),'field_tipo_propietario',true);
$numero_contacto = get_post_meta(get_the_ID(),'field_telefono_contacto',true);
$whatsapp = get_post_meta(get_the_ID(),'field_whatsapp',true);
if (!empty($correo_contacto) || (!empty($numero_contacto) && $numero_contacto != '1') || (!empty($whatsapp) && $whatsapp != '1')):
?>
<h4 class="title-2">Datos de contacto</h4>  
<div class="property-detail-info-list section-bg-1 clearfix mb-60">                          
    <ul>
        <?php if(!empty($correo_contacto)): ?><li><label>Correo electrónico de contacto:</label> <span><?php echo esc_html($correo_contacto); ?></span></li><?php endif; ?>
        <?php if(!empty($numero_contacto) && $numero_contacto != '1'): ?><li><label>Número de contacto:</label> <span><?php echo esc_html($numero_contacto); ?> </span></li><?php endif;?>
        <?php if(!empty($whatsapp) && $whatsapp != '1'): ?><li><label>WhatsApp:</label> <span><?php echo esc_html($whatsapp); ?> </span></li><?php endif; ?>
        <?php if(!empty($tipo_propietario)): ?><li><label>Tipo de propietario:</label> <span><?php echo esc_html($tipo_propietario); ?></span></li><?php endif; ?>
    </ul>
</div>
<?php
endif;