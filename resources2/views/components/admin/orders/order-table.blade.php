@foreach ($orders as $order)
  <tr>
    <td class="text-left">
      <input data-cart-id="{{ $order->cart_id }}" type="checkbox" id="order-checkbox{{ $order->id }}"
        class="filled-in chk-col-primary order-checkboxes" value="{{ $order->id }}" name="cart_id[]">
      <label for="order-checkbox{{ $order->id }}"></label>
    </td>
    <td class="text-left">
      <p class="no-margin">OID:FEI-
        <a href="{{ route('admin.product-orders.show', $order->supplier_order_id) }}"
          style="color:#2677e7">{{ @$order->orderItemDetail->order_id_counter }}</a>
      </p>
      <p class="no-margin">Date :
        {{ @$order->orderItemDetail->created_at->format('d M, Y') }} </p>
      <p class="no-margin">Time :
        {{ @$order->orderItemDetail->created_at->format('h:i A') }} </p>
      <p class="no-margin">Status :
        <span style="color:#2677e7">{{ @$order->OrderStatus }}</span>
      </p>
      <p class="no-margin">Invoice ID:
        <span style="color:#2677e7">{{ @$order->orderItemDetail->invoice_id }}</span>
      </p>
      @if ($order->orderItemDetail->order->order_via === 'online')
        <p class="no-margin">Order Via:
          <span style="color:#2677e7">{{ 'Customer' }}</span>
        </p>
      @else
        <p class="no-margin">Order Via:
          <span style="color:#2677e7">{{ 'Backend' }}</span>
        </p>
      @endif
      @isset($order->orderItemDetail->order->utm->utm_medium)
        <p class="no-margin">Order Source:
          <span style="color:#2677e7">{{ $order->orderItemDetail->order->utm->utm_medium }}</span>
        </p>
      @endisset
      @if (isset($order->orderItemDetail->invoice_document) &&
              Storage::disk('public')->exists('uploads/invoices/' . $order->orderItemDetail->invoice_document))
        <p class="no-margin">Download Invoice:
          <span style="color:#2677e7">
            <a target="_blank"
              href="{{ asset('uploads/invoices') . '/' . $order->orderItemDetail->invoice_document }}">
              Download <i class="fa fa-download"></i>
            </a>
          </span>
        </p>
      @endif
      @if (isset($order->orderItemDetail->credit_note_document) &&
              Storage::disk('public')->exists('uploads/creditNotes/' . $order->orderItemDetail->credit_note_document))
        <p class="no-margin">Download Credit Note:
          <span style="color:#2677e7">
            <a target="_blank"
              href="{{ asset('uploads/creditNotes') . '/' . $order->orderItemDetail->credit_note_document }}">
              Download <i class="fa fa-download"></i>
            </a>
          </span>
        </p>
      @endif
    </td>

    <td class="text-left">
      <a
        @if (isset($order->product->mappedCategories) && isset($order->product->mappedCategories->last()->category_slug)) target="_blank"
        href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}" @endif><img
          width="60px"
          src="{{ isset($order->product_image) ? asset('uploads/products') . '/' . $order->product_image : asset('allUsers/icon-thumb.png') }}"
          alt="{{ $order->name }}" title="{{ $order->name }}">
      </a>
    </td>
    <td class="text-left">
      <p class="no-margin">
        <a @if (isset($order->product->mappedCategories) && isset($order->product->mappedCategories->last()->category_slug)) target="_blank"
        href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}" @endif
          style="color:#2677e7">{{ $order->name }}</a>
      </p>
      <p @class(['no-margin text-warning', 'd-none' => $order->is_gift === 0])>
        (Gifting Product)
      </p>
      <p class="no-margin">
        @if (isset($order->color))
          {{ $order->color }}
          @if (isset($order->size))
            - {{ $order->size }}
          @endif
        @endif
      </p>
      <p class="no-margin">Condition: {{ $order->product_condition }}</p>
      <p class="no-margin">Brand: {{ @$order->brand->brand_name }}</p>
      <p class="no-margin">SKU: {{ $order->sku }}</p>
      <p class="no-margin">Barcode : {{ $order->barcode }}</p>
      @isset($order->custom_name)
        <p class="no-margin">Custom Name : {{ $order->custom_name }}</p>
      @endisset
    </td>
    <td class="text-left">
      <p class="no-margin"> {{ $order->quantity }} </p>
    </td>

    <td class="text-left">
      <p class="no-margin">
        INR
        {{ number_format($order->orderItemDetail->grand_total + $order->gift_pricing * $order->quantity + $order->orderItemDetail->shipping_charge - $order->coupon_amount - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 2) }}
      </p>
      <p class="no-margin">{{ $order->orderItemDetail->payment_method }}</p>
      <hr />
      <p class="no-margin">Currency Code:
        {{ @$order->orderItemDetail->order->currency_code }}</p>
      <p class="no-margin">Currency Con Ratio:
        {{ @$order->orderItemDetail->order->currency_con_ratio }}</p>
      <p class="no-margin">{{ @$order->orderItemDetail->order->currency_code }}
        {{ number_format(($order->orderItemDetail->grand_total + $order->gift_pricing * $order->quantity + $order->orderItemDetail->shipping_charge - $order->coupon_amount - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount)) * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
      </p>
    </td>

    <td class="text-left">
      <p class="no-margin"> {{ @$order->seller->biz_name }}</p>
      <p class="no-margin">{{ @$order->seller->biz_company_city }}</p>
      <p class="no-margin">{{ @$order->seller->state->name }}</p>
      <p class="no-margin">
        {{ @$order->seller->country->name }}
        {{ @$order->seller->country->emoji }}
      </p>
      
    </td>

    <td class="text-left">
      <p class="no-margin">
        <a
          @isset($order->buyer) 
          target="_blank" href="{{ route('admin.orders-report', ['customer' => $order->buyer->id]) }}"
          @endisset>
          {{ @$order->buyer->fullName }}</a>
      </p>
      <p class="no-margin">{{ @$order->buyer->email }}</p>
      <p class="no-margin">{{ @$order->buyer->phone }}</p>
      <p class="no-margin">{{ $order->buyer->ordersCount === 1 ? 'New Customer' : 'Returning Customer' }}</p>
    </td>

    <td class="text-left">
      <a href="{{ route('admin.product-orders.show', $order->supplier_order_id) }}" style="width:100%;"
        class="btn btn-basic btn-basic-color" data-bs-toggle="tooltip" data-bs-placement="top" title="View Order">
        View Order
      </a>
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#orderCommentModal"
        data-id="{{ $order->orderItemDetail->id }}" data-comment="{{ $order->orderItemDetail->admin_comment }}"
        style="width:100%;" class="btn btn-basic btn-basic-color admin-order-comment" data-bs-toggle="tooltip"
        data-bs-placement="top" title="Comment on order">
        Comment
      </a>
      @if (isset($order->orderItemDetail->po_document) && Request::segment(3) === 'approved')
        <a href="{{ route('admin.regenerate-po', ['poDocument' => $order->orderItemDetail->po_document]) }}"
          style="width:100%;" class="btn btn-basic btn-basic-color admin-order-comment" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Resend PO">
          Resend PO
        </a>
      @endif
      @if (isset($order->orderItemDetail->invoice_document))
        <a href="{{ route('admin.regenerate-invoice', ['invoiceDocument' => $order->orderItemDetail->invoice_document]) }}"
          style="width:100%;" class="btn btn-basic btn-basic-color admin-order-comment" data-bs-toggle="tooltip"
          data-bs-placement="top" title="Regenrate Invoice">
          Regenerate Invoice
        </a>
      @endif
      @isset($order->orderItemDetail->manifest_link_pdf)
        <a target="_blank" href="{{ $order->orderItemDetail->manifest_link_pdf }}" style="width:100%;"
          class="btn btn-basic btn-basic-color" data-bs-toggle="tooltip" data-bs-placement="top" title="View Manifest">
          Manifest PDF
        </a>
      @endisset
      @isset($order->orderItemDetail->po_document)
        <a target="_blank" href="{{ asset('uploads/po') . '/' . $order->orderItemDetail->po_document }}"
          style="width:100%;" class="btn btn-basic btn-basic-color" data-bs-toggle="tooltip" data-bs-placement="top"
          title="View Purchase Order">
          PO PDF
        </a>
      @endisset
      @isset($order->orderItemDetail->is_blue_dart_delivery)
        @if($order->orderItemDetail->is_blue_dart_delivery == 1 && !is_null($order->orderItemDetail->blue_dart_awb_no))
          <a target="_blank" href="{{ route('generate-shipping-label',[$order->orderItemDetail->blue_dart_awb_no]) }}"
            style="width:100%;" class="btn btn-basic btn-basic-color" data-bs-toggle="tooltip" data-bs-placement="top"
            title="View Purchase Order">
            Shipping Label PDF
          </a>
        @endif
      @endisset
    </td>
  </tr>


@endforeach
