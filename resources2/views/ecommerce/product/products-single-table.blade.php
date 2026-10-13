<table class="table border-no dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
  <thead>
    <tr role="row">
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
        aria-label="Patient ID: activate to sort column descending"><input type="checkbox" id="basic_checkbox_1"
          name="all_inclusive_price" value="1" class=" ">
        <label for="basic_checkbox_2" style="margin-bottom:0"></label>
      </th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">IDS</th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Image</th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Product
      </th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">RRP/MRP</th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Sale Price</th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Stock
      </th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Sold By
      </th>
      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
        aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
      <tr class="hover-primary odd" role="row">
        <td>
          <input type="checkbox" id="basic_checkbox_2" name="all_inclusive_price" value="1" class=" ">
          <label for="basic_checkbox_2" style="margin-bottom:0"></label>
        </td>
        <td>
          PID: <span class='text-primary'>{{ $product->id }}</span><br />
          Date : {{ $product->created_at->format('Y-M-d') }}<br />
          SKU: {{ $product->sku }}<br />
          Barcode : {{ $product->barcode }}<br />
        </td>
        <td>
          <div class="avatar-md profile-user-wid mt-1">
            {{-- $product->images[0]->image --}}

            <img
              src="{{ !$product->images->isEmpty() ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
              class=" " style="height: 60px; width: 60px;">
          </div>
        </td>
        <td>
          <a
            href="{{ route('customer.product-detail', [$product->mappedCategories->last()->category_slug, $product->slug, $product->sku, $product->uuid]) }}">{{ $product->name }}</a><br />
          Condition: {{ $product->condition }}<br />
          Weight: {{ $product->weight }}<br />
          Payment Method: {{ $product->payment_method }}<br />
          LXBXH: <span class='text-primary'>{{ $product->lbh }}</span><br />
        </td>
        <td>
          ${{ number_format($product->rrp, 2) }}
        </td>
        <td>
          ${{ number_format($product->price_unit, 2) }}
          <br />{{ isset($product->discount) ? "({$product->discount} % off)" : '' }}
        </td>
        <td>
          {{ $product->stock }}
        </td>
        <td>
          {{ @$product->seller->biz_name }}<br />
          {{ @$product->seller->biz_phone }}
        </td>
        <td class="text-right">
          <!-- Button trigger modal -->
          <a href="{{ route('admin.products.edit', $product->id) }}" title="Edit product" type="button"
            class="badge badge-pill badge-primary"> <i class="fa fa-pencil"></i></a>
          <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete" title="Delete product"
            onclick="destroyUrlUpdate(this)" data-destroy-url="{{ route('admin.products.destroy', $product->id) }}"
            type="button" class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
              class="fa fa-trash"></i></a>
          <a href="{{ route('admin.products.status', [$product->id, $product->status === 1 ? 0 : 1]) }}"
            title="{{ $product->status === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
            class="badge badge-pill badge-success disable" catid="0011-0">
            @if ($product->status === 1)
              <i class="fa fa-toggle-on"></i>
            @else
              <i class="fa fa-toggle-off"></i>
            @endif
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
