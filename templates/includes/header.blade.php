<header class="header">
  <div class="header-c1 container clearfix">
    <div class="logo"><img src="{{ get_bloginfo('template_url') }}/dist/img/logo.png" alt=""/></div>
    <!-- nav-wrap -->
    @if(has_nav_menu('primary_navigation'))
      {{ wp_nav_menu(array('menu' => 'primary','theme_location' => 'primary_navigation', 'depth' => 2, 'menu_class' => 'nav-main clearfix', 'walker' => new wp_bootstrap_navlist_walker(), 'container_class' => 'nav-wrap',)) }}
    @endif
    <!-- nav-wrap end -->

    <div class="form-wrap pull-right">
      <div class="form-search">
        <input type="text" placeholder="新手入门">
        <span class="icon icon-search"></span>
      </div>
      <div class="rss-wrap">
        <a href="#"><span class="icon icon-rss"></span></a>
      </div>
    </div>
  </div>
  <div class="nav-sub-bg"></div>
</header>

