<div class="content clearfix">
  <div class="main">
    <div class="box box-post">
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
  <div class="aside">
    @include('templates.content.latest')
  </div>
</div>
