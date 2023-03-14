<?php
/**
 * Template part for displaying some featured properties in a banner slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$slides = get_post_meta(get_the_ID(), 'front_page_grupo_slider1',true);
$i_slides = 1;
if( ! empty( $slides ) ):
?>
<div class="ltn__slider-area ltn__slider-3  section-bg-2">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        <?php
        foreach($slides as $slide):
            $class_slide_text = '';
            switch ($i_slides) :
                case 1:
                    $class_slide_text = 'text-center';
                    break;
                
                case 2:
                    $class_slide_text = 'text-right';
                    break;
                case 3:
                    $class_slide_text = "text-left";
                    $i_slides = 0;
                    break;
            endswitch;
        ?>
        <!-- ltn__slide-item -->
        <?php 
        $image_id = isset($slide['image_id']) ? $slide['image_id'] : false;
        $image_url = $image_id ? wp_get_attachment_image_src( $slide['image_id'], 'full')[0] : '' ;
        ?>
        <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal--- ltn__slide-item-3 bg-image bg-overlay-theme-black-60" data-bg="<?php echo esc_attr(esc_url($image_url)); ?>">
            <div class="ltn__slide-item-inner <?php echo esc_attr( $class_slide_text ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 align-self-center">
                            <div class="slide-item-info">
                                <div class="slide-item-info-inner ltn__slide-animation">
                                    <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>
                                    <h1 class="slide-title animated "><?php echo esc_html($slide['title']); ?></h1>
                                    <div class="slide-brief animated">
                                        <p><?php echo esc_html($slide['description']); ?></p>
                                    </div>
                                    <div class="btn-wrapper animated">
                                    <?php if (isset($slide['text_btn_1']) && strlen($slide['text_btn_1']) > 0):?>
                                        <a href="<?php echo (isset($slide['selec_btn_1'])) ? esc_attr( $slide['selec_btn_1'] ) : '#' ?>" class="theme-btn-1 btn btn-effect-1"><?php echo $slide['text_btn_1'] ?></a>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $i_slides++;
        endforeach;
        ?>
    </div>
</div>
<!-- SLIDER AREA END -->
<?php
endif;