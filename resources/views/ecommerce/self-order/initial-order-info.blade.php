@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">

        <div class="row">
          <div class="col-sm-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Placing order on behalf of {{ $customer->fullName }}</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form action="{{ route('admin.place-order') }}" method="post" id="category" class="order-form">
                  @csrf
                  <input type="hidden" name="wallet_used" value="" />
                  <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
                  <div class="product-ids">
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <div class="clearfix"></div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label">Search Product via SKU</label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search_sku" id="sku"
                                  maxlength="100" value="" placeholder="">
                                <span style="cursor:pointer;" class="input-group-text search-sku-btn">Search &nbsp;<i
                                    class="fa fa-search"></i>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label">Select Shipping Address</label>
                              <div class="input-group mb-3">
                                <select class="form-select address" name="address" required>
                                  <option value="">Select Address</option>
                                  @foreach ($customer->addresses as $address)
                                    <option value="{{ $address->id }}">
                                      Address: {{ $address->address_one }} | Country:
                                      {{ $address->myCountry->name }} |
                                      State: {{ $address->myState->name }} | City: {{ $address->myCity->name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label">Select Order Currency</label>
                              <div class="input-group mb-3">
                                <select class="form-select" name="currency" required>
                                  <option value="">Select Currency</option>
                                  @foreach (getCurrencies() as $currency)
                                    <option @selected($currency->currency === 'INR') value="{{ $currency->currency }}">
                                      {{ $currency->currency }} -
                                      {{ $currency->country?->name }}
                                    </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label">Select Payment Mode</label>
                              <div class="input-group mb-3">
                                <select class="form-select" name="payment_method" required>
                                  <option value="">Select Payment Mode</option>
                                  <option value="Cash on Delivery">Cash on Delivery</option>
                                  <option value="RazorPay">RazorPay</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label class="form-label">Enter Coupon Code</label>
                              <input type="text" class="form-control" name="coupon_code" id="sku" maxlength="100"
                                value="" placeholder="">
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="box-header with-border border-0 px-0 my-0">
                          <h4 class="box-title">Products Information</h4>
                        </div>
                        <div class="grey-bg-clr more-products">
                        </div>
                      </div>
                      <div class="row mt-40">
                        <div class="col-md-3">
                          <label class="form-label">Wallet Money</label>
                          <div class="input-group mb-3">
                            <input type="number" name="wallet_money" max="{{ $customer->wallet }}" class="form-control"
                              value="{{ $customer->wallet }}" />
                            <span style="cursor:pointer;" data-wallet-applied="no"
                              class="input-group-text apply-wallet-button">Apply Wallet Amount
                              &nbsp;<i class="fa fa-money"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-20">
                        <hr>
                        <div class="col-md-12 pull-right">
                          <div class="clearfix">
                            <button type="submit" class="waves-effect waves-light btn btn-dark mb-5 category"><i
                                class="fa fa-check"></i> Place order!</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
  <script type="module" type="text/javascript" src="{{ asset('allUsers/user/self-order.js') }}"></script>
@endsection
