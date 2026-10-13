@extends('customer.partials.header')
@section('customerContent')
<!--Body Container-->
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"></div>
            <div class="collection-hero__title-wrapper container">
                <div class="breadcrumbs text-uppercase mt-0 mt-lg-0"><span class="fw-bold">Checkout</span></div>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->

    <!--Main Content-->
    <div class="container animate__animated animate__fadeIn">
        <form class="checkout-form" method="post" action="{{ route('buyer.new-order') }}">
            @csrf
            <input type="hidden" name="razorpay_payment_id" readonly />
            <input type="hidden" name="used_gift_card_amount" readonly value="" />

            <div class="row">
                <div class="col-md-1 col-lg-1">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="card card--grey">
                        <div class="card-body">
                            <h2 class="fs-6">Order Info!</h2>
                            <p>
                                @guest('buyer')
                                <a class="text-decoration-underline" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Login</a> or
                                <a class="text-decoration-underline" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#registerModal">Register</a> for faster payment.
                                <br />
                                @endguest
                                @auth('buyer')
                                <a class="text-decoration-underline" href="javascript:;" data-bs-toggle="modal"
                                    data-bs-target="#addressModal">Add new address</a> <br />
                                <a class="text-decoration-underline"
                                    href="{{ route('buyer.dashboard', 'address') }}">Manage
                                    Addresses</a>
                                @endauth
                            </p>
                            <div class="row mt-2 mx-0">
                                {{-- @include('customer.order.guest-address') --}}
                                <div class="list-group">
                                    @forelse ($addresses as $address)
                                    <label class="list-group-item my-1 border ">
                                        <div class="row">
                                            <div class="col-1">
                                                <input class="form-check-input form-control-color me-1" type="radio"
                                                    name="address" value="{{ $address->id }}" @if (Request('address')
                                                    !==null) @checked((int)Request('address')===$address->id) @else
                                                @checked($loop->first) @endif
                                                required>
                                            </div>
                                            <div class="col-11">
                                                <a class="list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">{{ $address->fullName }}</h5>
                                                        <small class="text-muted">{{ $address->address_type }}</small>
                                                    </div>
                                                    <p class="mb-1">{{ $address->address_one }}</p>
                                                    <small class="text-muted">{{ @$address->myCity->name }},
                                                        {{ @$address->myState->name }},
                                                        {{ @$address->myCountry->name }}</small>
                                                </a>
                                                <br />
                                                <a class="text-muted text-decoration-underline delete-address"
                                                    data-url="{{ route('buyer.address.destroy', $address->id) }}"
                                                    href="javascript:;">Delete</a>
                                            </div>
                                        </div>

                                    </label>
                                    @empty
                                    @auth('buyer')
                                    <label class="list-group-item my-1 border shadow-sm">
                                        <div class="row">
                                            <div class="col-12">
                                                <a class="list-group-item-action">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">No addresses found!</h5>
                                                    </div>
                                                    <p class="mb-1">Please add atleast one shipping address to
                                                        place your order!</p>
                                                    <small class="text-muted">
                                                        <a class="text-decoration-underline" href="javascript:;"
                                                            data-bs-toggle="modal" data-bs-target="#addressModal">Click
                                                            here to add new
                                                            address</a>
                                                    </small>
                                                </a>
                                            </div>
                                        </div>
                                    </label>
                                    @endauth
                                    @guest('buyer')
                                    @include('customer.order.guest-address')
                                    @endguest
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-1 col-lg-1">
                </div>
                <div class="col-md-12 col-lg-5 mt-2 mt-lg-0">
                    <h2 class="title fs-6">ORDER SUMMARY</h2>
                    <p class="text-pink fw-600 warning-messages"></p>
                    <div class="table-responsive order-table style1">
                        <table class="table table-bordered align-middle table-hover text-center mb-1">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-start">Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="checkout-products">
                            </tbody>
                            <tfoot class="font-weight-600">
                                <tr class="shipping-charges">
                                    <td colspan="3" class="text-end fw-bolder">Shipping </td>
                                    <td colspan="2" class="fw-bolder">
                                        {{ getCurrentCurrency()->currency }}
                                        @if (getCurrentCurrency()->currency === 'INR')
                                        @if ($currentCurrency?->currency === 'INR')
                                        {{ number_format(getIndianShippingCost() * getCurrentCurrency()->con_ratio, 2)
                                        }}
                                        @else
                                        {{ number_format(getInternationalShippingCost() *
                                        getCurrentCurrency()->con_ratio, 2) }}
                                        @endif
                                        @else
                                        {{ number_format(getInternationalShippingCost() *
                                        getCurrentCurrency()->con_ratio, 2) }}
                                        @endif
                                    </td>
                                </tr>
                                <tr @class([ 'referral-discount' , 'd-none'=> $isReferralDiscountAvailable === false,
                                    ])>
                                    <td colspan="3" class="text-end fw-bolder">Referral Discount </td>
                                    <td colspan="2" class="fw-bolder">
                                        - {{ getCurrentCurrency()->currency }}
                                        {{ number_format(\App\Helpers\Referral::getDetails()->referralAmountToBeAlloted
                                        * getCurrentCurrency()->con_ratio, 2) }}
                                    </td>
                                </tr>
                                <tr class="d-none gift-pricing">
                                    <td colspan="3" class="text-end fw-bolder">Gift</td>
                                    <td colspan="2" class="fw-bolder gift-total">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end fw-bolder">Total</td>
                                    <td colspan="2" class="fw-bolder checkout-grand-total" data-total=""
                                        data-dummy-total="" data-currency="{{ getCurrentCurrency()->currency }}"
                                        data-con-ratio="{{ getCurrentCurrency()->con_ratio }}">
                                        {{ getCurrentCurrency()->currency }} 0.00
                                    </td>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                    @auth('buyer')
                    @if (!$addresses->isEmpty())
                    
                    
                    <div class="card card--grey mt-2 offers-div">
                        <div class="card-body">
                            <a class="fs-6" href="javascript:;" class="offers-btn" data-bs-toggle="modal"
                                data-bs-target="#offersModal">Click to view available offers.</a>
                        </div>
                    </div>
                    <!--div class="card card--grey mt-2">
                        <div class="card-body">
                            <h2 class="fs-6">Comment (Optional)</h2>
                            <textarea class="input-group__field" placeholder="Order Comment" name="comment"
                                maxlength="150"></textarea>
                        </div>
                    </div-->
                    
                    @if (!$isReferralDiscountAvailable)
                    <!--div class="card card--grey mt-2 coupon-div">
                        <div class="card-body">
                            <h2 class="fs-6">Apply Coupon code</h2>
                            <div class="input-group flex-nowrap">
                                <input class="input-group__field" type="text" placeholder="Coupon code" name="code">
                                <span class="input-group__btn">
                                    <button type="button" class="btn rounded-end text-nowrap coupon-btn">
                                        Apply</button>
                                </span>
                            </div>
                        </div>
                    </div-->
                    <div @class(['card card--grey mt-2 gift-card-div'])>
                        <div class="card-body">
                            <h2 class="fs-6">Apply Gift Card/Coupon</h2>
                            <div class="input-group flex-nowrap">
                                <input class="input-group__field" type="text" placeholder="Gift Card" name="gift_card">
                                <span class="input-group__btn">
                                    <button type="button" class="btn rounded-end text-nowrap gift-card-btn">
                                        Apply</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="card card--grey mt-2 payment-methods">
                        <div class="card-body">
                            <h2 class="fs-6">PAYMENT METHOD</h2>
                            <div class="row">
                                {{-- @if (getCurrentCurrency()->currency === 'INR') --}}
                                {{-- @if ($currentCurrency?->currency === 'INR') --}}
                                <div class="col-6 cod-div">
                                    <div class="customRadio clearfix">
                                        <input id="formcheckoutRadio4" value="Cash on Delivery" name="payment_method"
                                            type="radio" class="radio payment-methods cod" checked="checked">
                                        <label for="formcheckoutRadio4">Cash on Delivery</label>
                                    </div>
                                </div>
                                {{-- @endif --}}

                                <div class="col-6 ">
                                    <div class="customRadio clearfix">
                                        <input id="formcheckoutRadio6" value="CcAvenue" name="payment_method"
                                            type="radio" class="radio payment-methods online"
                                            @checked(getCurrentCurrency()->currency !== 'INR')>
                                        <label for="formcheckoutRadio6">Pay Online Via CcAvenue</label>
                                    </div>
                                </div>

                                <div class="col-6  d-none">
                                    <div class="customRadio clearfix">
                                        <input id="formcheckoutRadio5" value="RazorPay" name="payment_method"
                                            type="radio" class="radio payment-methods online"
                                            @checked(getCurrentCurrency()->currency !== 'INR')>
                                        <label for="formcheckoutRadio5">Pay Online Via Razorpay</label>
                                    </div>
                                </div>
                                @if (getCurrentCurrency()->currency !== 'INR')
                                <div class="col-6 d-none">
                                    <div class="customRadio clearfix">
                                        <input id="formcheckoutRadio5" value="PayPal" name="payment_method" type="radio"
                                            class="radio payment-methods" checked>
                                        <label for="formcheckoutRadio5">Pay Online Via PayPal</label>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card card--grey mt-2 cod-otp-div d-none">
                        <div class="card-body">
                            <h2 class="fs-6">Verify Your OTP below</h2>
                            <div class="input-group flex-nowrap">
                                <input class="input-group__field" type="number" min="0" placeholder="OTP" name="otp"
                                    value="">
                                <span class="input-group__btn">
                                    <button type="button" class="btn rounded-end text-nowrap cod-verify-btn">
                                        Verify</button>
                                </span>
                            </div>
                        </div>
                    </div>


                    @auth('buyer')
                    @if (auth()->guard('buyer')->user()->wallet > 0 && !$isReferralDiscountAvailable)
                    <div @class(['card card--grey mt-2 wallet-div'])>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input form-control-color wallet-btn" type="checkbox" value=""
                                    id="flexCheckDefault" name="wallet_used">
                                <label class="form-check-label wallet-amount-label" for="flexCheckDefault">

                                </label>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endauth
                    <div class="order-button-payment mt-2 clearfix">
                        <button
                            class="cartCheckout fs-6 btn btn-lg rounded w-100 fw-600 text-white place-order-btn">Place
                            order</button>
                    </div>
                    @endif
                    @endauth
                    <div class="paymnet-img text-center">
                    <img src="{{ asset('allUsers/customer/images/payment-img.jpg') }}" alt="Payment"></div>
                </div>
            </div>
        </form>
    </div>
    <!--End Main Content-->
</div>
<!--End Body Container-->
<x-customer.new-address-modal />
<div class="modal fade" id="offersModal" tabindex="-1" aria-labelledby="offersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="offersModalLabel">Available coupons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @forelse ($coupons as $coupon)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $coupon->code }} ({{ $coupon->percent }}% off)
                        <button type="button"
                            class="badge bg-pink text-black-50 rounded-pill py-2 apply-selected-coupon-btn"
                            data-code="{{ $coupon->code }}">Apply</button>
                    </li>
                    @empty
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        No coupons found!
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

<input type="hidden" class="address-country" name="" value="{{ $currentCurrency?->country_id }}" />


<input type="hidden" class="address-country" value="{{ $currentCurrency?->country_id }}"
    data-type="{{ Request('address') !== null ? 'address' : 'checkout' }}" />
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="module" type="text/javascript" src="{{ asset('allUsers/customer/checkout.js') }}"></script>
<script type="module" type="text/javascript" src="{{ asset('allUsers/customer/new-address.js') }}"></script>
@endsection