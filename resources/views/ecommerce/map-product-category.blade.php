@extends('user.header')

@section('userContent')

  <div class="content-wrapper" style="min-height: 630px;">

    <div class="container-full">

      <section class="content">

        <div class="row">

          <div class="col-sm-8">

            <div class="box">

              <div class="box-header with-border">

                <h4 class="box-title">Map Category</h4>

              </div>

              <div class="box-body">

                <!-- Tab panes -->

                <form action="{{ route('admin.save-product-category') }}" method="post" id="category">

                  @csrf

                  <input type="hidden" name="sku" value="{{ Request::segment(3) }}" />

                  <div class="tab-content">

                    <div class="tab-pane active" id="home4" role="tabpanel">

                      <div class="col-sm-12">

                        <div class="row grey-bg-clr">

                          <h5 class="mb-0">Map Category</h5>

                          <div class="col-md-12">

                            <hr>

                          </div>

                          <div class="clearfix"></div>

                          <div class="col-md-4">

                            <div class="form-group">

                              <label class="form-label">Product Category *</label>

                              <select data-type='sub-category' class="custom-select category"

                                data-placeholder="Type to search categories" name="category[]" required

                                onchange="getMoreCategories(this)">

                                <option value="">Select *</option>

                                @foreach ($categories as $category)

                                  <option

                                    @if (old('category') != null) @if (in_array($category->id, old('category'))) selected @endif

                                    @endif value="{{ $category->id }}">

                                    {{ $category->category_name }}</option>

                                @endforeach

                              </select>

                            </div>

                          </div>

                          <div class="sub-categories col-md-4"></div>

                          <div class="sub-sub-categories col-md-4"></div>



                          <div class="col-md-4">

                            <div class="checkbox">

                              <input type="checkbox" value="1" name="is_extra_cat" id="isExtraCat">

                              <label for="isExtraCat">Is extra cat?</label>

                            </div>

                          </div>



                          <div class="row mt-20">

                            <hr>

                            <div class="col-md-12 pull-right">

                              <div class="clearfix">

                                <button type="submit" class="waves-effect waves-light btn btn-dark mb-5 category"><i

                                    class="fa fa-check"></i> Save</button>

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </form>

              </div>

            </div>

            <!-- /.box -->

          </div>

        </div>

      </section>

    </div>

  </div>

  <script>

    async function getMoreCategories(e) {

      let category_id = +e.value;

      let type = e.dataset.type;

      let setType;



      if (type === 'sub-category') {

        document.querySelector('.sub-categories').innerHTML = '';

        document.querySelector('.sub-sub-categories').innerHTML = '';

        setType = 'sub-sub-category';

      }



      let response = await fetch(route('get-categories-filters-and-product-types', {

        category_id

      }));

      response = await response.json();



      let optionsTemplate = ``;



      response.data.categories.forEach(category => {

        optionsTemplate += `<option value="${ category.id }">${ category.category_name }</option>`;

      });



      let categoryTemplate = ``;

      if (response.data.categories.length > 0) {

        categoryTemplate = `

          <div class="form-group">

            <label class="form-label">Product ${ type }</label>

            <select data-type="${ setType }" class="form-select" id="intType3" name="category[]"

              onchange="getMoreCategories(this)">

              <option value="">Select</option>

              ${optionsTemplate}

            </select>

          </div>

          `;

      }

      if (type === 'sub-category') {

        document.querySelector('.sub-categories').innerHTML = categoryTemplate;

      }

      if (type === 'sub-sub-category') {

        document.querySelector('.sub-sub-categories').innerHTML = categoryTemplate;

      }

      $('.custom-select, .form-select').select2({

        width: '100%',

        dropdownCssClass: "max-z-index",

        allowClear: true,

        placeholder: 'Select',

      });

    }

  </script>

@endsection

