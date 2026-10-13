@extends('customer.partials-fn.seller.header')
@section('content')

<style>
    #heading {
        text-transform: uppercase;
        color: #673AB7;
        font-weight: normal
    }

    #msform {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .form-card {
        text-align: left
    }

    #msform fieldset:not(:first-of-type) {
        display: none
    }



    #msform .action-button {
        width: 100px;
        background: #673AB7;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 0px 10px 5px;
        float: right
    }

    #msform .action-button:hover,
    #msform .action-button:focus {
        background-color: #311B92
    }

    #msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px 10px 0px;
        float: right
    }

    #msform .action-button-previous:hover,
    #msform .action-button-previous:focus {
        background-color: #000000
    }

    .card {
        z-index: 0;
        border: none;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #673AB7;
        margin-bottom: 15px;
        font-weight: normal;
        text-align: left
    }

    .purple-text {
        color: #673AB7;
        font-weight: normal
    }

    .steps {
        font-size: 25px;
        color: gray;
        margin-bottom: 10px;
        font-weight: normal;
        text-align: right
    }

    .fieldlabels {
        color: gray;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #673AB7
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #account:before {
        font-family: FontAwesome;
        content: "\f13e"
    }

    #progressbar #personal:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar #payment:before {
        font-family: FontAwesome;
        content: "\f030"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #673AB7
    }

    .progress {
        height: 10px
    }

    .progress-bar {
        background-color: #673AB7
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }
</style>
<!-- Main Container -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7 offset-lg-2">
            <div class="ps-section__right">
                <div class="ps-form__header mb-5">
                    <h2> Get ready to sell</h2>
                    <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.
                    </p>
                </div>
                <!--PEN CONTENT  -->
                <div class="content">
                    <!--content inner-->
                    <div class="content__inner">

                        <div class="container-fluid ">
                            <!--multisteps-form-->
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-10 col-md-10 col-lg-12 col-xl-12 text-center p-0 mt-3 mb-2">
                                    <div class="card px-0 pt-4 pb-0 mt-3 mb-3">

                                        <form id="msform" action="{{ route('seller.services.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="seller_id" id=""
                                                value="{{auth()->guard('vendor')->user()->id}}">
                                            <div class="progress mx-auto" style="width:95%">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div> <br> <!-- fieldsets -->
                                            <!-- Choose Category FielsSets -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Choose Category</h4>
                                                        </div>
                                                        <div class="col-5">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Root Category:</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <select class="form-control category" name="category[]"
                                                                    data-type='sub-category'
                                                                    onchange="getMoreServiceCategories(this)" required>
                                                                    <option value="">Select category</option>
                                                                    @foreach (getServiceCategories() as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{$category->category_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row sub-categories"></div>
                                                    <div class="row sub-sub-categories"></div>
                                                    <div class="row sub-sub-sub-categories"></div>
                                                    <div class="row sub-sub-sub-sub-categories"></div>
                                                </div>
                                                <input type="button" name="next"
                                                    class="next action-button ps-btn--sm blue-bg res-w100"
                                                    value="Next" />
                                            </fieldset>

                                            <!-- Product Basic Detail FielsSets -->
                                            <fieldset class="col-sm-12">
                                                <div class="form-card">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-7">
                                                            <h4 class="mb-4 login_heading">Create Services Detail </h4>
                                                        </div>
                                                        <div class="col-5">
                                                            <h2 class="steps"></h2>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Service Title:*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="form-control" name="title"
                                                                    value="{{ old('title') }}"
                                                                    placeholder="Service Title" required
                                                                    maxlength="200">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Full Service Description
                                                                    :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <textarea class="form-control"
                                                                    name="description"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Includes :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input type="text" class="form-control" name="includes"
                                                                    value="{{ old('includes') }}" placeholder="Includes"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Excludes :*</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input type="text" class="form-control" name="excludes"
                                                                    value="{{ old('excludes') }}" placeholder="Excludes"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-0">Services image (upto 6)</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                                            <div class="form-group mb-4">
                                                                <input class="product-images" type="file"
                                                                    name="service_images[]"
                                                                    accept="image/jpeg, image/jpg" multiple>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                                            <div class="form-group mb-2">
                                                                <label class="mb-0 mt-4">Service Labels :</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12 ">
                                                            <div class="row">
                                                                @if(getDropdowns("Service Labels")->displayflag == 1)
                                                                @foreach (getDropdowns("Service Labels")->dropdownValues
                                                                as $value)
                                                                @if($value->displayflag == 1)
                                                                <div class="col-sm-4">
                                                                    <div class="form-group mb-3 mt-3">
                                                                        <div class="ps-checkbox  ">
                                                                            <input class="form-control" type="checkbox"
                                                                                value="{{$value->id}}"
                                                                                id="services{{$value->dropdown_value}}"
                                                                                name="service_label[]">
                                                                            <label
                                                                                for="services{{$value->dropdown_value}}">{{$value->dropdown_value}}</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <input type="submit" name="Submit"
                                                    class=" action-button ps-btn--sm blue-bg res-w100" value="Submit" />
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous ps-btn--sm blue-bg res-w100 "
                                                    value="Previous" />

                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Container -->

<!-- <script src="js/main.js"></script> -->

<script>
    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getMoreServiceCategories(e) {
      let category_id = +e.value;
      let type = e.dataset.type;
      let setType;
      let mappedBrandTemplate = '';
      let brandTemplate = '';
      let parent_category_id = document.querySelector('.category').value;
      if (type === 'sub-category') {
        document.querySelector('.sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-category';
      }
      if (type === 'sub-sub-category') {
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-category';
      }
      if (type === 'sub-sub-sub-category') {
        document.querySelector('.sub-sub-sub-sub-categories').innerHTML = '';
        setType = 'sub-sub-sub-sub-category';
      }
      $.ajax({
        async: false,
        method: "get",
        url: route('get-service-categories-filters-and-product-types'),
        data: {
          category_id,
          parent_category_id
        },
        dataType: 'json',
        success: function(data) {
          let optionsTemplate = ``;

          data.data.categories.forEach(category => {
            optionsTemplate += `
                <option value="${ category.id }">${ category.category_name }</option>
              `;
          });

          let categoryTemplate = ``;
          if (data.data.categories.length > 0) {
            categoryTemplate = `<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 ">
                                        <div class="form-group mb-2">
                                            <label class="mb-0 mt-4"> ${ type }:</label>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12 ">
                                        <div class="form-group mb-4">
                                            <select class="form-control" name="category[]" data-type="${ setType }"  onchange="getMoreServiceCategories(this)" >
                                                <option value="">Select category</option>
                                                ${optionsTemplate}
                                            </select>
                                         </div>
                                    </div>`;

          }
          if (type === 'sub-category') {
            document.querySelector('.sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-category') {
            document.querySelector('.sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
          if (type === 'sub-sub-sub-sub-category') {
            document.querySelector('.sub-sub-sub-sub-categories').innerHTML = categoryTemplate;
          }
        }

      }); 

    }



    function calculateDiscount(e) {
        // Get the price input field
        let priceInput = e.closest('.row').querySelector('input[name="rrp[]"]');
        let price = parseFloat(priceInput.value) || 0;

        // Get the discount input field
        let discountInput = e.closest('.row').querySelector('input[name="discount[]"]');
        let discount = parseFloat(discountInput.value) || 0;

        // Limit the discount value to 100%
        if (discount > 100) {
            discount = 100;
            discountInput.value = 100;
        }

        // Calculate the discounted amount
        let discountedAmount = price - (price * discount / 100);

        // Update the unit price field
        let discountedPriceInput = e.closest('.row').querySelector('input[name="price_unit[]"]');
        discountedPriceInput.value = discountedAmount.toFixed(2);
    }


    function calculateGST(e) {
    // Get the last RRP input value
    let rrps = document.querySelectorAll('input[name="rrp[]"]');
    let lastRrp = parseFloat(rrps[rrps.length - 1].value) || 0;

    // Get the GST percentage input field value
    let gstInput = document.querySelector('input[name="gst"]');
    let gstPercentage = parseFloat(gstInput.value) || 0;

    // Calculate the GST amount based on the last RRP input value
    let gstAmount = (gstPercentage / 100) * lastRrp;

    // Get the amount input field (the one to the right of the GST input)
    let amountInput = gstInput.closest('.row').querySelector('input[readonly]');

    // Set the calculated amount in the readonly input
    amountInput.value = gstAmount.toFixed(2);
}




</script>

<script>
    $(document).ready(function() {

    var current_fs, next_fs, previous_fs; // Fieldsets
    var opacity;
    var current = 1; // Current step
    var steps = $("fieldset").length; // Total number of steps

    // Initialize the progress bar
    setProgressBar(current);

    // Next button click handler
    $(".next").click(function() {

        current_fs = $(this).parent(); // Current fieldset
        next_fs = $(this).parent().next(); // Next fieldset

        // Show the next fieldset
        next_fs.show();

        // Hide the current fieldset with a fade-out effect
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });

        // Update the progress bar
        setProgressBar(++current);
    });

    // Previous button click handler
    $(".previous").click(function() {

        current_fs = $(this).parent(); // Current fieldset
        previous_fs = $(this).parent().prev(); // Previous fieldset

        // Show the previous fieldset
        previous_fs.show();

        // Hide the current fieldset with a fade-out effect
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });

        // Update the progress bar
        setProgressBar(--current);
    });

    // Function to update the progress bar
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    // Prevent form submission for demo purposes
    $(".submit").click(function() {
        return false;
    });

});

</script>


@endsection