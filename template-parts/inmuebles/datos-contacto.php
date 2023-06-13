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
        <?php if(!empty($correo_contacto)): ?>
            <li>
                <i class="far fa-envelope"></i>
                <label>Email: </label>
                <a href="mailto:<?php echo esc_html($correo_contacto); ?>"><span><?php echo esc_html($correo_contacto); ?></span></a> 
            </li>
        <?php endif; ?>
        <?php if(!empty($numero_contacto) && $numero_contacto != '1'): ?>
            <li>
                <i class="fas fa-phone"></i>
                <label>Número de teléfono: </label>
                <a href="tel: <?php echo esc_html($numero_contacto); ?>"><span><?php echo esc_html($numero_contacto); ?></span></a>
            </li>
        <?php endif;?>
        <?php if(!empty($whatsapp) && $whatsapp != '1'): ?>
            <li>
                <i class="fab fa-whatsapp"></i>
                <label>WhatsApp: </label>
                <span><?php echo esc_html($whatsapp); ?> </span>
            </li>
        <?php endif; ?>
        <?php if(!empty($tipo_propietario)): ?>
            <li>
                <i class="far fa-user-circle"></i>
                <label>Tipo de propietario: </label>
                <span><?php echo esc_html($tipo_propietario); ?></span>
            </li>
        <?php endif; ?>
    </ul>
</div>
<?php
endif;