@include('templates.includes.head')

<body {{ body_class() }} >

  <!--[if lt IE 8]>
  <p class="browsehappy">
    你正在使用一个<strong>过时</strong>的浏览器。请<a class="link" href="http://browsehappy.com">升级你的浏览器</a>以查看此页面。</p>
  </p>
  <![endif]-->
  <div class="wrapper">
    @include('templates.includes.header')

    @yield('content')

    @include('templates.includes.footer')

    {{ wp_footer() }}
  </div>
</body>
</html>
