@extends('purchasync.partials.header')
@section('customerContent')
<div id="page-content">
    <!--Collection Banner-->
    <!--<div class="collection-header">-->
    <!--    <div class="collection-hero">-->
    <!--        <div class="collection-hero__image"></div>-->
    <!--        <div class="collection-hero__title-wrapper container">-->
    <!--            <h1 class="collection-hero__title">Purchasync</h1>-->
    <!--            <div class="breadcrumbs text-uppercase mt-1 mt-lg-2"><a href="{{url('/')}}"-->
    <!--                    title="Back to the home page">Home</a><span>|</span><span class="fw-bold">Purchasync</span>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--End Collection Banner-->
    
    <div id="homepage-5">
        <div class="ps-home-banner pb-4">
            
            <div class="container-fluid bg-secondary my-5">
                <div class="row pt-5 pb-4 text-center  d-flex align-items-center ">
                    <div class="col-lg-12">
                        <h4 class="text-white"> Blogs</h4>
                    </div>
                </div>
            </div>
            <div class="container">
                
                <div class="row">
                    
                    
                    
                    
                    <div class="col-lg-9">
                        
                        @foreach($blogs as $blog_item)
                        <div class="card mb-3 border-0"  >
                          <div class="row no-gutters">
                            <div class="col-md-6 w-100">
                                <a class="article_featured-image mb-md-0 zoom-scal"
                                    href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                    <img class="blur-up lazyload w-100 img-thumbnail"
                                        data-src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                        src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                        alt="{{ $blog_item->name }}" style="height: 300px;">
                                </a>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                              <div class="card-body ">
                                
                                    <h3>
                                        <a class="ps-post__title mb-1" href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                                {{ $blog_item->name }}
                                                
                                        </a>
                                    </h3>
                             
                                <p class="text-monospace">
                                    @php
                                        $content = Str::limit($blog_item->short_desc, 750);
                                    @endphp
                                    {!! $content !!}
                                    
                                </p>
                                
                                <p class="card-text "><span class="badge badge-light">{{ $blog_item->created_at->format('l d, Y') }} </span>| <span class="badge badge-light me-1">Posted by :  Purchasync </span></p>
                                <a href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}" class="ps-btn">Read More...</a>
                              </div>
                            </div>
                           <div class="col-lg-12">
                                <hr>
                           </div>
                          </div>
                        </div>
                        @endforeach
                        
                    </div>
                    
                    
                    <div class="col-lg-3"> 
                        <div class="card mb-3 border-0">
                            <h4 class="card-title my-2">Recent Posts</h4>
                            @foreach($latestBlogs as $blog_item)
                            <div class="row no-gutters">
                                
                                <div class="col-md-4">
                                    <a 
                                        href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                        <img class="blur-up lazyload w-100 img-thumbnail"
                                            data-src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                            src="{{ asset('uploads/blog/') }}/{{ $blog_item->image }}"
                                            alt="{{ $blog_item->name }}">
                                    </a>
                                    
                                </div>
                                <div class="col-md-8">
                                    <a 
                                        href="{{ route('customer.blog-detail', [$blog_item->slug, $blog_item->id]) }}">
                                  <div class="card-body">
                                    <h5 class="card-title">{{ $blog_item->name }}</h5>
                                     <p class="card-text"><small class="text-muted">{{ $blog_item->created_at->format('l d, Y') }}</small></p>
                                  </div>
                                  </a>
                                </div>
                                
                                <div class="col-lg-12">
                                    <hr>
                               </div>
                               
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
               
                
            </div>
        </div>
    </div>

    
</div>
<!--End Body Container-->
@endsection