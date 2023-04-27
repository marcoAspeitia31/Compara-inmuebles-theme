<?php
get_header();
while(have_posts(  )):the_post(  );
set_post_views(get_the_ID());
get_template_part('template-parts/content','breadcrumb');
?>
<div class="ltn__page-details-area ltn__blog-details-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-details-wrap">
                    <div class="ltn__page-details-inner ltn__blog-details-inner">
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
                        <h2 class="ltn__blog-title"><?php the_title(); ?></h2>
                        <div class="ltn__blog-meta">
                            <ul>
                                <li class="ltn__blog-author">
                                    <a href="#"><img src="<?php echo esc_attr(esc_url(get_avatar_url( get_the_author_meta( 'ID' ) ))); ?>" alt="#">By: <?php the_author();?></a>
                                </li>
                                <li class="ltn__blog-date">
                                    <i class="far fa-calendar-alt"></i><?php echo esc_html(get_the_date("F j, Y", get_the_ID()));?>
                                </li>
                                <li>
                                    <a href="#"><i class="far fa-comments"></i><?php echo esc_html(get_comments_number(get_the_ID()));?> Comentarios</a>
                                </li>
                            </ul>
                        </div>
                        <?php the_content(); ?>
                        <!-- blog-tags-social-media -->
                        <?php get_template_part( 'template-parts/posts/blog-tags-social', 'media' ); ?>
                        <!-- prev-next-btn -->
                        <?php get_template_part( 'template-parts/posts/prev', 'next' ); ?>
                        <!-- related-post -->
                        <?php get_template_part( 'template-parts/posts/related', 'posts' ); ?>
                        <!-- comment-area -->
                        <div class="ltn__comment-area mb-50">
                            <div class="ltn-author-introducing clearfix">
                                <div class="author-img">
                                    <img src="img/blog/author.jpg" alt="Author Image">
                                </div>
                                <div class="author-info">
                                    <h6>Written by</h6>
                                    <h2>Rosalina D. William</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation is enougn for today.</p>
                                </div>
                            </div>
                            <?php
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            ?>
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
<?php
endwhile;
get_footer();