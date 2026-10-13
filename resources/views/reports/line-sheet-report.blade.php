@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">

              <div class="box-header">
                <h4 class="box-title">Line Sheet Report</h4>
              </div>

              <div class="box-body">


                <span class="admin-filter" style="display:none">Filter Tab</span>

                <div class=" mb30 account-filters">
                  <form method="get" action="{{ route('admin.line-sheet-report') }}">
                    <input type="hidden" name="date_from" value="{{ Request('date_from') }}" />
                    <input type="hidden" name="date_till" value="{{ Request('date_till') }}" />
                    <div class="row">
                      <div class="col-sm-12 col-md-auto mb-3">
                        <label class="form-label fw-500 fs-14">Sheet Date From/Till</label>
                        <div id="reportrange"
                          style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;border-radius: 5px; width: 100%">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                      </div>
                    </div>
                    <button class="waves-effect waves-light btn btn-rounded btn-primary-light">Apply <i
                        class="fa fa-filter"></i></button>
                    <a href="{{ route('admin.line-sheet-report') }}"
                      class="waves-effect waves-light btn btn-rounded btn-info-light">Reset <i
                        class="fa fa-refresh"></i></a>
                    <button type="submit" name="report_type" value="excel"
                      class="waves-effect waves-light btn btn-rounded btn-success-light">Download
                      Report <i class="fa fa-download"></i></button>
                  </form>
                </div>

                <div id="table-scroll" class="table-scroll">
                  <table id="main-table" class="main-table">
                    <thead class="bg-success-light">
                      <tr>
                        <th style="width:10%">Type</th>
                        <th>Seller</th>
                        <th>Uploaded By</th>
                        <th>Uploaded At</th>
                        <th width="10%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($lineSheets as $key => $sheet)
                        <tr role="row">
                          <th>
                            {{ Str::title(str_replace('_', ' ', $sheet->type)) }}
                          </th>
                          <td>
                            {{ $sheet->seller }}
                          </td>
                          <td>
                            <span>Name: {{ $sheet?->user?->name }}</span><br />
                            <span>Email: {{ $sheet?->user?->email }}</span><br />
                          </td>
                          <td>
                            {{ $sheet->created_at->format('d M, Y h:i A') }}
                          </td>
                          <td>
                            <a class="btn btn-sm btn-success-light"
                              href="{{ asset('uploads/merchant/') . '/' . $sheet->file }}">Download <i
                                class="fa fa-download"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row mx-2">
                {{ $lineSheets->links() }}
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
