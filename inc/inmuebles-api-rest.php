<?php
function listar_inmuebles_api(){
  register_rest_route( 
    'compara-inmuebles/v1',
    '/inmuebles/(?P<page>\d+)',
    array(
    'method'=>'GET',
    'callback' => 'listar_inmuebles',
    'permisson_callback' => function(){
      return true;
    })
  );
}
add_action('rest_api_init','listar_inmuebles_api');

function listar_inmuebles($data){
  $orderby = isset($data['sortby']) ? 'meta_value_num' : 'date';
  $meta_key = isset($data['sortby']) ? $data['sortby'] : '';
  $args = array(
    'post_type' => array('inmuebles'),
    'post_status' => array('publish'),
    'posts_per_page' => $data['posts_to_show'],
    'paged' => $data['page'],
    'order' => 'DESC',
    'orderby' => $orderby,
    'meta_key' => $meta_key,
  );

  $inmuebles_query = new WP_Query($args);

  if($inmuebles_query->have_posts(  )){

    while($inmuebles_query->have_posts(  )){
      
      $inmuebles_query->the_post();
      $terms = get_the_terms(get_the_ID(), 'estados_de_inmueble');
      $term = array_shift($terms);
      $inmuebles_object[] = array(
        'image' => get_the_post_thumbnail_url( get_the_ID(), 'grid-inmueble'),
        'title' => get_the_title(),
        'direccion' => get_post_meta(get_the_ID(), 'inmueble_direccion',true),
        'directory_uri' => esc_url(get_template_directory_uri(  )),
        'permalink' => get_the_permalink( get_the_ID()),
        'precio' => get_post_meta(get_the_ID(),'field_precio',true),
        'estado_inmueble' => $term->name,
        'numero_recamaras' => get_post_meta(get_the_ID(),'field_numero_recamaras',true),
        'numero_banos' => get_post_meta(get_the_ID(),'field_numero_banos',true),
        'tamano_const' => get_post_meta(get_the_ID(),'field_tamano_construccion',true),
      );
    }
    return $inmuebles_object;
  }
  else{
    $inmuebles_object = array(
      'code' => 'Inmuebles error',
      'message' => 'No pudimos traernos los inmuebles',
      'data' => array(
        'status' => '400'
      )
    );
    return $inmuebles_object;
  }
}