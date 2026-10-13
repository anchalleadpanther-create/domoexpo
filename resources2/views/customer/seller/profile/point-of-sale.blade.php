@extends('customer.partials-fn.seller.header')
@section('content')
<!-- Main Container -->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-lg-7 offset-lg-2">
         <div class="ps-section__right">
            <div class="ps-form__header mb-5">
               <h2>Point Of Sales</h2>
               <p>Here’s a guide to get started. As your business grows, you’ll get fresh tips and insights here.</p>
            </div>
            
            <!-- -------------------------------------------------------------------------------------------------------------
             -----------------------------------------------------------------------------------------------------------------
             -------------------------------------------------------------------------------------------------------------- -->

            <div class="ps-my-account point-of-sale_step-">
                  <div class="ps-form--account ps-tab-root ps-form--account-width" >
                     <div id="main">
                        
                        <div id="div7"  class="first {{ Request::segment(3) == 'geographical-scope' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"> 
                                       </div>
                                    </div>
                                    <input class="form-control" name="supplier_id"  value="{{ auth()->guard('vendor')->user()->id }}" type="hidden" placeholder="">
                                    <form class="ActiveForm" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       @method('patch')
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <h4 class="mb-4 login_heading">Where will you be selling?</h4>
                                          </div>

                                          <div class="col-sm-6">
                                             <div class="row">
                                                   <div class="col-12 col-sm-6">
                                                      <div class="form-group mb-0">
                                                         <input class="" type="radio" id="services2-1" name="selling_scope" value="Multiple Countries" checked />
                                                         <label for="services2-1">Multiple Countries</label>
                                                      </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                         <div class="form-group mb-0">
                                                            <input class="" type="radio" id="services2-2" name="selling_scope" value="Single Country" />
                                                            <label for="services2-1">Single Country</label>
                                                         </div>
                                                   </div>
                                             </div>
                                          </div>

                                          <div class="col-sm-12 hideIfLocalSelected">
                                             <div class="form-group mb-2">
                                                   <label class="mb-0 mt-4">Select countries </label>
                                             </div>
                                          </div>

                                          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 hideIfLocalSelected">
                                                <div class="form-group mb-4 search_box">
                                                   <input type="text" id="countryInput" placeholder="Enter or search country name" class="form-control">
                                                   <i class="fa fa-search"></i>
                                                </div>
                                             
                                                <div class="form-group mb-4 search_input" id="tagsContainer">
                                                   <input type="hidden" name="country[]" value="">
                                                   @if(!empty($user->suppllierCountries))
                                                      @foreach($user->suppllierCountries as $value)
                                                         <div class="tag"><input type="hidden" name="country[]" value="{{$value->id}}"><span>{{$value->name}}</span><i class="fa fa-close" aria-hidden="true" onclick="removeAddedCountry(this,'{{$user->id}}','{{$value->id}}')"></i></div>
                                                      @endforeach
                                                   @endif
                                                   
                                                </div>
                                          </div>
                                          
                                          
                                          
                                          <div class="col-sm-12 hideIfMultipleSelected">
                                             <div class="form-group mb-2">
                                                    <label class="mb-0 mt-4">Select country </label>
                                                    <select name="client_country" name="country[]" class="form-select" onchange="getCitiesByCountry(this)" data-class=".cities"  >
                                                       <option value="">select</option>
                                                       @foreach (getCountries() as $value)
                                                          <option value="{{$value->id}}">{{ $value->name }}</option>
                                                       @endforeach
                                                    </select>
                                             </div>
                                          </div>
                                          
                                          <div class="col-sm-12 hideIfMultipleSelected">
                                             <div class="form-group mb-2">
                                                    <label class="mb-0 mt-4">Select Cities </label>
                                                    <select name="selling_city[]" class="form-select cities" multiple >
                                                       <option value="">select</option>
                                                    </select>
                                             </div>
                                          </div>
                                          
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div8"  class="{{ Request::segment(3) == 'like-to-sell' ? 'current' : '' }}"  style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                    <input class="form-control" name="supplier_id"  value="{{ auth()->guard('vendor')->user()->id }}" type="hidden" placeholder="">
                                    <form class="ActiveForm" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       @method('patch')
                                       <input  id="is_last_div" name="is_last_div" value="1"  type="hidden" required />

                                       <div class="row">
                                          <div class="col-sm-12">
                                             <h4 class="mb-4 login_heading">Select Products or Categories your business provides </h4>
                                          </div>

                                          <div class="col-sm-12">
                                             <div class="row">
                                                @foreach($describeBusinessValues as $key =>  $describeValue)
                                                   @if ($describeValue->displayflag == 1)
                                                   <div class="form-group mb-1 col-12 col-sm-6">
                                                      <div class="ps-checkbox ">
                                                         <input class="form-control" type="checkbox" id="services{{$key+1}}"  value="{{$describeValue->id}}" name="describe_seller[]" 
                                                         {{in_array($describeValue->id,array_column($user->suppllierDescribedSeller->toArray(), 'id')) ? "checked"  :""}} />
                                                         <label for="services{{$key+1}}"> {{$describeValue->dropdown_value}}</label>
                                                      </div>
                                                   </div>
                                                   @endif
                                                @endforeach
                                             </div>
                                          </div>

                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div id="div11"  class="last {{ Request::segment(3) == 'seller-categories' ? 'current' : '' }}" style="display: none;">
                           <div class="ps-tabs">
                              <div class="ps-tab active"  >
                                 <div class="ps-form__content">
                                     
                                    <div class="progress mb-5">
                                       <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> 
                                       </div>
                                    </div>
                                   <form class="" action="{{route('seller.profile-update',[auth()->guard('vendor')->user()->id])}}" method="post"  enctype="multipart/form-data">
                                       @csrf 
                                       <input  id="is_last_div" name="is_last_div" value="1"  type="hidden" required />

                                       <div class="row">
                                          <!--<div class="col-sm-12">-->
                                          <!--   <h4 class="mb-4 login_heading">Bank Account (Seller’s) Details</h4>-->
                                          <!--</div>-->
                                          
                                           <div class="col-sm-12">
                                             <div class="form-group mb-4">
                                                    <label class="mb-2">Select Type</label>
                                                    <select class="form-select " name="category_type" id="category_type" onchange="getCategoriesByItsType(this)" required>
                                                        <option value="Product">Product</option>
                                                        <option value="Service">Service</option>
                                                    </select>
                                             </div>
                                            </div>
                                          
                                          <div class="col-sm-12">
                                            <div class="form-group mb-4">
                                                    <label class="mb-2">Select Category</label>
                                                    <select class="form-control category category-select bordered" name="category[]" onchange="getMoreCategories(this)" data-type='sub-category' required>
                                                        <option value="">Select a category</option> <!-- Default optional value -->
                                                        @foreach (getCategories() as $category)
                                                            <option value="{{ $category->id }}" >
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                             </div>
                                            </div>
                                          </div>   
                                          
                                        <div class="row sub-categories"></div> 
                                        <div class="row sub-sub-categories"></div> 
                                        <div class="row sub-sub-sub-categories"></div> 
                                        <div class="row sub-sub-sub-sub-categories"></div> 
                                        
                                    </form>
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                             <h4 class="mb-4 login_heading">Seller Categories</h4>
                                        </div>
                                      <div class="col-sm-12">
                                         <div class="table-responsive"> 
                                        <table class="table table-striped">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Category Type</th>
                                              <th scope="col">Categories</th>
                                              <th scope="col">Action</th>
                                            </tr>
                                          </thead>
                                          <tbody id="categoryTableBody">
                                             @foreach($user->mappedCategories as $key => $value)
                                                    <tr>
                                                      <th scope="row">#{{ $key + 1 }}</th>
                                                      <td>{{$value->category_type}}</td>
                                                      <td>
                                                          @if($value->category_type == "Service")
                                                              @isset($value->serviceCategory->parent->parent)
                                                                {{ $value->serviceCategory->parent->parent->category_name }},
                                                              @endisset
                                                              @isset($value->serviceCategory->parent)
                                                                {{ $value->serviceCategory->parent->category_name }},
                                                              @endisset
                                                              @isset($value->serviceCategory->category_name)
                                                                {{ $value->serviceCategory->category_name }},
                                                              @endisset
                                                          @else
                                                              @isset($value->category->parent->parent)
                                                                {{ $value->category->parent->parent->category_name }},
                                                              @endisset
                                                              @isset($value->category->parent)
                                                                {{ $value->category->parent->category_name }},
                                                              @endisset
                                                              @isset($value->category->category_name)
                                                                {{ $value->category->category_name }},
                                                              @endisset
                                                          @endif

                                                        </td>
                                                      <td>
                                                          <a class="btn btn-danger" onclick="deleteSellerCategoryTableData({{$value->id}})" href="javascript:void(2)">Delete</a>
                                                      </td>
                                                    </tr>
                                             @endforeach
                                          </tbody>
                                        </table>
                                        </div>
                                      </div>
                                    </div>
                                   

                                 </div>
                              </div>
                           </div>
                        </div>
                    
                      </div> 
                     <div class="form-group submtit mb-0 gap-mt50 text-right col-sm-12 p-0">
                        <button class="ps-btn ps-btn--sm blue-bg prevBtn" id="prev" style="display:none;">Prev</button>
                        <button class="ps-btn ps-btn--sm blue-bg saveFormBtn" id="next">Save & Next</button>
                     </div>
                  </div>
            </div>



             <!-- -----------------------------------------------------------------------------------------------------------
              --------------------------------------------------------------------------------------------------------------
              ------------------------------------------------------------------------------------------------------------- -->

         </div>
      </div>
   </div>
</div>
<!-- Main Container -->

<script type="module" src="{{asset('allUsers/customer/seller-company-profile.js')}}"></script>


<script>

    function getCategoriesByItsType(e) {
        // Reset the select2 dropdown to null (no selected values)
        $('.category-select').val(null).trigger('change');
    
        // Clear the inner HTML of the sub-category elements
        document.querySelector('.sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-categories').innerHTML = '';
        document.querySelector('.sub-sub-sub-categories').innerHTML = '';
    
        let category_type = e.value; // Assuming e.value is the correct category type
        let categories = [];
    
        // Fetch categories based on category type
        if (category_type === 'Service') {
            categories = {!! json_encode(getServiceCategories()) !!}; // Convert to JS array
        } else {
            categories = {!! json_encode(getCategories()) !!}; // Convert to JS array
        }
    
        // Get the target select element where options will be replaced
        let categorySelect = $('select[name="category[]"]'); // Use quotes for the name attribute
    
        // Clear existing options
        categorySelect.empty(); // Use jQuery to clear existing options
    
        // Add an empty option
        categorySelect.append(new Option('Select a category', '', true, true)); // Add default option
    
        // Create new options and append to the category select element
        categories.forEach(function(category) {
            const newItem = new Option(category.category_name, category.id); // Create a new option
            categorySelect.append(newItem); // Append the new option
        });
        // Update the select2 UI
        categorySelect.trigger('change'); // Trigger change event to update select2
    }
    
    
    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getSellerCategoryTable(userId = null) {
        
        $.ajax({
            url: route('seller.get-seller-category-table-html'),
            type: 'GET',
            data: {
                user_id: userId  // Pass the user ID as part of the data
            },
            dataType: 'json',
            success: function(response) {
                // Assuming you have a <div id="categoryTable"></div> in your HTML
                $('#categoryTableBody').html(response.html);
                
            }
        });
    }
    
    function deleteSellerCategoryTableData(row_id) {
        if(confirm('Are you want to delete?')){
            $.ajax({
                url: route('seller.delete-seller-category-table-data',{ row_id: row_id }),
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    getSellerCategoryTable()
                }
            });
        } 
    }



    // this function gets and sets categories, brands, filters and options dynamically to the front end.
    function getMoreCategories(e) {
      
      let category_id = +e.value;
      let type = e.dataset.type;
      let category_type = $('#category_type').val();
      
    //   console.log(type);
    
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
      if(category_id == null || category_id == ''){
         return; 
      }
         
      $.ajax({
        async: false,
        method: "get",
        url: route('get-categories-filters-and-product-types'),
        data: {
          category_type,
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
            categoryTemplate = `
                <div class="col-lg-12 col-sm-12">
                 <div class="form-group mb-4">
                    <label class="mb-2">${ type }</label>
                        <select class="form-control sub-category" name="category[]" data-type='${ setType }' onchange="getMoreCategories(this)" required>
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

</script>


<script>
  async function removeAddedCountry(e,sellerId,countryId){
      
      
      let response = await fetch(`${route('deleteSupplierMapCountry', {sellerId,countryId})}`);
      //  let response = await fetch(`${route('getStates', countryId)}`);
      let parentElement = e.parentNode;
      if (parentElement) {
            parentElement.parentNode.removeChild(parentElement);
      }
       console.log(response);
    }
    
    
   document.addEventListener('DOMContentLoaded', function() {
       getSellerCategoryTable()
       
    const countries = @json(getCountries());
    const input = document.getElementById('countryInput');
    const tagsContainer = document.getElementById('tagsContainer');

    input.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const filteredCountries = countries.filter(country => country.name.toLowerCase().includes(query));
        showAutocompleteSuggestions(filteredCountries);
    });

    input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            const query = this.value.toLowerCase();
            const matchingCountry = countries.find(country => country.name.toLowerCase() === query);
            if (matchingCountry) {
                addTag(matchingCountry.id,matchingCountry.name);
                this.value = '';
                removeAutocompleteSuggestions();
            }
        }
    });

    function showAutocompleteSuggestions(filteredCountries) {
        removeAutocompleteSuggestions();
        const autocompleteItems = document.createElement('div');
        autocompleteItems.setAttribute('class', 'autocomplete-items');
        input.parentNode.appendChild(autocompleteItems);
        filteredCountries.forEach(country => {
            const item = document.createElement('div');
            item.innerHTML = country.name;
            item.addEventListener('click', function() {
                addTag(country.id,country.name);
                input.value = '';
                removeAutocompleteSuggestions();
            });
            autocompleteItems.appendChild(item);
        });
    }

    function removeAutocompleteSuggestions() {
        const autocompleteItems = document.querySelector('.autocomplete-items');
        if (autocompleteItems) {
            autocompleteItems.parentNode.removeChild(autocompleteItems);
        }
    }

    function addTag(id,name) {
        const tag = document.createElement('div');
        tag.classList.add('tag');
        
        const inputField = document.createElement('input');
        inputField.type = 'hidden';
        inputField.name = 'country[]';
        inputField.value = id;
        
        const tagName = document.createElement('span');
        tagName.textContent = name;
        
        const closeIcon = document.createElement('i');
        closeIcon.classList.add('fa', 'fa-close');
        closeIcon.addEventListener('click', function() {
            tag.parentNode.removeChild(tag);
        });
        
        tag.appendChild(inputField);
        tag.appendChild(tagName);
        tag.appendChild(closeIcon);
        tagsContainer.appendChild(tag);
    }

    

    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !tagsContainer.contains(e.target)) {
            removeAutocompleteSuggestions();
        }
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const globalRadio = document.getElementById('services2-1');
        const localRadio = document.getElementById('services2-2');
        const hideIfLocalSelected = document.querySelectorAll('.hideIfLocalSelected');
        const hideIfMultipleSelected = document.querySelectorAll('.hideIfMultipleSelected');
        
        function toggleVisibility() {
            if (localRadio.checked) {
                hideIfLocalSelected.forEach(function(element) { 
                    element.style.display = 'none';
                });
                hideIfMultipleSelected.forEach(function(element) { 
                    element.style.display = 'block';
                });
            } else if (globalRadio.checked) {
                hideIfLocalSelected.forEach(function(element) {
                    element.style.display = 'block';
                });
                hideIfMultipleSelected.forEach(function(element) { 
                    element.style.display = 'none';
                });
            }
        }
        globalRadio.addEventListener('change', toggleVisibility);
        localRadio.addEventListener('change', toggleVisibility);

        // Initial check on page load
        toggleVisibility();
    });
</script>



<script>

   $(document).ready(function(){
      const $current = $('.current'); 
      // Remove 'ActiveForm' class from all forms
      $('form').removeClass('ActiveForm'); 
      // Add 'ActiveForm' class to the form within the current element
      $current.find('form').addClass('ActiveForm');
      // Ensure the current element is visible
      $current.show(); 
      // Check if the current element has the 'last' class
      if ($current.hasClass('last')) {
         $('#next').text('Save'); // Change button text to 'Save'
         return; // Exit the function
      }
   });


   function next() {
      const $current = $('.current'); 
      $('form').removeClass('ActiveForm'); 

      const $next = $current.next(); 
      $current.removeClass('current').hide(); 

      // Check if the next form has the 'last' class
      if ($next.hasClass('last')) {
         $next.show().addClass('current'); 
         $('#next').text('Save'); 
         $next.find('form').addClass('ActiveForm'); 
         return; // Exit the function
      }
      

      // Normal flow for non-last forms
      $next.show().addClass('current'); 
      $('#next').text('Save & Next'); 
      $next.find('form').addClass('ActiveForm');

      // Update navigation steps
      $('.current1').removeClass('current1 active').next().addClass('active current1');
      $("li.current1").prevAll().find('span').addClass('active1'); 
      $('#prev').show(); 
   }

  function prev() {
    const $current = $('.current');
    $('form').removeClass('ActiveForm'); // Remove 'ActiveForm' class from all forms
    const $prev = $current.removeClass('current').hide().prev().show().addClass('current'); // Move to the previous form

    $('#next').text('Save & Next').show(); // Reset 'next' button text
    $('.current1').removeClass('current1 active').prev().addClass('active current1'); // Update navigation steps
    $("li.current1").find('span').removeClass('active1'); // Remove highlight from current step

    $prev.find('form').addClass('ActiveForm'); // Add 'ActiveForm' class to the previous form

    if ($prev.hasClass('first')) {
      $('#prev').hide(); // Hide 'prev' button if on the first form
    } else {
      $('#prev').show(); // Show 'prev' button otherwise
    }
  }

   // Attach the function to the 'prev' button click event
   //   $('#prev').click(function() {
   //     prev();
   //   });

   //   // Attach the function to the 'next' button click event
   //   $('#next').click(function() {
   //     next();
   //   });
</script>

@endsection