@extends('vendors.header')
@section('vendorContent')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
        <div class="row justify-content-center mb-4">
          <div class="col-md-6 text-center">
            <a href="{{ route('vendor.boq-projects-for-documents') }}" class="btn btn-success">BOQ Project Documents</a>
          </div>
        </div>
        <div class="row justify-content-center">
          <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qpsnmykx.json" background="transparent"
            speed="1" style="width: 800px; height: 800px;" loop autoplay></lottie-player>
        </div>
      </section>
      <!-- /.content -->
    </div>
  </div>
@endsection
