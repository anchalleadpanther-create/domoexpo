<tfoot class="mobile-hide">
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Sub-Total</b>
    </td>
    <td class="text-right">INR {{ number_format($order->orderItemDetail->grand_total, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Flat Shipping Rate</b>
    </td>
    <td class="text-right">
      INR
      {{ number_format($order->orderItemDetail->shipping_charge, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right"> <b>Gift</b>
    </td>
    <td class="text-right">
      {{ @$order->orderItemDetail->order->currency_code }}
      {{ number_format($order->gift_pricing * @$order->orderItemDetail->order->currency_con_ratio, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Wallet Used</b>
    </td>
    <td class="text-right">
      - INR
      {{ number_format($order->orderItemDetail->wallet_used, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Discount Via Coupon ({{ $order->orderItemDetail->order->coupon_code }})</b>
    </td>
    <td class="text-right">
      - INR
      {{ number_format($order->coupon_amount, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Discount Via Referral</b>
    </td>
    <td class="text-right">
      - INR
      {{ number_format($order->orderItemDetail->referral_amount, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Discount Via Gift Card ({{ $order->orderItemDetail->order->gift_card }})</b>
    </td>
    <td class="text-right">
      - INR
      {{ number_format($order->orderItemDetail->gift_card_amount, 2) }}
    </td>
  </tr>
  <tr>
    <td colspan="5"></td>
    <td class="text-right">
      <b>Total</b>
    </td>
    <td class="text-right">
      <b>INR
        {{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge + $giftTotal - ($order->coupon_amount + $order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 2) }}</b>
    </td>
  </tr>
  @if (
      $order->orderItemDetail->payment_method === 'Cash on Delivery' ||
          $order->orderItemDetail->payment_method === 'Prepaid')
    <tr>
      <td colspan="5"></td>
      <td class="text-right">
        <b>Advance Amount Received</b>
      </td>
      <td class="text-right">
        <form class="row" method="post"
          action="{{ route('admin.update-order-advanced-amount', $order->orderItemDetail->id) }}">
          @csrf
          <input type="hidden"
            value="{{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge + $giftTotal - $order->coupon_amount * $order->orderItemDetail->quantity - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 2, '.', '') }}"
            name="total" />
          <div @class([
              'col-9' => $order->orderItemDetail->advance_amount === 0.0,
              'col-12' => $order->orderItemDetail->advance_amount > 0.0,
          ])>
            <input type="number" min="0"
              max="{{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge + $giftTotal - $order->coupon_amount * $order->orderItemDetail->quantity - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 0, '.', '') }}"
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
    </tr>

    <tr>
      <td colspan="5"></td>
      <td class="text-right"><b>Pending</b>
      </td>
      <td class="text-right">
        <b>
          INR
          {{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge + $giftTotal - ($order->coupon_amount + $order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->orderItemDetail->advance_amount), 2) }}
        </b>
      </td>
    </tr>
  @endif
</tfoot>


<tfoot class="desktop-hide">
  <tr>

    <td class="text-left">
      <b>Sub-Total</b>
    </td>
    <td class="text-left">INR {{ number_format($order->orderItemDetail->grand_total, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Flat Shipping Rate</b>
    </td>
    <td class="text-left">
      INR
      {{ number_format($order->orderItemDetail->shipping_charge, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Wallet Used</b>
    </td>
    <td class="text-left">
      - INR
      {{ number_format($order->orderItemDetail->wallet_used, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Discount Via Coupon ({{ $order->orderItemDetail->order->coupon_code }})</b>
    </td>
    <td class="text-left">
      - INR
      {{ number_format($order->coupon_amount, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Discount Via Referral</b>
    </td>
    <td class="text-left">
      - INR
      {{ number_format($order->orderItemDetail->referral_amount, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Discount Via Gift Card ({{ $order->orderItemDetail->order->gift_card }})</b>
    </td>
    <td class="text-left">
      - INR
      {{ number_format($order->orderItemDetail->gift_card_amount, 2) }}
    </td>
  </tr>
  <tr>

    <td class="text-left">
      <b>Total</b>
    </td>
    <td class="text-left">
      <b>INR
        {{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - ($order->coupon_amount + $order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 2) }}</b>
    </td>
  </tr>
  @if ($order->orderItemDetail->payment_method === 'Cash on Delivery')
    <tr>

      <td class="text-left">
        <b>Advance Amount Received</b>
      </td>
      <td class="text-left">
        <form class="row" method="post"
          action="{{ route('admin.update-order-advanced-amount', $order->orderItemDetail->id) }}">
          @csrf
          <div @class([
              'col-9' => $order->orderItemDetail->advance_amount === 0.0,
              'col-12' => $order->orderItemDetail->advance_amount > 0.0,
          ])>
            <input type="number" min="0"
              max="{{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - $order->coupon_amount * $order->orderItemDetail->quantity - ($order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount), 0, '.', '') }}"
              class="form-control text-left" name="advance_amount"
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
    </tr>

    <tr>

      <td class="text-left"><b>Pending</b>
      </td>
      <td class="text-left">
        <b>
          INR
          {{ number_format($order->orderItemDetail->grand_total + $order->orderItemDetail->shipping_charge - ($order->coupon_amount + $order->orderItemDetail->wallet_used + $order->orderItemDetail->gift_card_amount + $order->orderItemDetail->referral_amount + $order->orderItemDetail->advance_amount), 2) }}
        </b>
      </td>
    </tr>
  @endif
</tfoot>
