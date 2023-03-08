<?php
/**
 * Display the property video of single-inmuebles.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$video = get_post_meta( get_the_ID(),'field_video' , true);
if ( ! empty( $video ) ):
  $oembed = new WP_oEmbed();
  $video_data =$oembed->get_data($video);
  $url_embed = preg_replace(
  "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
  "https://www.youtube.com/embed/$2",
  $video);
?>
  <h4 class="title-2">Property Video</h4>
    <div class="ltn__video-bg-img ltn__video-popup-height-500 bg-overlay-black-50 bg-image mb-60" data-bg="<?php echo esc_attr(esc_url( $video_data ? $video_data->thumbnail_url : '')); ?>">
        <a class="ltn__video-icon-2 ltn__video-icon-2-border---" href="<?php echo esc_attr(esc_url($url_embed.'?autoplay=1&showinfo=0')); ?>" data-rel="lightcase:myCollection">
            <i class="fa fa-play"></i>
        </a>
    </div>
<?php
endif;