<div class="slider">
  <div class="slider-wrap container clearfix">
    <div class="slider-content">{{ putRevSlider("home-slider","homepage") }}</div>
    <div class="download">
      <div class="download-wrap">
        <div class="download-link"><a href="#">下载客户端</a></div>
        <p class="download-summary">《放开那三国》是一款三国题材卡牌手游，在传统卡牌游戏基础上对玩点和系统进行优化改革，使玩家可以更轻松的享受Q版三国乐趣。并且结</p>
      </div>
    </div>
  </div>
</div>

<div class="content clearfix">
  <div class="main">
    <div class="box box-post">
      <div class="box-hd">
        <h3>最新资讯</h3>
        <sup class="en">news</sup>
      </div>
      <div class="box-bd">
        @wpquery(array('post_type' => 'post'))
          @include('templates.content.excerpt')
        @wpempty
          <div class="alert alert-warning">
            {{ _e('Sorry, no results were found.', 'cutlass') }} 
          </div>
          {{ get_search_form(false) }}
        @wpend
        
      </div>
    </div>
  </div>
  <div class="aside"></div>
</div>
