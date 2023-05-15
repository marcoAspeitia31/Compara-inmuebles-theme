<?php
/**
 * Template part for displaying leatest News Feeds part in front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 * @since 1.0.0
 */
$cant_noticias = get_post_meta(get_the_ID(), 'cantidad_noticias',true) ? get_post_meta(get_the_ID(), 'cantidad_noticias',true) : 5 ;
$args = array(
  'posts_per_page' => $cant_noticias,
  'orderby' => 'date',
  'order' => 'DESC'
);
$noticias = new WP_Query( $args );
if (!empty($noticias)):
?>
<div class="ltn__blog-area pt-80 pb-70">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title-area ltn__section-title-2--- text-center">
                <h6 class="section-subtitle section-subtitle-2 text-white">Noticias</h6>
                <h1 class="section-title">Ultimas Noticias</h1>
            </div>
        </div>
    </div>
    <div class="row  ltn__blog-slider-one-active slick-arrow-1 ltn__blog-item-3-normal">
      <?php while($noticias->have_posts()): $noticias->the_post(); ?>
        <div class="col-lg-12">
            <div class="ltn__blog-item ltn__blog-item-3">
                <div class="ltn__blog-img">
                    <a href="<?php the_permalink();?>"><img src="<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(get_the_ID(), 'grid-inmueble')));?>" alt="#" ></a>
                </div>
                <div class="ltn__blog-brief">
                    <div class="ltn__blog-meta">
                        <ul>
                            <li class="ltn__blog-author">
                                <a href="<?php echo esc_url(esc_attr( get_author_posts_url(get_the_author_meta('ID')))); ?>"><i class="far fa-user"></i><?php the_author(); ?></a>
                            </li>
                            <?php
                                $tags = get_the_tags();
                                if ($tags):                               
                                 ?>
                                    <li class="ltn__blog-tags">
                                        <a href="<?php echo esc_attr(esc_url(get_tag_link( $tags[0]->term_id ))); ?>"><i class="fas fa-tags"></i><?php echo esc_html($tags[0]->name) ?></a>
                                    </li>
                                <?php
                                endif;
                            ?>
                        </ul>
                    </div>
                    <h3 class="ltn__blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="ltn__blog-meta-btn">
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i><?php echo esc_html(get_the_date('F j, Y'));   ?></li>
                            </ul>
                        </div>
                        <div class="ltn__blog-btn">
                            <a href="<?php the_permalink(); ?>">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php endwhile; wp_reset_postdata(  ); ?>
    </div>
  </div>
</div>
<?php
endif;