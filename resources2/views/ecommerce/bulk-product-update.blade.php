@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Bulk update</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Product</li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{ route('admin.category.index', 0) }}">Bulk product update</a>
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <div class="pull-right col-sm-12 col-md-12">
                  <div class="row">
                    <div class="col-md-8 offset-md-2 d-flex justify-content-center">
                      <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_komemhfl.json"
                        background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay>
                      </lottie-player>
                    </div>
                    <div class="col-md-8 offset-md-2 mx-auto">
                      <form method="post" action="{{ route('admin.products.bulk-product-update') }}"
                        enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        <div class="mb-3 input-group">
                          <input class="form-control" type="file" id="formFile" accept=".xlx, .xlsx"
                            name="excelSheet">
                          <button class="btn btn-success" id="button-addon1">Upload <i class="fa fa-upload"
                              aria-hidden="true"></i></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
