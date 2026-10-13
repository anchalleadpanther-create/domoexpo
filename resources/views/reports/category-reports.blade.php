@extends('user.header')
@section('userContent')
  

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Brand Report</h4>
                <form method="get" action="{{ route('admin.brands-report') }}">
                  <div class="row mt-20">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Product Category *</label>
                        <select data-class='sub-category' class="form-select category"
                          data-placeholder="Type to search categories" name="category[]" required
                          onchange="getProductCategories(this)">
                          <option value="">Select *</option>
                          @foreach (getCategories() as $category)
                            <option @if (old('category') != null) @if (in_array($category->id, old('category'))) selected @endif
                              @endif value="{{ $category->id }}">
                              {{ $category->category_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Order Date From</label>
                        <input class="form-control" type="date" placeholder="Date From" name="date_from"
                          max="{{ date('Y-m-d', strtotime('-1 day', strtotime(now()))) }}"
                          value="{{ Request('date_from') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Order Date Till</label>
                        <input class="form-control" type="date" placeholder="Date Till" name="date_till"
                          value="{{ Request('date_till') !== null ? Request('date_till') : date('Y-m-d') }}" required
                          max="{{ date('Y-m-d') }}">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Order Country</label>
                        <select class="single order-country" data-placeholder="Search countries" name="country"
                          onchange="getStates(this)" data-class=".order-state">
                          <option value="">Select</option>
                          @foreach (getCountries() as $country)
                            <option @if (Request('country') == $country->id) selected @endif value="{{ $country->id }}">
                              {{ $country->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Order State</label>
                        <select class="single order-state" name="state" onchange="getCities(this)"
                          data-class=".order-city">
                          <option value=""> Select </option>
                          @foreach (getStates(Request('country')) as $state)
                            <option @if (Request('state') == $state->id) selected @endif value="{{ $state->id }}">
                              {{ $state->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="form-label">Order City</label>
                        <select class="single order-city" name="city">
                          <option value=""> Select </option>
                          @foreach (getCities(Request('state')) as $city)
                            <option @if (Request('city') == $city->id) selected @endif value="{{ $city->id }}">
                              {{ $city->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary">Apply <i class="fa fa-filter"></i></button>
                  <a href="{{ route('admin.brands-report') }}" class="btn btn-secondary">Reset <i
                      class="fa fa-refresh"></i></a>
                  <button type="submit" name="report_type" value="excel" class="btn btn-success">Download
                    Report <i class="fa fa-download"></i></button>
              </div>
              </form>
              <div class="box-body">

                <div class="table-responsive">

                  <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                      <div class="col-sm-12 col-md-6"></div>
                      <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <table id="example2" class="table table-lg invoice-archive tr-odd_clr dataTable no-footer"
                          role="grid" aria-describedby="example2_info">
                          <thead>
                            <tr role="row">
                              <th width="2%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-sort="ascending"
                                aria-label="Sl#: activate to sort column descending">
                                Sl#
                              </th>

                              <th width="12%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                colspan="1" aria-label="buyer Address">CID
                              </th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-label="Auth Representative">Category Name</th>

                              <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-label="Registration">Orders
                              </th>

                              <th width="10%" class="sorting" tabindex="0" aria-controls="example2"
                                rowspan="1" colspan="1" aria-label="KYC">Total Sales</th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($categories as $key => $category)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ ++$key }}
                                </td>
                                <td align="left">
                                  {{ ucfirst($category->id) }}
                                </td>
                                <td align="left">
                                  {{ ucfirst($category->category_name) }}
                                </td>
                                <td align="left">
                                  @foreach ($categoriesOrderInfo as $orderInfo)
                                    @if ($orderInfo['categoryId'] === $category->id)
                                      {{ $orderInfo['productOrdersCount'] }}
                                    @endif
                                  @endforeach
                                </td>
                                <td align="left">
                                  @foreach ($categoriesOrderInfo as $orderInfo)
                                    @if ($orderInfo['categoryId'] === $category->id)
                                      INR {{ number_format($orderInfo['ordersTotalSum'], 2) }}
                                    @endif
                                  @endforeach
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{ $categories->links() }}
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('allUsers/user/report.js') }}"></script>
@endsection
