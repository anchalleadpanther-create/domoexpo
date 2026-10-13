<tfoot>
  <tr>
    <td colspan="5"></td>
    <td class="text-right"><b>Sub-Total</b>
    </td>
    <td class="text-right">INR {{ number_format($order->orderItemDetail->grand_total, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right"> <b>Flat Shipping Rate</b>
    </td>
    <td class="text-right">INR {{ number_format($order->orderItemDetail->shipping_charge, 2) }}</td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right"> <b>Discount Via Coupon ({{ $order->orderItemDetail->order->coupon_code }})</b>
    </td>
    <td class="text-right">
      - {{ $order->orderItemDetail->order->currency_code }}
      {{ number_format($order->orderItemDetail->coupon_amount, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right"><b>Total</b>
    </td>
    <td class="text-right">
      <b>INR
        {{ number_format($order->orderItemDetail->grand_total - $order->coupon_amount * $order->quantity, 2) }}</b>
    </td>
  </tr>
  @if ($order->orderItemDetail->payment_method === 'Cash on Delivery')
    {{-- <tr>
      <td colspan="5"></td>
      <td class="text-right"><b>Advance Amount Received</b>
      </td>
      <td class="text-right">
        <form class="row" method="post"
          action="{{ route('admin.update-order-advanced-amount', $order->orderItemDetail->id) }}">
          @csrf
          <div @class([
              'col-9' => $order->orderItemDetail->advance_amount === 0.0,
              'col-12' => $order->orderItemDetail->advance_amount > 0.0,
          ])>
            <input type="number" min="0"
              max="{{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->order->shipping_charge - $order->coupon_amount * $order->quantity - ($order->orderItemDetail->order->wallet + $order->orderItemDetail->order->gift_card_amount + $order->orderItemDetail->order->referral_amount), 0, '.', '') }}"
              class="form-control text-right" name="advance_amount"
              value="{{ $order->orderItemDetail->advance_amount }}" @disabled($order->orderItemDetail->advance_amount > 0.0) />
          </div>
          <div @class([
              'col-3',
              'd-none' => $order->orderItemDetail->advance_amount > 0.0,
          ])>
            <button class="btn btn-dark">Save</button>
          </div>
        </form>
      </td>
    </tr> --}}
  @endif

  <tr>
    <td colspan="5"></td>
    <td class="text-right"><b>Pending</b>
    </td>
    <td class="text-right">
      <b>
        INR
        {{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - $order->orderItemDetail->coupon_amount * $order->orderItemDetail->quantity - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->orderItemDetail->advance_amount), 2) }}
      </b>
    </td>
  </tr>
</tfoot>
