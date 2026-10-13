<div id="search-popup" class="search-drawer">
  <div class="container">
    <span class="closeSearch an an-times-l"></span>
    <form class="form minisearch" id="header-search" action="{{ route('customer.search-products') }}" method="get">
      <label class="label"><span>Search</span></label>
      <div class="control">
        <div class="searchField">
          <div class="input-box">
            <button type="submit" title="Search" class="action search"><i class="icon an an-search-l"></i></button>
            <input type="text" name="search" value="" placeholder="Search" class="input-text product-search">
            <ul class="list-group search-product-result" style="max-height: 270px;overflow-y: auto;">
            </ul>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
