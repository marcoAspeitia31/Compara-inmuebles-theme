<?php
/**
 * Display the prev and next post of single-post.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$prev_post = get_previous_post() ? get_previous_post() : false;
$next_post = get_next_post() ? get_next_post() : false;
?>

<div class="ltn__prev-next-btn row mb-50">
  <div class="blog-prev col-lg-6">
          
  <?php
  if ($prev_post):
    ?>
      <h6>Prev Post</h6>
      <h3 class="ltn__blog-title"><a href="<?php echo esc_url(esc_attr( get_permalink($prev_post->ID) )); ?>"><?php echo esc_html(get_the_title($prev_post->ID)); ?></a></h3>
    <?php
  endif;
  ?>
  </div>
  <div class="blog-prev blog-next text-right col-lg-6">
         
  <?php
  if ($next_post):
    ?>
      <h6>Next Post</h6>
      <h3 class="ltn__blog-title"><a href="<?php echo esc_url(esc_attr( get_permalink($next_post->ID) )); ?>">><?php echo esc_html(get_the_title($next_post->ID)); ?></a></h3>
    <?php
  endif;
  ?>
  </div>
</div>
<hr>