@extends('marketplace.partials.header')
@section('content')
<style>
   .review-form {
   max-width: 600px;
   margin: 20px auto;
   text-align: center;
   }
   .star-rating {
   display: flex;
   justify-content: center;
   gap: 5px;
   margin-bottom: 10px;
   }
   .star {
   font-size: 30px;
   color: #ccc;
   cursor: pointer;
   transition: color 0.2s;
   }
   .star.hover,
   .star.selected {
   color: gold;
   }
   textarea {
   width: 100%;
   font-size: 16px !important;
   padding: 8px;
   border-radius: 6px;
   border: 1px solid #ddd;
   margin-bottom: 10px;
   resize: none;
   }
   .submitReview {
   display: inline-block;
   /* padding: 15px 45px; */
   font-size: 16px;
   font-weight: normal;
   line-height: 20px;
   color: #fff;
   border: none;
   border-radius: 4px;
   background-color: #000000;
   transition: all .4s 
   ease;
   cursor: pointer;
   }
   .submitReview:hover {
   background-color: #000;
   }
   .star-display {
   display: flex;
   align-items: center;
   gap: 3px;
   margin-top: 5px;
   }
   .star {
   font-size: 18px;
   color: #ccc; /* Default gray */
   }
   .star.filled {
   color: gold; /* Filled stars */
   }
   .review-count {
   font-size: 14px;
   color: #666;
   margin-left: 5px;
   }
</style>
<div class="ps-page--single">
   <div class="ps-breadcrumb">
      <div class="container">
         <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li>Vendor Store</li>
         </ul>
      </div>
   </div>
   <div class="ps-vendor-store">
      <div class="container">
         <div class="ps-section__container">
            <div class="ps-section__left">
               <div class="ps-block--vendor">
                  <div class="ps-block__thumbnail"><img src="/uploads/buyer/{{$user->photo}}" alt=""></div>
                  <div class="ps-block__container">
                     <div class="ps-block__header">
                        <h6>{{$user->first_name}} {{$user->last_name}}</h6>
                        <h4>{{$user->company_name}}</h4>
                        
                        <div class="star-display">
                            @php
                                
                                $avg = $user->ratings()->avg('star')  ?? 0; // Default to 0 if no ratings
                                $filledStars = floor($avg);
                                $halfStar = ($avg - $filledStars) >= 0.5;
                            @endphp
                            
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $filledStars)
                                        <span class="star filled">&#9733;</span>
                                    @elseif ($halfStar && $i == $filledStars + 1)
                                        <span class="star half">&#9733;</span>
                                    @else
                                        <span class="star">&#9733;</span>
                                    @endif
                                @endfor
                            </div>
                           <span class="review-count">({{ $user->ratings()->count() }} Reviews)</span>
                        </div>
                     </div>
                     <span class="ps-block__divider"></span>
                     <div class="ps-block__content">
                        <p><strong>Address</strong> {{$user->address}}</p>
                     </div>
                     <div class="ps-block__footer">
                        <p>Call us directly<strong>{{$user->telephone_code}} {{$user->telephone_no}}</strong></p>
                        @auth('buyer')
                        <a class="ps-btn  p-3" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#productEnquiryModal"> Request For Quotation</a> 
                        @endauth
                        @guest('buyer')
                        <a class="ps-btn  p-3" href="{{route('buyer.login')}}"> Request For Quotation</a> 
                        @endguest
                     </div>
                  </div>
               </div>
            </div>
            <div class="ps-section__right">
               <div class="ps-block--vendor-filter">
                  <div class="ps-block__left">
                     <ul class="ps-tab-list">
                        <li class="active"><a href="#tab-2">About</a></li>
                        <li><a href="#tab-3">Gallery</a></li>
                        <li><a href="#tab-4">Reviews</a></li>
                     </ul>
                  </div>
                  <div class="ps-block__right">
                     <!--<form class="ps-form--search" action="index.html" method="get">-->
                     <!--   <input class="form-control" type="text" placeholder="Search in this shop">-->
                     <!--   <button><i class="fa fa-search"></i></button>-->
                     <!--</form>-->
                  </div>
               </div>
               <div class="ps-shopping ps-tab-root">
                  <div class="ps-tabs ">
                     <div class="ps-tab active" id="tab-2">
                        <p>
                           {{ $user->description ?? "Not Available" }}
                        </p>
                     </div>
                     <div class="ps-tab bg-light text-center p-5" id="tab-3">
                        <div class="row">
                           <div  class="col-12">
                              <div id="lightgallery">
                                 {{-- Gallery Images --}}
                                 @foreach($user->gallaryImages as $image)
                                     <a href="{{ asset('uploads/buyer/'.$image->image) }}" data-lg-size="1600-2400">
                                        <img src="{{ asset('uploads/buyer/'.$image->image) }}" alt="Gallery Image" style="width: 120px; margin: 5px;">
                                     </a>
                                 @endforeach
                              </div>
                           </div>
                           <div class="col-12">
                              @if($user->youtube_video)
                              <iframe width="879" height="400" src="{{ getYoutubeEmbedUrl($user->youtube_video) }}" 
                                 title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                 referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="ps-tab" id="tab-4">
                         <form action="{{route('customer.save-review')}}" method="post">
                            @csrf
                            <div class="review-form">
                               <h3>Write a Review</h3>
                               <!-- Star Rating -->
                                <input type="hidden" name="product_id" value="{{$user->id}}">
                                <input type="hidden" name="type" value="{{$user->account_type}}">
                                <input type="hidden" name="star" class="product_rating" value="1">
                                <div class="form-group"> 
                                  <a href="javascript:void(0)">
                                    <i class="fas fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="1"></i>
                                    <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="2"></i>
                                    <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="3"></i>
                                    <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="4"></i>
                                    <i class="far fa-star fs-3 rating-star" style="color: #e5c006;" data-star-rate="5"></i>
                                  </a>
                                </div>
    
                               <!-- Textarea -->
                               <textarea id="reviewText" name="review" placeholder="Write your review..." required rows="4"></textarea>
                               <!-- Submit Button -->
                               
                                <!--<button id="submitReview" class="submitReview"  type="submit" @if(!auth()->check()) onclick="return confirm('you have to login first?')" @endif class="p-3">Submit Review</button>-->
                                @if(auth()->guard('buyer')->check())
                                    <button id="submitReview" class="p-3 submitReview" type="submit" >Submit Review</button>
                                @else
                                    <button type="button" onclick="return confirm('You have to login with you account to review.')" class="p-3 submitReview" onclick="window.location.href='{{ route('login') }}'">
                                        Submit Review
                                    </button>
                                @endif
                            </div>
                        </form>
                         {{-- Reviews List --}}
                        <div class="mt-4">
                            <h6 class="fw-bold mb-3">Recent Reviews</h6>
                        
                            @forelse ($user->ratings()->latest()->take(5)->get() as $rating)
                                <div class="border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-start">
                                        {{-- Static Avatar --}}
                                        <div class="flex-shrink-0">
                                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" width="45" height="45" class="rounded-circle border">
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            {{-- Reviewer Name --}}
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="mb-0 fw-semibold">
                                                    {{ $rating->user->first_name  ?? 'Anonymous User' }}
                                                </h6>
                                                <small class="text-muted">{{ $rating->created_at->diffForHumans() }}</small>
                                            </div>
                        
                                            {{-- Star Rating --}}
                                            <div class="mb-1">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="bi {{ $i <= $rating->star ? 'bi-star-fill text-warning' : 'bi-star text-warning' }}"></i>
                                                @endfor
                                            </div>
                        
                                            {{-- Review Text --}}
                                            <p class="mb-0 text-muted">{{ $rating->review }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No reviews yet.</p>
                            @endforelse
                        </div>

                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!--Product Enquiry Modal -->
<div class="modal fade" id="productEnquiryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog model-lg modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Quotation Request</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('customer.rfq-enquiry.store')}}" method="post">
           
            @csrf
            <input type="hidden" value="{{$user->account_type}}" name="receiver_type">
            <input type="hidden" value="{{$user->id}}" name="receiver_id">
            <div class="modal-body">
               <div class="row">
                  <div class="form-group col-md-6">
                     <label for="first_name">First Name</label>
                     <input type="text" class="form-control" name="first_name" id="first_name" value="{{auth()->guard('buyer')->user()->first_name ?? ''}}" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="last_name">Last Name</label>
                     <input type="text" class="form-control" name="last_name" id="last_name" value="{{auth()->guard('buyer')->user()->last_name ?? ''}}" required>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="email">Email</label>
                     <input type="email" class="form-control" name="email" id="email" value="{{auth()->guard('buyer')->user()->email ?? ''}}" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="phone">Phone</label>
                     <input type="number" class="form-control" name="phone" id="phone"  value="{{auth()->guard('buyer')->user()->phone ?? ''}}" required>
                  </div>
                  <div class="form-group col-md-12">
                     <label for="message">Message</label>
                     <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="ps-btn p-2" data-bs-dismiss="modal">Close</button>
               <button class="ps-btn p-2">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/video/lg-video.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       const el = document.getElementById('lightgallery');
       if (el) {
           lightGallery(el, {
               selector: 'a',
               plugins: [lgVideo], // include the thumbnail plugin
               thumbnail: true,
               animateThumb: true,
               showThumbByDefault: true,
               speed: 500
           });
       }
   });
</script>

<script>
    // save reviews
    document.querySelectorAll('.rating-star').forEach((star, index, stars) => {
        star.addEventListener('click', async () => {
            // Get the data-star-rate attribute value
            const starRate = star.dataset.starRate;
            document.querySelector('.product_rating').value = starRate;
    
            // Loop through all stars
            for (let i = 0; i < stars.length; i++) {
                // Toggle the classes based on the clicked star and stars before it
                if (i <= index) {
                    stars[i].classList.remove('far');
                    stars[i].classList.add('fas');
                } else {
                    stars[i].classList.remove('fas');
                    stars[i].classList.add('far');
                }
            }
    
            // console.log('Clicked star with rating:', starRate);
        });
    });

    document.querySelector('.review-form')?.addEventListener('submit', async (event) => {
        event.preventDefault();
        try {
            const formData = new FormData(event.target);
            const response = await axios.post(route('buyer.add-product-review'), formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
    
            const { data: responseData } = response;
            const { status, message, data: messageData } = responseData;
            handleMessage('success', 'Success!', message);
            location.reload();
        } catch (error) {
            console.log(error, error.message);
        }
    });

    // document.querySelectorAll('.rating-star').forEach((stars) => {
//     stars.addEventListener('click', async (star) => {

//         console.log(star.target.dataset.starRate)
//     })

// });
</script>
@endsection