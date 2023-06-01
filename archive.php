<?php

get_header();
get_template_part( 'template-parts/content', 'breadcrumb' );

if( have_posts(  ) ):

?>
<!-- BLOG AREA START -->
<div class="ltn__blog-area mb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__blog-list-wrap">
                    <?php
                    while(have_posts(  )): the_post(  );
                        if(get_post_type() === 'inmuebles'){
                            get_template_part( 'template-parts/inmuebles-list/inmueble' );
                        }
                        else{
                            get_template_part( 'template-parts/posts/post' );
                        }
                    endwhile; 
                    ?>
                </div>
                <?php ci_pagination(); ?>
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