<?php

get_header();

if( have_posts(  ) ):

    get_template_part( 'template-parts/content', 'breadcrumb' );
?>
<!-- BLOG AREA START -->
<div class="ltn__blog-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-list-wrap">
                    <?php
                    while(have_posts(  )): the_post(  );
                    ?>
                    <!-- Blog Item -->
                    <div class="ltn__blog-item ltn__blog-item-5">
                        <div class="ltn__blog-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'blog-thumbnail', array( 'class' => 'img-fluid' ) ); ?></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories):                               
                                    ?>
                                        <li class="ltn__blog-category">
                                            <a href="<?php echo esc_attr(esc_url(get_category_link( $categories[0]->cat_ID ))); ?>"><?php echo esc_html($categories[0]->name) ?></a>
                                        </li>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h3>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li>
                                        <a href="#"><i class="far fa-eye"></i><?php echo esc_html( get_post_meta( get_the_ID(), 'post_views_count', true ) ? get_post_meta( get_the_ID(), 'post_views_count', true ) : '0' ); ?> Views</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="far fa-comments"></i><?php echo esc_html(get_comments_number(get_the_ID()));?> Comments</a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i><?php echo esc_html(get_the_date("F j, Y", get_the_ID()));?>
                                    </li>
                                </ul>
                            </div>
                            <p><?php echo wp_trim_excerpt(get_the_excerpt()); ?></p>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-author">
                                            <a href="#"><img src="<?php echo esc_attr(esc_url(get_avatar_url( get_the_author_meta( 'ID' ) ))); ?>" alt="#">By: <?php the_author(); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i>Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ltn__pagination-area text-center">
                            <div class="ltn__pagination">
                                <?php
                                    ci_pagination();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <?php get_sidebar( 'blog' ); ?>
            </div>
        </div>
    </div>
</div>
<!-- BLOG AREA END -->
<?php
endif;
    
get_footer(); 