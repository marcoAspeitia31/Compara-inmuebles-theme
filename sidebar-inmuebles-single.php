<aside class="sidebar ltn__shop-sidebar ltn__right-sidebar---">
  <?php
    if(!is_active_sidebar('sidebar-inmuebles')){
      return;
    }
    dynamic_sidebar( 'sidebar-inmuebles' );
  ?>
</aside>