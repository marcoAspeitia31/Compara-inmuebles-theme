<?php
/**
 * Display the facts and features of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */

$features = get_post_meta( get_the_ID() , 'grupo_facts_features' , true );

if( ! empty( $features ) ):

    ?>

    <h4 class="title-2">Facts and Features</h4>
    <!-- property-detail-feature-list -->
    <div class="property-detail-feature-list clearfix mb-45">                            
        <ul>
        <?php foreach ($features as $feature): 
            if (!empty($feature['feature'])):?>
            <li>
                <div class="property-detail-feature-list-item">
                    <?php
                    if( ! empty( $feature['iconselect'] ) ):
                        echo sprintf(
                            '<i class="%s"></i>',
                            esc_attr($feature['iconselect'])
                        );
                    else:
                        echo '<i class="fa-solid fa-circle-check"></i>';
                    endif;
                    ?>
                    <div>
                        <h6><?php echo esc_html($feature['feature']); ?></h6>
                        <?php if(!empty($feature['desc'])): ?>
                        <small><?php echo esc_html($feature['desc']); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
        <?php endif;
        endforeach; ?>
        </ul>
    </div>
    <!-- property-detail-feature-list end -->

    <?php

endif;