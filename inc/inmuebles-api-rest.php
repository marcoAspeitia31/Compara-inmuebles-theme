<?php
function listar_inmuebles_api(){
  register_rest_route( 
    'compara-inmuebles/v1',
    '/inmuebles/(?P<page>\d+)',
    array(
    'method'=>'GET',
    'callback' => 'listar_inmuebles',
    'permission_callback' => function(){
      return true;
    })
  );

  register_rest_route(
    'compara-inmuebles/v1',
    '/estados-localidades',
    array(
      'method' => 'GET',
      'callback' => 'obtener_estados_con_localidades',
    )
  );

  register_rest_route(
    'compara-inmuebles/v1',
    '/localidades',
    array(
      'method' => 'POST',
      'callback' => 'obtener_localidades',
    )
  );
}
add_action('rest_api_init','listar_inmuebles_api');

function listar_inmuebles($data){
  $orderby = isset($data['sortby']) ? 'meta_value_num' : 'date';
  $meta_key = isset($data['sortby']) ? $data['sortby'] : '';
  $order = isset($data['orderby']) ? $data['orderby'] : 'DESC';
  $search = isset($data['search']) ? $data['search'] : '';
  $min_const = isset($data['constr_min']) ? $data['constr_min'] : 0;
  $max_const = isset($data['constr_max']) ? $data['constr_max'] : 9999999;
  $min_terreno = isset($data['terreno_min']) ? $data['terreno_min'] : 0;
  $max_terreno = isset($data['terreno_max']) ? $data['terreno_max'] : 9999999;
  $tipo_inmuebles = isset($data['tipo_inmueble']) ? array(
    'taxonomy' => 'tipos_inmuebles',
    'field' => 'slug',
    'terms' => $data['tipo_inmueble'],
  ) : '';
  $estado_inmuebles = isset($data['estados_inmueble']) ? array(
    'taxonomy' => 'estados_de_inmueble',
    'field' => 'slug',
    'terms' => $data['estados_inmueble'],
  ) : '';
  $amenidades_inmuebles = isset($data['amenidades_inmueble']) ? array(
    'taxonomy' => 'areas_amenidades',
    'field' => 'slug',
    'terms' => $data['amenidades_inmueble'],
    'operator' => 'AND'
  ) : '';
  $precio_min_max = isset($data['precio_max']) && isset($data['precio_min']) ? array(
    'key' => 'field_precio',
    'value' => array($data['precio_min'],$data['precio_max']),
    'type' => 'numeric',
    'compare' => 'BETWEEN',
  ) : '';
  $locacion_inmueble = isset($data['location']) ? array(
    'key'=> 'administrative_area_level_1',
    'value' => $data['location'],
    'type' => 'CHAR',
    'compare' => '='
  ) : '';
  $sublocacion_inmueble = isset($data['sublocation']) ? array(
    'key'=> 'locality',
    'value' => $data['sublocation'],
    'type' => 'CHAR',
    'compare' => '='
  ) : '';
  $recamaras = isset($data['recamaras']) ? array(
    'key'=> 'field_numero_recamaras',
    'value' => $data['recamaras'],
    'type' => 'numeric',
    'compare' => '='
  ) : '';
  $construccion_min_max = isset($data['constr_min']) || isset($data['constr_max']) ? array(
    'key' => 'field_tamano_construccion',
    'value' => array($min_const,$max_const),
    'type' => 'numeric',
    'compare' => 'BETWEEN',
  ) : '';
  $terreno_min_max = isset($data['terreno_min']) || isset($data['terreno_max']) ? array(
    'key' => 'field_tamano_terreno',
    'value' => array($data['terreno_min'],$data['terreno_max']),
    'type' => 'numeric',
    'compare' => 'BETWEEN',
  ) : '';
  $args = array(
    'post_type' => array('inmuebles'),
    'post_status' => array('publish'),
    'posts_per_page' => $data['posts_to_show'],
    'paged' => $data['page'],
    'order' => $order,
    'orderby' => $orderby,
    'meta_key' => $meta_key,
    'meta_query' => array($precio_min_max,$locacion_inmueble,$sublocacion_inmueble,$recamaras,$construccion_min_max,$terreno_min_max),
    'tax_query' => array('relation' => 'AND',$tipo_inmuebles,$estado_inmuebles,$amenidades_inmuebles),
    's' => $search,
  );

  $inmuebles_query = new WP_Query($args);
  $total_results = $inmuebles_query->found_posts;

  if($inmuebles_query->have_posts(  )){

    while($inmuebles_query->have_posts(  )){
      
      $inmuebles_query->the_post();
      $terms = get_the_terms( get_the_ID(), 'estados_de_inmueble' );
      $term = $terms ? array_shift($terms) : false;
      $inmuebles_object[] = array(
        'id' => get_the_ID(),
        'image' => get_the_post_thumbnail_url( get_the_ID(), 'grid-inmueble'),
        'title' => get_the_title(),
        'direccion' => get_post_meta(get_the_ID(), 'inmueble_direccion',true),
        'directory_uri' => esc_url(get_template_directory_uri(  )),
        'permalink' => get_the_permalink( get_the_ID()),
        'precio' => get_post_meta(get_the_ID(),'field_precio',true),
        'estado_inmueble' => $term ? $term->name : false,
        'numero_recamaras' => get_post_meta(get_the_ID(),'field_numero_recamaras',true),
        'numero_banos' => get_post_meta(get_the_ID(),'field_numero_banos',true),
        'tamano_const' => get_post_meta(get_the_ID(),'field_tamano_construccion',true),
        'ciudad' => get_post_meta( get_the_ID(), 'administrative_area_level_1', true ),
      );
    }

    return array(
      'inmuebles' =>$inmuebles_object,
      'total' => $total_results,
      'max_pages' => $inmuebles_query->max_num_pages);
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

function obtener_localidades($data){
  global $wpdb;
  $estado = $data['estado'];
  if ($estado){
    $localidades = $wpdb->get_col(
      $wpdb->prepare(
          "
              SELECT DISTINCT meta_value
              FROM {$wpdb->prefix}postmeta
              WHERE meta_key = 'locality'
              AND post_id IN (
                  SELECT post_id
                  FROM {$wpdb->prefix}postmeta
                  WHERE meta_key = 'administrative_area_level_1'
                  AND meta_value = %s
              )
          ",
          $estado
      )
    );

    return $localidades;
  }
  else{
    return false;
  }
}

function obtener_estados_con_localidades(){
  global $wpdb;
  $estados = $wpdb->get_col(
    $wpdb->prepare(
        "SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = 'administrative_area_level_1'"
    )
  );

  if (!empty($estados)){
    foreach ($estados as $estado){
      if ($estado != ''){
        $localidades = $wpdb->get_col(
          $wpdb->prepare(
              "
                  SELECT DISTINCT meta_value
                  FROM {$wpdb->prefix}postmeta
                  WHERE meta_key = 'locality'
                  AND post_id IN (
                      SELECT post_id
                      FROM {$wpdb->prefix}postmeta
                      WHERE meta_key = 'administrative_area_level_1'
                      AND meta_value = %s
                  )
              ",
              $estado
          )
        );
        $data_ubicaciones[$estado] = $localidades;
      }
    }
  }
  else{
    $data_ubicaciones = false;
  }

  return $data_ubicaciones;
}
