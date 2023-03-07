<?php
/**
 * Get the terms related to post.
 */ 
$terms = get_the_terms( get_the_ID(), 'areas_amenidades' );

if ( ! empty( $terms ) ) :

    ?>
    <h4 class="title-2 mb-10">Amenidades</h4>
    <div class="property-details-amenities mb-60">
        <div class="row">
            <?php
            foreach ( $terms as $term ) :
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__menu-widget">
                    <?php
                    echo sprintf( '<i class="fa-solid fa-circle-check"></i> <span>%s<span>',
                        esc_html( $term->name )
                    );
                    ?>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </div><!-- row -->
    </div><!-- property-details-amenities -->
    <?php
endif;
?>