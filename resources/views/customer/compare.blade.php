@extends('customer.partials.header')
@section('customerContent')
  <!--Body Container-->
  <style>
  table.table tr .th-stciky {
    position: sticky;
    top: 0;
    left: 0;
        z-index: 999;
    background: #fff;

}
  @media only screen and (max-width: 500px) {
      body table.table tr .th-stciky{min-width:90px !important;font-size:13px !important;}
      table tr th, table tr td {
    min-width: 210px !important;
    word-wrap: break-word;}
  }
  </style>
  <div id="page-content">
    <!--End Collection Banner-->
    <div class="about-pstyle2">
      <div class="collection-header inner-content">
        <div class="collection-hero inner mb-0 hidden-xs">
          <div class="collection-hero__image" style="background-image: url(https://littletags.webkype.co/allUsers/frontend/images/compare-page-banner.jpg);background-size: contain;"></div>
          <div class="collection-hero__title-wrapper d-flex-justify-center h-100">
            <div class="container position-relative mt-md-2">
              <h2 class="collection-hero__title text-white mt-0 mb-2">COMPARE</h2>
              <p class="collection__subtitle fs-5 text-white mb-0">Compare with your selected items</p>
            </div>
          </div>
        </div>
        
        <img src="https://littletags.webkype.co/allUsers/frontend/images/compare page banner mobilr (1).jpg" class="hidden-sm" style="width:100%">
        
        
      </div>
    </div>
    <!--Main Content-->
    <div class="container-fluid mt-md-5 mb-md-5">
      <div class="row">
        <div class="col-12 text-center">
         <div class="table-responsive">
            <table class="table table-striped text-successtable-border border-light ">
              <thead class="border-light">
                <tr>
                  <th class="th-stciky"></th>
                  @foreach ($products as $product)
                    <th scope="col" class="text-center">
                      <div class="row justify-content-center">
                        <button href="#" class="border-0 w-auto remove-compare-btn" data-id="{{ $product->id }}">X</button>
                      </div>
                      <img src="{{ asset('uploads/products') . '/' . $product->images[0]->image }}" style="width: 180px;" />
                    </th>
                  @endforeach
                </tr>
                <tr>
                    <th class="th-stciky"></th>
                  @foreach ($products as $product)
                    <th class="text-center" style="min-width: 180px;">
                      <a href="{{ route('customer.product-detail', [$product->mappedCategories->last()->category_slug, $product->slug, $product->sku, $product->uuid]) }}"
                        class="btn btn-primary">Add To Cart</a>
                    </th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="th-stciky">Name</th>
                  @foreach ($products as $product)
                    <td>{{ $product->name }}</td>
                  @endforeach
                </tr>
                <tr>
                  <th scope="row" class="th-stciky">Material</th>
                  @foreach ($products as $product)
                    <td>{{ $product->material }}</td>
                  @endforeach
                </tr>
                <tr>
                  <th scope="row" class="th-stciky">Type</th>
                  @foreach ($products as $product)
                    <td>{{ $product->occasion }}</td>
                  @endforeach
                </tr>
                <tr>
                  <th scope="row" class="th-stciky">Price</th>
                  @foreach ($products as $product)
                    <td>INR {{ $product->rrp }}</td>
                    @endforeach
                </tr>
                <tr>
                  <th scope="row" class="th-stciky">Description</th>
                  @foreach ($products as $product)
                    <td>{!! $product->description !!}</td>
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--End Main Content-->
  </div>
  <!--End Body Container-->
  <script>
    document.querySelector('.remove-compare-btn').addEventListener('click', async (event) => {
      const id = +event.target.dataset.id;
      await axios.delete(route('customer.compare.destroy', {
        id
      }));
      location.reload();
    });
  </script>
@endsection