<?php
/*
* Template Name: Contacto
*/
get_header();
while ( have_posts() ) :
  the_post();
  get_template_part( 'template-parts/content', 'breadcrumb' );

  get_template_part( 'template-parts/contacto/info','contacto');

  get_template_part( 'template-parts/contacto/formulario','contacto'); 

  get_template_part( 'template-parts/contacto/mapa','contacto'); 
endwhile;
get_footer(); 