<?php
/**
 * Display shop options for inmuebles list
 * 
 * @package Compara_inmuebles
 * @since 1.0.0
 */
?>
<div class="ltn__shop-options">
  <ul class="justify-content-start">
    <li>
      <div class="ltn__grid-list-tab-menu ">
        <div class="nav">
          <a class="active show" data-toggle="tab" id="grid-inmuebles" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
          <a data-toggle="tab" id="list-inmuebles" href="#liton_product_grid"><i class="fas fa-list"></i></a>
        </div>
      </div>
    </li>
    <li class="">
      <div id="resultados-texto" class="showing-product-number text-right">
        <span><?php echo esc_html('Mostrando '.$wp_query->post_count.' de '.wp_count_posts('inmuebles')->publish.' resultados');  ?></span>
      </div> 
    </li>
    <li>
      <div class="short-by text-center">
        <select class="nice-select order-by">
          <option value="<?php echo esc_url(esc_attr(remove_query_arg( array('orderby','sortby'), $_SERVER['REQUEST_URI']))); ?>"  >Default Sorting</option>
          <option value="<?php echo esc_url(esc_attr(add_query_arg('sortby','post_views_count',remove_query_arg('orderby', $_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'post_views_count' ? 'selected' : '' ?> >Sort by popularity</option>
          <option value="<?php echo esc_attr(esc_url(add_query_arg('orderby', 'ASC', remove_query_arg('sortby', $_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['orderby'] ) && $_GET['orderby'] === 'ASC' && !isset($_GET['sortby']) ? 'selected' : '' ?> >Sort by old arrivals</option>
          <option value="<?php echo esc_attr(esc_url(add_query_arg( array('sortby' => 'field_precio', 'orderby' => 'ASC' )))); ?>"  <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'field_precio' && isset($_GET['orderby']) ? 'selected' : '' ?> >Sort by price: low to high</option>
          <option value="<?php echo esc_attr(esc_url(add_query_arg('sortby', 'field_precio', remove_query_arg('orderby',$_SERVER['REQUEST_URI'])))); ?>" <?php echo isset( $_GET['sortby'] ) && $_GET['sortby'] === 'field_precio' && !isset($_GET['orderby']) ? 'selected' : '' ?> >Sort by price: high to low</option>
        </select>
      </div> 
    </li>
    <li>
      <div class="short-by text-center">
        <select class="nice-select posts-per-page">
          <?php
            $posts_to_show  = array( 6, 12, 18, 24 );
            foreach($posts_to_show as $number):
              $selected = isset( $_GET['posts_to_show'] ) && (int) $_GET['posts_to_show'] === $number ? 'selected' : '';
            ?>
            <option value="<?php echo esc_attr($number); ?>" <?php echo $selected; ?>>
              Por pagina: <?php echo esc_html($number);?>
            </option>
            <?php
            endforeach;
          ?>
        </select>
      </div> 
    </li>
  </ul>
</div>