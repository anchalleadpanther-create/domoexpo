<div id="sizechart" class="mfpbox mfp-with-anim mfp-hide table-responsive" style="overflow-x: scroll">

  <h4 class="fw-bold text-center">Size Guide</h4>
  <p class="text-center">This is a standardised guide to give you an idea of what size you will need,
    however some brands may vary from these conversions.</p>
  <p class="text-center"><strong>Ready to Wear Clothing</strong></p>

  @isset($productSizeChart)
  {!! htmlspecialchars_decode($productSizeChart) !!}
  @endisset
  @isset($brandSizeChart)
  {!! htmlspecialchars_decode($brandSizeChart) !!}
  @endisset
  <button title="Close (Esc)" type="button" class="mfp-close">×</button>
</div>