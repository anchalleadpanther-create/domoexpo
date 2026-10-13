@foreach ($services as $key => $service)
<x-purchasync.listing.supplier-service-card :service="$service" />
@endforeach

<div class="ps-pagination service-pagination-div">
    {!! $services->appends(request()->query())->links('pagination::bootstrap-4') !!}
</div>