<?php
/**
 * Template part for displaying some featured properties in a banner slider
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>
<!-- SLIDER AREA START (slider-3) -->
<div class="ltn__slider-area ltn__slider-3  section-bg-1">
    <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        <?php

            $slides = get_post_meta(get_the_ID(), 'front_page_grupo_slider1',true);
            $i_slides = 1;

            if( ! empty( $slides ) ):

                foreach($slides as $slide):

                    $extra_slide_class = ($i_slides%2 == 0) ? 'text-right' : '';
                    $extra_img_class = ($i_slides%2 == 0) ? 'slide-img-left' : '';
                    $extra_h1_class = ($i_slides%2 == 0) ? 'pl-5' : 'col-10';

                    ?>
                    <!-- ltn__slide-item -->
                    <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3-normal ltn__slide-item-3">
                        <div class="ltn__slide-item-inner <?php echo esc_attr($extra_slide_class); ?>">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 align-self-center">
                                        <div class="slide-item-info">
                                            <div class="slide-item-info-inner ltn__slide-animation">
                                                <div class="slide-video mb-50 d-none">
                                                    <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/tlThdr3O5Qo" data-rel="lightcase:myCollection">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                                <h6 class="slide-sub-title white-color--- animated"><span><i class="fas fa-home"></i></span> Real Estate Agency</h6>
                                                <h1 class="slide-title animated <?php echo esc_attr($extra_h1_class); ?>"><?php echo $slide['title']; ?></h1>
                                                <div class="slide-brief animated">
                                                    <p><?php echo $slide['description']; ?></p>
                                                </div>
                                                <div class="btn-wrapper animated">
                                                    <?php if (isset($slide['text_btn_1']) && strlen($slide['text_btn_1']) > 0):?>
                                                    <a href="<?php echo (isset($slide['selec_btn_1'])) ? esc_attr( $slide['selec_btn_1'] ) : '#' ?>" class="theme-btn-1 btn btn-effect-1"><?php echo $slide['text_btn_1'] ?></a>
                                                    <?php endif; ?>
                                                    <?php if(isset($slide['text_btn_2']) && strlen($slide['text_btn_2']) > 0):?>
                                                        <a href="<?php echo (isset($slide['selec_btn_2'])) ? esc_attr( $slide['selec_btn_2'] ) : '#' ?>" class="btn btn-transparent btn-effect-3"><?php echo $slide['text_btn_2']; ?></a>
                                                    <?php endif; ?>
                                                    <?php if (isset($slide['video']) && strlen($slide['video']) > 0):
                                                        $url_embed = preg_replace(
                                                            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                                                            "https://www.youtube.com/embed/$2",
                                                            $slide['video']);
                                                        ?>
                                                    <a class="ltn__video-play-btn bg-white" href="<?php echo esc_url($url_embed).'?autoplay=1&showinfo=0'; ?>" data-rel="lightcase">
                                                        <i class="icon-play  ltn__secondary-color"></i>
                                                    </a>
                                                    <?php endif?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- slide-item-info end-->
                                        <div class="slide-item-img <?php echo esc_attr($extra_img_class); ?>">
                                            <?php echo wp_get_attachment_image( $slide['image_id'], 'full', false, array() ); ?>
                                        </div>
                                        <!-- slide-item-img end-->
                                    </div>
                                </div>
                            </div>
                            <!-- container end-->
                        </div>
                    </div>
                    <!-- ltn__slide-item end-->
                    <?php

                    $i_slides++;

                endforeach;
                
            endif;
        ?>
    </div>
</div>
<!-- SLIDER AREA END -->