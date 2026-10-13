<div id="orders" class="product-order tab-pane fade @if (Request::segment(3) === 'orders') active show @endif">
  <h3>Orders</h3>
  <div class="table-responsive order-table">
    <table class="table table-bordered table-hover align-middle text-center mb-0">
      <thead class="alt-font">
        <tr>
          <th>Order</th>
          <th>Product</th>
          <th>Date</th>
          <th>Status</th>
          <th>Total</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($orders as $order)
          <tr>
            <td>{{ @$order->orderItemDetail->order_id_counter }}</td>
            <td>
              <a
                @isset($order->product)
                target="_blank"
                href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}"
                @endisset>
                {{ $order->name }}
              </a>
            </td>
            <td>{{ @$order->orderItemDetail->created_at->format('d M, Y') }}</td>
            <td class="text-success">{{ @$order->OrderStatus }}</td>
            <td>{{ @$order->orderItemDetail->order->orderCurrency->currency }}
              {{ number_format(@$order->orderItemDetail->grand_total * @$order->orderItemDetail->order->orderCurrency->con_ratio, 2) }}
              for
              {{ $order->quantity }}
              item
            </td>
            <td><a class="link-underline view"
                href="{{ route('buyer.order-detail', $order->supplier_order_id) }}">Track your order</a></td>
          </tr>
        @empty
        
        @endforelse


        @forelse ($oldOrders as $order_value)
        
          <tr>
            <td>{{ @$order_value->id }}</td>
            <td>
              <a
                @isset($order->product)
                target="_blank"
                href="{{ route('customer.product-detail', [$order->product->mappedCategories->last()->category_slug, $order->product->slug, $order->product->sku, $order->product->uuid]) }}"
                @endisset
                >

                {{ isset($order_value['orderItem']) && isset($order_value['orderItem']['productname']) ? $order_value['orderItem']['productname'] : 'Product name not available.' }}

              </a>
            </td>
            <td>{{ @$order_value['orderItem']['adddate'] }}</td>
            <td class="text-success">{{ @$order_value->approve_status }}</td>
            <td>INR
              {{ number_format(@$order_value->totalcost, 2) }}
              for
              {{ @$order_value->quantity2 }}
              item
            </td>
            <td><a target="_blank" href="{{ route('buyer.old-order-detail' ,[ $order_value->sid ]) }}" class="link-underline view"
                >Track your order</a></td>
          </tr>
        @empty
          
        @endforelse

        @if (empty($oldOrders) && empty($orders))
          <tr>
            <td colspan="6">
              <p class="h5 my-2">No orders found! <i class="icon an an-times-cil"></i></p>
            </td>
          </tr>
        @endif




        
      </tbody>
    </table>
  </div>
</div>
