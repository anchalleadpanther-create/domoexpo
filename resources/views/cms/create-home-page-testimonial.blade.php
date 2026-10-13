@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 887px;">
	<div class="container-full">
		<!-- Content Header (Page header) -->
		@include('extensions.alerts')
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-12">
					<div class="box">
						<div class="box-header with-border">
							<h4 class="box-title">Home-Page Testimonial <a class="btn btn-sm btn-secondary" href="{{ route('admin.testimonials.index') }}">Back</a> </h4>
						</div>
						<div class="box-body">
							<form method="post" action="{{ $action }}" enctype="multipart/form-data">
								@csrf
								@if(isset($method)) @method($method) @endif
								<div class="row">
									<div class="col-md-4">
										<div class="mb-3">
											<label for="exampleInputPassword1" class="form-label">Name</label>
											<input type="text" class="form-control" maxlength="200" name="patient_name" value="@if(isset($slider)){{ $slider->patient_name }}@else{{ old('patient_name') }} @endif">
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label for="exampleInputPassword1" class="form-label">Occupation</label>
											<input type="text" class="form-control" maxlength="200" name="patient_occupation" value="@if(isset($slider)){{ $slider->patient_occupation }}@else{{ old('patient_occupation') }} @endif">
										</div>
									</div>
									<div class="col-md-4">
										<div class="mb-3">
											<label class="form-label">Image [MAX 2MB] [JPEG,JPG,PNG,WEBP]</label>
											<input type="file" class="form-control bg-transparent" accept="image/*" @if(!isset($method)) required @endif name="slider_img">
										</div>
									</div>
									<div class="col-md-12">
										<div class="mb-3">
											<label for="exampleInputPassword1" class="form-label">Testimonial</label>
											<textarea name="testimonial" id="summernote">@if(isset($slider)){{ $slider->testimonial }}@else{{ old('slider_testimonial') }}@endif</textarea>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="exampleInputPassword1" class="form-label">Testimonial Sort</label>
											<input type="number" min="0" class="form-control" onKeyPress="if(this.value.length===5) return false;" name="sort" value="@if(isset($slider)){{ $slider->sort }}@else{{ old('slider_sort') }} @endif">
										</div>
									</div>
									<div class="col-md-6 d-flex align-items-center">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" @if(isset($slider)){{ ($slider->status === 1) ? 'checked' : '' }}@else @if(old('status') === '1') checked @endif @endif  name="status" value="1" id="flexCheckDefault">
											<label class="form-check-label" for="flexCheckDefault">
												Testimonial Active
											</label>
										</div>
									</div>
									<div class="col-12">
										<button class="btn btn-primary">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<script type="text/javascript">
	$('#summernote').summernote({
	placeholder: 'Please enter your testimonial content here.',
	tabsize: 2,
	height: 250,
	toolbar: [
	['style', ['style']],
	['font', ['bold', 'underline', 'clear']],
	['color', ['color']],
	['para', ['ul', 'ol', 'paragraph']],
	['table', ['table']],
	['view', ['codeview', 'help']]
	]
});
</script>
@endsection