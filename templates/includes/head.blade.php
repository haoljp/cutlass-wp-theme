<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" {{ language_attributes() }}> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" {{ language_attributes() }}> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" {{ language_attributes() }}> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" {{ language_attributes() }}> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ wp_title('|', true, 'right') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if lt IE 9]>
    <script src="{{ get_template_directory_uri() }}/src/vendor/html5shiv/dist/html5shiv.min.js"></script>
  <![endif]-->
  
  {{ wp_head() }}

  <link rel="alternate" type="application/rss+xml" title="{{ get_bloginfo('name') }} Feed" href="{{ esc_url(get_feed_link()) }}">
</head>
