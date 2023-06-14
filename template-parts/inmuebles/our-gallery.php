<?php
/**
 * 
 */
$imagenes = get_post_meta(get_the_ID(),'field_galeria_imagenes',true);
if(! empty( $imagenes ) ):
?>
    <h4 class="title-2">From Our Gallery</h4>
    <div class="ltn__property-details-gallery mb-30">
        <div class="row">
            <div class="col-md-12 slider-for">
                <?php foreach ( $imagenes as $id=>$imagen ) : ?>
                    <div>
                        <a href="<?php echo esc_attr( esc_url( $imagen ) ); ?>" data-rel="lightcase:myCollection">
                            <?php echo wp_get_attachment_image( $id, 'full', false, [ 'class'=> 'mb-30 img-fluid' ] ); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-12 slider-nav">
                <?php foreach ( $imagenes as $id=>$imagen ) : ?>
                    <div>
                        <?php echo wp_get_attachment_image( $id, 'thumbnail', false, [ 'class'=> 'mb-30 img-fluid' ] ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php
endif;