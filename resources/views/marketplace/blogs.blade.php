@extends('purchasync.partials.header')
@section('customerContent')
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"></div>
            <div class="collection-hero__title-wrapper container">
                <h1 class="collection-hero__title">Purchasync</h1>
                <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{url('/')}}"
                        title="Back to the home page">Home</a><span>|</span><span class="fw-bold">Purchasync</span>
                </div>
            </div>
        </div>
    </div>
    <!--End Collection Banner-->

    <div class="container-fluid">
        <div class="row flex-column-reverse flex-lg-row">
            <!--Main Content-->
            <div class="col-12 col-lg-9">
                <div class="blog--list-view blog-list-view blog--grid-load-more blog-list-view">

                    @foreach($blogs as $blog_item)
                    <div class="article">
                        <div class="row">
                            <!-- Article Image -->
                            <div class="col-12 col-md-6">
                                <a class="article_featured-image mb-md-0 zoom-scal"
                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                    <img class="blur-up lazyload"
                                        data-src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                        src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                        alt="{{ $blog_item->name }}" style="height: 300px;">
                                </a>
                            </div>
                            <!-- Article Content -->
                            <div class="col-12 col-md-6">
                                <h2 class="h3 text-transform-none">
                                    <a href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                        {{ $blog_item->name }}
                                    </a>
                                </h2>
                                <ul class="publish-detail">
                                    <li><i class="icon an an-clock-r d-none"></i>
                                        <time datetime="{{ $blog_item->created_at }}">{{ $blog_item->created_at->format('l d, Y') }}</time>
                                    </li>
                                    <li><i class="icon an an-user-al d-none"></i>
                                        <span class="clr-555 me-1">Posted by:</span>Purchasync
                                    </li>
                                </ul>
                                <div class="rte">
                                    @php
                                    $content = Str::limit($blog_item->short_desc, 750);
                                    @endphp
                                    {!! $content !!}
                                </div>
                                <p>
                                    <a href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}"
                                        class="btn btn--small rounded">Read more</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Load More Button -->
                    <div class="loadmore-post">
                       {{ $blogs->links() }}


                    </div>
                    <!-- End Load More Button -->
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-12 col-lg-3 blog-sidebar sidebar sidebar-noborder">
                <!-- Sidebar tags -->
                <div class="sidebar_tags clearfix">
                    <!-- Recent Posts -->
                    <div class="sidebar_widget clearfix">
                        <div class="widget-title">
                            <h2>Recent Posts</h2>
                        </div>
                        <div class="widget-content">
                            <div class="list list-sidebar-products">
                                <div class="row">
                                    @foreach($latestBlogs as $blog_item)
                                    <div class="col-12">
                                        <div class="mini-list-item d-flex mb-10 clearfix">
                                            <div class="mini-view_image">
                                                <a class="grid-view-item__link"
                                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                                    <img class="grid-view-item__image blur-up lazyload"
                                                        data-src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                                        src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                                        alt="blog">
                                                </a>
                                            </div>
                                            <div class="ms-3 details">
                                                <a class="grid-view-item__title"
                                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                                    {{ $blog_item->name }}
                                                </a>
                                                <div class="grid-view-item__meta clr-555">
                                                    <time datetime="{{ $blog_item->created_at }}">
                                                        {{ $blog_item->created_at->format('l d, Y') }}
                                                    </time>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Recent Posts -->
                </div>
                <!-- End Sidebar tags -->
            </div>
            <!-- End Sidebar -->
        </div>
    </div>

</div>
<!--End Body Container-->
@endsection