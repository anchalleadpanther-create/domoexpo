<section class="slideshow slideshow-wrapper top_bar_slider">
  <div class="home-slideshow">
    @foreach ($messages as $message)
      <div class="slide">
        <div class="blur-up lazyload">
          <p style="color:#000;text-align:center">{!! htmlspecialchars_decode($message) !!}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>
