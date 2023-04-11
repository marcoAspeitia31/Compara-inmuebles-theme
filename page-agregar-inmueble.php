<?php
/*
* Template Name: Agregar inmueble
*/
get_header();
while ( have_posts() ) :
  the_post();
  get_template_part( 'template-parts/content', 'breadcrumb' );?>

    <!-- APPOINTMENT AREA START -->
    <div class="ltn__appointment-area pb-120 ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__appointment-inner">
                        <form action="#">
                            <?php get_template_part( 'template-parts/agregar-inmueble/datos', 'contacto' ); ?>
                            <?php get_template_part( 'template-parts/agregar-inmueble/descripcion', 'inmueble' ); ?>
                            <?php get_template_part( 'template-parts/agregar-inmueble/detalles', 'inmueble' ); ?>
                            <?php get_template_part( 'template-parts/agregar-inmueble/media', 'inmueble' ); ?>
                            <?php get_template_part( 'template-parts/agregar-inmueble/ubicacion', 'inmueble' ); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- APPOINTMENT AREA END -->
<?php
endwhile;
get_footer(); 