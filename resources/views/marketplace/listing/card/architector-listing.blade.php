
<div class="ps-shopping-product">
    <div class="row">
        @foreach ($users as $key => $architect)
            <x-marketplace.architect-card :architect="$architect"  />
        @endforeach
       
    </div>
</div>
<div class="ps-pagination">
    <!--<ul class="pagination">-->
    <!--    <li class="active"><a href="#">1</a></li>-->
    <!--    <li><a href="#">2</a></li>-->
    <!--    <li><a href="#">3</a></li>-->
    <!--    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>-->
    <!--</ul>-->
    
    {{-- {!! $users->onEachSide(5)->appends(request()->input())->links('pagination::bootstrap-4')
    !!} --}}
    {!! $users->appends(request()->query())->links('pagination::bootstrap-4') !!}
</div>