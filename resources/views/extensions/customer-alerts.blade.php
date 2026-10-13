@if ($message = Session::get('success'))
  <div class="alert alert-success text-justify"><i class="fa fa-check-circle"></i>
    {{ $message }}
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger text-justify">
    @foreach ($errors->all() as $error)
      <i class="fa fa-exclamation-circle"></i>{{ $error }} <br />
    @endforeach
  </div>
@endif
