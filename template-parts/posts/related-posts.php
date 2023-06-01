<?php
/**
 * Display the related posts of single-post.php
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$tags = wp_get_post_tags($post->ID);
if ($tags):
  foreach($tags as $tag) $tag_ids[] = $tag->term_id;
  $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array(get_the_ID(  )),
    'ignore_sticky_posts'=>true,
    'posts_per_page'=> 2,
  );
  $related_posts = new WP_Query($args);
?>

<div class="related-post-area mb-50">
  <h4 class="title-2">Noticias relacionadas</h4>
  <div class="row">
  <?php
    if ($related_posts->have_posts(  )):
      while($related_posts->have_posts()):
        $related_posts->the_post();
        ?>
          <div class="col-md-6">
            <!-- Blog Item -->
            <div class="ltn__blog-item ltn__blog-item-6">
              <div class="ltn__blog-img">
                <a href="<?php echo esc_url(esc_attr(get_permalink())); ?>"><?php the_post_thumbnail( 'blog-related-card', array( 'class' => 'img-fluid' ) ); ?></a>
              </div>
              <div class="ltn__blog-brief">
                <div class="ltn__blog-meta">
                  <ul>
                    <li class="ltn__blog-date ltn__secondary-color">
                      <i class="far fa-calendar-alt"></i><?php echo esc_html(get_the_date("F j, Y", get_the_ID()));?>
                    </li>
                  </ul>
                </div>
                <h3 class="ltn__blog-title"><a href="<?php echo esc_url(esc_attr(get_permalink())); ?>"><?php the_title(); ?></a></h3>
                <p><?php echo wp_trim_excerpt(get_the_excerpt()); ?></p>
              </div>
            </div>
          </div>
        <?php
      endwhile;
    endif;
    wp_reset_postdata();
    ?>
  </div>
</div>
<?php
endif;