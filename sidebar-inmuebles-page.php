<aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
  <div class="widget ltn__menu-widget">
    <?php
    if(!is_active_sidebar('sidebar-page-inmuebles')){
      return;
    }
    dynamic_sidebar( 'sidebar-page-inmuebles' );
    ?>
    <div class="btn-wrapper animated">
      <button id="filtrar-inmuebles-sidebar" class="btn theme-btn-1 btn-effect-1 text-uppercase">Filtrar</button>
      <button id="limpiar-filtro-inmuebles-sidebar" class="btn theme-btn-1 btn-effect-1 text-uppercase">Limpiar</button>
    </div>
  </div>
</aside>