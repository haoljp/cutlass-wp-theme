<article {{ post_class() }}>

  @if(get_post_format() == 'gallery')
    {{ the_content() }}
  @else 
    <div class="excerpt-item clearfix">
      <div class="excerpt-img pull-left">
      <img src="{{ cutlass_first_image() }}" alt="{{ the_title() }}"/>
      {{ the_post_thumbnail() }}
      </div>
      <div class="excerpt-info pull-left">
        <h2 class="entry-title"><a href="{{ the_permalink() }}" title="{{ the_title() }}">{{ the_title() }}</a></h2>
        <p class="entry-summary">
          {{ the_excerpt() }}
          <span>{{ get_post_format() }}</span>
        </p>
      </div>
    </div>
  @endif
  @include('templates.includes.entry-meta')

</article>