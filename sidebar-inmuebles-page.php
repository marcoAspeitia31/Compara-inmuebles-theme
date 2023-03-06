<aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
  <div class="widget ltn__menu-widget">
    <?php
    if(!is_active_sidebar('sidebar-page-inmuebles')){
      return;
    }
    dynamic_sidebar( 'sidebar-page-inmuebles' );
    ?>
  </div>
</aside>