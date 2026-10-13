{{-- <div class="blogpost-item">
    <a href="javascript:;" class="post-thumb">
        <img class="blur-up lazyload" src="{{ $path }}{{ $blog->image }}" data-src="{{ $path }}{{ $blog->image }}"
            alt="{{ $blog->name }}" title="{{ $blog->name }}" />
    </a>
    <div class="post-detail">
        <h3 class="post-title mb-3"><a href="javascript:;">{{ $blog->name }}</a></h3>
        <ul class="publish-detail d-flex-center mb-3">
            <li class="d-flex align-items-center"><i class="an an-calendar me-2"></i> <span class="article__date">{{
                    $blog->created_at->format('d M, Y') }}</span></li>
            <li class="d-flex align-items-center"><i class="an an-comments-l me-2"></i> <a href="javascript:;"
                    class="article-link">1 comment</a></li>
        </ul>
        <p class="exceprt">{{ $blog->short_desc }}</p>

    </div>
</div> --}}


@extends('customer.partials.header')
@section('customerContent')
<!--Body Container-->
<div id="page-content">
    <!--Breadcrumbs-->
    <div class="breadcrumbs-wrapper text-uppercase">
        <div class="container-fluid">
            <div class="breadcrumbs"><a href="" title="Back to the home page">Home</a><span>|</span><span
                    class="fw-bold">{{ $blog->name }}</span></div>
        </div>
    </div>
    <!--End Breadcrumbs-->

    <!--Container-->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 blog-sidebar sidebar sidebar-noborder">

                <!--Sidebar tags-->
                <div class="sidebar_tags clearfix">

                    <!--Recent Posts-->
                    <div class="sidebar_widget clearfix">
                        <div class="widget-title">
                            <h2>Recent Posts</h2>
                        </div>
                        <div class="widget-content">
                            <div class="list list-sidebar-products">
                                <div class="row">
                                    @foreach($relatedBlogs as $blog_item)
                                    <div class="col-12">
                                        <div class="mini-list-item d-flex mb-10 clearfix">
                                            <div class="mini-view_image"><a class="grid-view-item__link"
                                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}"><img
                                                        class="grid-view-item__image blur-up lazyload"
                                                        data-src="{{asset('uploads/blog/')}}/{{$blog_item->image}}"
                                                        src="{{asset('uploads/blog/')}}/{{$blog_item->image}}"
                                                        alt="blog" /></a></div>
                                            <div class="ms-3 details">
                                                <a class="grid-view-item__title"
                                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">{{$blog_item->name}}</a>
                                                <div class="grid-view-item__meta clr-555"><time
                                                        datetime="{{$blog_item->created_at->format('Y-m-d')}}">{{$blog_item->created_at->format('l
                                                        d, Y')}}</time></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Recent Posts-->

                    <!--Banner-->
                    <!--<div class="sidebar_widget clearfix static-banner d-none d-lg-block">-->
                    <!--    <a href="shop-left-sidebar.html"><img src="{{asset('assets/images/top-sale-banner.jpg')}}" alt="image"></a>-->
                    <!--</div>-->
                    <!--End Banner-->

                </div>
                <!--End Sidebar tags-->
            </div>
            <!--End Sidebar-->

            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                <div class="article">
                    <h1 class="h3">{{ $blog->name }}</h1>
                    <ul class="publish-detail d-flex-wrap mb-4 pt-1">
                        <li><i class="icon an an-clock-r"></i><time datetime="2021-01-28">{{$blog->created_at->format('l
                                d, Y')}}</time></li>
                        <li><i class="icon an an-user-al"></i><span class="clr-555 me-1">Posted by:</span>Littletags
                        </li>
                    </ul>
                    <!-- Article Image -->
                    <div class="article_featured-image"><img class="blur-up ls-is-cached lazyloaded"
                            data-src="{{asset('uploads/blog/')}}/{{$blog->image}}"
                            src="{{asset('uploads/blog/')}}/{{$blog->image}}" alt="blog" /></div>
                    <!-- Article Content -->
                    <div class="rte">
                        {!! $blog->content !!}
                    </div>
                    <!-- Article Tags -->

                    <hr>


                    <!--Return to Posts-->
                    <div class="text-center return-link-wrapper my-4">
                        <a href="{{route('blogs')}}" class="btn btn-lg rounded btn--has-icon-before return-link"><i
                                class="icon an an-long-arrow-alt-left align-middle me-2"></i><span
                                class="align-middle">Back to Blogs</span></a>
                    </div>
                    <!--End Return to Posts-->
                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>
    <!--End Container-->
</div>
<!--End Body Container-->
@endsection