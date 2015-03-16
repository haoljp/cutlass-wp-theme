<div class="box box-latest">
  <div class="box-hd">
    <h3><strong>最新攻略</strong></h3>
  </div>
  <div class="box-bd">
    <ul class="list-group">
      @wpquery(array('post_type' => 'post', 'posts_per_page' => 8))
        <li class="list-group-item"><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
      @wpempty

      @wpend
    </ul>
  </div>
</div>
