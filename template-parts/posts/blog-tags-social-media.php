<?php
/**
 * Display the related tags and social media of single-post.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$tags = wp_get_post_tags($post->ID);
$current_post_url = get_permalink();
$post_title = get_the_title();
$site_name = get_bloginfo('name');
$site_description = get_bloginfo('description');
?>
<div class="ltn__blog-tags-social-media mt-80 row">
  <div class="ltn__tagcloud-widget col-lg-8">
      <h4>Releted Tags</h4>
      <?php
      if ($tags):
        foreach($tags as $tag) $tag_ids[] = $tag->term_id;
        $args=array(
          'tag__in' => $tag_ids,
          'post__not_in' => array(get_the_ID(  )),
          'caller_get_posts'=>1,
        );
        $related_tags = get_tags($args);
        if (count($related_tags) > 0):
          ?>
          <ul>
            <?php
            foreach ($related_tags as $tag):
                echo '<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
            endforeach;
            ?>
          </ul>
          <?php
        endif;
      endif;
      ?>
  </div>
  <div class="ltn__social-media text-right col-lg-4">
    <h4>Social Share</h4>
    <ul>
      <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_post_url; ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
      <li><a href="https://twitter.com/intent/tweet?url=<?php echo $current_post_url; ?>&text=¡Echa un vistazo a este interesante post!" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
    </ul>
  </div>
</div>
<hr>