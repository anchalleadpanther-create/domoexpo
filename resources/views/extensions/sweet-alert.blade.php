@if ($message = Session::get('sweet-alert'))
  <input type="hidden" class="sweet-msg" value="{{ $message }}" />
@endif
@if ($message = Session::get('sweet-alert-error'))
  <input type="hidden" class="sweet-msg-error" value="{{ $message }}" />
@endif
@if ($message = Session::get('success'))
  <input type="hidden" class="sweet-msg" value="{{ $message }}" />
@endif
@if ($errors->any())
  <input type="hidden" class="sweet-msg-error" value="{{ implode(",\n", $errors->all()) }}" />
@endif
