<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<table class="table border-no dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
    <thead>
        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                aria-label="Patient ID: activate to sort column descending"><input type="checkbox"
                    id="basic_checkbox_all" name="all_inclusive_price" value="1" class=" ">
                <label for="basic_checkbox_all" style="margin-bottom:0"></label>
            </th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                aria-label="Patient ID: activate to sort column descending">IDS</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                aria-label="Patient ID: activate to sort column descending">Image</th>
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending"
                aria-label="Patient ID: activate to sort column descending">Product
            </th>
            @foreach ($productTypes as $key => $type)
            @if ($key <= 1) <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">
                {{ $type->type }}
                </th>
                @endif
                @endforeach
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">MRP</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Sale Price</th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Stock
                </th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Sold By
                </th>
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Categories
                </th>
                <th width="8%" class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Sort
                </th>
                <th @class([ 'd-none'=> Auth::user()->permission?->permission_type === 'view',
                    ]) tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-sort="ascending" aria-label="Patient ID: activate to sort column descending">Action</th>
        </tr>
    </thead>
    <tbody>
        <form method="post" id="sort-form" action="{{ route('admin.products.update-sort') }}">
            @csrf
            @method('PUT')
            @foreach ($products as $product)
            <input type="hidden" name="sku[]" value="{{ $product->sku }}">
            <tr class="hover-primary odd" role="row">
                <td>
                    <input type="checkbox" id="basic_checkbox{{ $product->id }}" name="all_inclusive_price"
                        value="{{ $product->sku }}" class="product-checkboxes">
                    <label for="basic_checkbox{{ $product->id }}" style="margin-bottom:0"></label>
                </td>
                <td>
                    PID: <span class='text-primary'>{{ $product->id }}</span><br />
                    Date : {{ $product->created_at->format('Y-M-d') }}<br />
                    SKU: {{ $product->sku }}<br />
                    Barcode : {{ $product->barcode }}<br />
                    Added By : {{ $product->user?->name }} - {{ $product->user?->email }}<br />
                </td>
                <td>
                    <div class="avatar-md profile-user-wid mt-1">
                        {{-- $product->images[0]->image --}}

                        <img src="{{ !$product->images->isEmpty() ? asset('uploads/products') . '/' . $product->images[0]->image : asset('allUsers/icon-thumb.png') }}"
                            class=" " style="height: 60px; width: 60px;">
                    </div>
                </td>
                <td>
                    <a href="{{ route('customer.product-detail', [@$product->mappedCategories->last()->category_slug, $product->slug, $product->sku, $product->uuid]) }}"
                        target="_blank">{{ $product->name }}</a><br />
                    Condition: {{ $product->condition }}<br />
                    Weight: {{ $product->weight }}<br />
                    Payment Method: {{ $product->payment_method }}<br />
                    LXBXH: <span class='text-primary'>{{ $product->lbh }}</span><br />
                </td>
                @if (isset($productTypes[0]))
                <td>{{ isset($product->productTypeValueOne) ? $product->productTypeValueOne->type_value : '' }}
                </td>
                @endif
                @if (isset($productTypes[1]))
                <td>{{ isset($product->productTypeValueTwo) ? $product->productTypeValueTwo->type_value : '' }}
                </td>
                @endif
                <td>
                    ${{ number_format($product->rrp, 2) }}<br />
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
                <td>
                    <a href="{{ route('admin.map-product-category', $product->sku) }}" class="badge bg-primary">Map new
                        category</a>
                    <br />
                    @foreach ($product->mappedCategories as $category)
                    <a>
                        <small>{{ $category->category_name }}</small>
                        <a href="javascript:;">
                            <i class="fa fa-times-circle remove-category" data-bs-toggle="modal"
                                data-bs-target="#modal-delete" title="Delete category" onclick="destroyUrlUpdate(this)"
                                data-destroy-url="{{ route('admin.delete-product-category', [$product->sku, $category->id]) }}"></i>
                        </a>
                    </a>
                    <br />
                    @endforeach
                </td>
                <td>
                    <input type="number" min="0" value="{{ $product->sort }}" class="form-control px-2"
                        onKeyPress="if(this.value.length===8) return false;" name="sort[]" />
                </td>
                <td @class([ 'text-right' , 'd-none'=> Auth::user()->permission?->permission_type === 'view',
                    ])>
                    <!-- Button trigger modal -->
                    <a href="{{ route('admin.products.edit', $product->parent_id === 0 ? $product->id : $product->parentProduct->id) }}"
                        title="Edit product" type="button" class="badge badge-pill badge-primary"> <i
                            class="fa fa-pencil"></i></a>
                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete" title="Delete product"
                        onclick="destroyUrlUpdate(this)"
                        data-destroy-url="{{ route('admin.products.destroy', $product->id) }}" type="button"
                        class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
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
                    <a href="{{ route('admin.product-rating', $product->id) }}" title="Product Rating" type="button"
                        class="badge badge-pill badge-primary"> <i class="fa fa-registered"></i></a>
                </td>
            </tr>
            @endforeach
            <tr @class([ 'd-none'=> Auth::user()->permission?->permission_type === 'view',
                ])>
                <td align="left">
                    <button type="button" class="btn btn-sm btn-danger delete-all" style="white-space:nowrap;">Delete
                        selected</button>
                </td>
                <td align="left">
                    <button type="button" class="btn btn-sm btn-info enable-all" style="white-space:nowrap;">Enable
                        selected</button>
                </td>
                <td align="left">
                    <button type="button" class="btn btn-sm btn-warning disable-all" style="white-space:nowrap;">Disable
                        selected</button>
                </td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="left"></td>
                <td align="center"><button class="btn btn-sm btn-primary" form="sort-form"
                        style="white-space:nowrap;">Update Sort
                        No.</button></td>
                <td></td>
            </tr>
        </form>
    </tbody>
</table>