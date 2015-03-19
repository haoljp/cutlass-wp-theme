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
          
        @wpend
        
      </div>
    </div>
  </div>
  <div class="aside">
    <div class="box box-strategy">
      <div class="box-hd">
        <h3>精品<span class="spec">攻略</span></h3>
        <span class="box-action"><a href="{{ get_category_link(19) }}">更多 <span class="icon icon-plus-square-o"></span></a></span>
      </div>
      <div class="box-bd">
        <ul class="list-group">
          @wpquery( array('category_name' => 'goods-strategy', 'posts_per_page' => 8) )
            <li class="list-group-item"><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
          @wpempty  
          @wpend  
        </ul>
      </div>
    </div>
    <!-- box-strategy end -->
    <div class="box box-material">
      <div class="box-hd">
        <h3>游戏<span class="spec">资料</span></h3>
      </div>
      <div class="box-bd">
        @foreach (get_categories(array('hide_empty' => false, 'parent' => 3)) as $category)
          <dl class="dl-material">
            <dt>{{ $category->cat_name }}</dt>
            <dd>
              @foreach (get_categories(array('hide_empty' => false, 'parent' => $category->cat_ID)) as $subCategory)
              <a href="{{ get_category_link($subCategory->term_id) }}">{{ $subCategory->cat_name }}</a>
              @endforeach
            </dd>
          </dl>
        @endforeach
        
      </div>
    </div>
  </div>
</div>
