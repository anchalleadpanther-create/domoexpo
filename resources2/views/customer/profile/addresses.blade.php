<div id="address" class="address tab-pane @if (Request::segment(3) === 'address') active show @endif">
  <h3>Addresses</h3>
  <p class="xs-fon-13 margin-10px-bottom">The following addresses will be used on the checkout page by
    default.</p>
  <div class="row">
    @forelse ($addresses as $key => $address)
      <div class="col-12 col-sm-6 @unless($key % 2 !== 0) border-end @endunless mb-4">
        <h4 class="billing-address">Shipping address #{{ ++$key }}</h4>
        <a class="link-underline view edit-address" href="javascript:;" data-bs-toggle="modal"
          data-bs-target="#addressModal" data-id="{{ $address->id }}">Edit</a>
        <a href="javascript:;" class="link-underline view ms-3 border-0 delete-address"
          data-url="{{ route('buyer.address.destroy', $address->id) }}">Delete</a>

        <p class="fw-600">{{ $address->fullName }} ({{ $address->address_type }})</p>
        <p>{{ $address->address_one }}<br>{{ @$address->myCity->name }},
          {{ @$address->myState->name }}, <br />{{ @$address->myCountry->name }}</p>
        @if ($loop->last)
          <div class="accordion add-address mt-3" id="address1">
            <button class="collapsed btn btn--small rounded" type="button" data-bs-toggle="modal"
              data-bs-target="#addressModal">Add
              Address</button>
          </div>
        @endif
      </div>
    @empty
      <div class="col-12 col-sm-6">
        <h4 class="billing-address">No addresses found!</h4>
        <a class="link-underline view" href="javascript:;">Please add new address</a>
        <div class="accordion add-address mt-3" id="address1">
          <button class="collapsed btn btn--small rounded" type="button" data-bs-toggle="modal"
            data-bs-target="#addressModal">Add
            Address</button>
        </div>
      </div>
    @endforelse

  </div>
</div>
<x-customer.new-address-modal />
<script type="module" src="{{ asset('allUsers/customer/new-address.js') }}"></script>
