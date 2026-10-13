  <title>@yield('title', \App\Helpers\SEO::tags()->title) </title>
  <meta name="description" content="@yield('description', \App\Helpers\SEO::tags()->description)" />
  <meta name="keywords" content="@yield('keywords', \App\Helpers\SEO::tags()->keywords)" />

  <meta name="title" content="@yield('title', \App\Helpers\SEO::tags()->title)">
  <meta property="og:title" content="@yield('title', \App\Helpers\SEO::tags()->title)">
  <meta property="og:type" content="article">
  <meta property="og:image" content="@yield('image', asset('allUsers/customer/images/logo-new.png'))">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:description" content="@yield('description', \App\Helpers\SEO::tags()->description)">
  <meta property="og:site_name" content="{{ config('app.name') }}">
  <meta name="theme-color" content="@yield('themeColor', \App\Helpers\SEO::tags()->themeColor)" />
