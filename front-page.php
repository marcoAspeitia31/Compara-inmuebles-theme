<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Compara_inmuebles
 */
$slides = get_post_meta(get_the_ID(), 'front_page_grupo_slider1',true);
if( ! empty( $slides ) ){
    get_header("front");
}
else{
    get_header();
}
    get_template_part( 'template-parts/front-page/main', 'banner' ); 

    get_template_part( 'template-parts/front-page/search', 'form'); 

    get_template_part( 'template-parts/front-page/services'); 

    get_template_part( 'template-parts/front-page/tipos', 'inmuebles'); 

    get_template_part( 'template-parts/front-page/propiedades', 'destacadas'); 
    
    get_template_part( 'template-parts/front-page/testimoniales'); 
    
    get_template_part( 'template-parts/front-page/ultimas', 'noticias'); 
    ?>

    </body>
</html>
<?php
get_footer();
