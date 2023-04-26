<aside class="sidebar-area blog-sidebar ltn__right-sidebar">
  <?php
    if(!is_active_sidebar('sidebar-blog')){
      return;
    }
    dynamic_sidebar( 'sidebar-blog' );
  ?>
</aside>