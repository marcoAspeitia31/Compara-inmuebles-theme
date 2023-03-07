<?php
/**
 * 
 */
?>

<h4 class="title-2">From Our Gallery</h4>
<div class="ltn__property-details-gallery mb-30">
    <div class="row">
        <?php 
            $imagenes = get_post_meta(get_the_ID(),'field_galeria_imagenes',true);
            $i_col_img = 0;
            $i_col_img_gnr = 0;
            
            if ( ! empty( $imagenes ) ) :

                foreach ( $imagenes as $id=>$imagen ) :

                    if ( $i_col_img == 0 ) :
                    ?>
                        <div class="col-md-6">
                        <?php endif; ?>
                        <?php
                            if(($i_col_img_gnr+1)%3 == 0 && $i_col_img_gnr != 0):
                                $i_col_img =2;
                                ?>
                                <a href="<?php echo esc_attr(esc_url($imagen)); ?>" data-rel="lightcase:myCollection">
                                    <?php echo wp_get_attachment_image( $id, 'inmueble-galeria-2', false, [ 'class'=> 'mb-30 img-fluid' ] ); ?>
                                </a>
                            <?php
                            else:
                                $i_col_img++;
                                ?>
                                <a href="<?php echo esc_attr(esc_url($imagen)); ?>" data-rel="lightcase:myCollection">
                                    <?php echo wp_get_attachment_image( $id, 'inmueble-galeria-1', false, [ 'class'=>'mb-30 img-fluid' ] );?>
                                </a>
                            <?php 
                            endif;
                        $i_col_img_gnr++;
                        if ($i_col_img == 2 || end($imagenes) == $imagen):
                            $i_col_img = 0;
                        ?>
                        </div>
                    <?php
                    endif;

                endforeach;

            endif;
        ?>
        <div class="col-md-6">
            <a href="<?php echo esc_url( get_the_post_thumbnail_url( 'full' ) );?>" data-rel="lightcase:myCollection">
                <?php the_post_thumbnail( 'inmueble-galeria-2', array( 'class'=>'mb-30 img-fluid' ) ); ?>
            </a>
        </div>
    </div>
</div>