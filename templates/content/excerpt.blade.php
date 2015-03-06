@if(get_post_format() == 'gallery')
  <article class="excerpt excerpt-gallery">
    {{ the_content() }}
  </article>
@else 
  <article class="excerpt">
    <div class="excerpt-thumb">
      {{ cutlass_post_thumb() }}
    </div>
    <div class="excerpt-info">
      <h4><a href="{{ the_permalink() }}" title="{{ the_title() }}">{{ the_title() }}</a></h4>
      @include('templates.includes.entry-meta')
      <div class="excerpt-summary">{{ the_excerpt() }}</div>
    </div>
  </article>
@endif

