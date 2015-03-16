<div class="content">
  @wpposts
    <article {{ post_class() }}>
      <div class="article-header">
        <h1>{{ cutlass_title() }}</h1>
        @include('templates.includes.entry-meta')
      </div>
      <div class="article-body">
        {{ the_content() }}
      </div>
      {{ wp_link_pages(array('before' => '<nav class="article-foot">' . __('Pages:', 'cutlass'), 'after' => '</div>')) }}
    </article>
    
    <?php comments_template('', true); ?>
  @wpempty
    @include('templates.content.empty')
  @wpend
</div>
