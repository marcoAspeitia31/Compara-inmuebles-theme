<?php
/*
* Template Name: Preguntas frecuentes
*/
get_header();
while ( have_posts() ) :
  the_post();
  get_template_part( 'template-parts/content', 'breadcrumb' );
  get_template_part( 'template-parts/faq/preguntas'); 
  get_template_part( 'template-parts/faq/info'); 
  get_template_part( 'template-parts/front-page/ultimas', 'noticias'); 
endwhile;
get_footer(); 