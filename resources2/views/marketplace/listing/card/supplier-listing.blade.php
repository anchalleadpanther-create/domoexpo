<div class="ps-shopping-product">
    <div class="row">
@foreach ($suppliers as $key => $supplier)
<x-marketplace.supplier-card :supplier="$supplier" />
@endforeach

</div>
</div>

<div class="ps-pagination">
   {!! $suppliers->links('pagination::bootstrap-4') !!}
</div>

