<input id="main-menu-state" type="checkbox" />
<label class="main-menu-btn" for="main-menu-state">
  <span class="main-menu-btn-icon"></span> Toggle main menu visibility
</label>

<ul id="main-menu" class="sm sm-blue dark-purple">
  <li><a href="{{ route('vendor.profile') }}"><i class="fa fa-user"></i>Designer Registration Form</a></li>
  <li>
    <a href="javascript:;">
      <i class="fa fa-product-hunt"></i>Products
    </a>
    <ul>
      <li>
        <a href="{{ route('vendor.products.index') }}">
          <i class="icon-Commit">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
          All Products
        </a>
      </li>
      @foreach (productCollectionsAccordingToVendor() as $collection)
        <li>
          <a href="{{ route('vendor.products.index', ['collection' => $collection]) }}">
            <i class="icon-Commit">
              <span class="path1"></span>
              <span class="path2"></span>
            </i>
            {{ $collection }}
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  <li><a href="{{ route('vendor.products-orders.index', ['new', 0]) }}"><i class="fa fa-shopping-cart"></i>Orders</a>
  </li>
  <li><a href="{{ route('vendor.products-orders-po.show') }}"><i class="fa fa-industry"></i>PO</a></li>
</ul>
