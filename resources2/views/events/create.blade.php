@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <section class="content">

        <div class="row">
          <div class="col-sm-8">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Add Event</h4>
              </div>
              <div class="box-body">
                <!-- Tab panes -->
                <form
                  action="{{ Request::segment(4) === 'edit' ? route('admin.events.update', $event->id) : route('admin.events.store') }}"
                  method="post" id="coupon" enctype="multipart/form-data">
                  @csrf
                  @if (Request::segment(4) === 'edit')
                    @method('PATCH')
                  @endif
                  <div class="tab-content">
                    <div class="tab-pane active" id="home4" role="tabpanel">
                      <div class="col-sm-12">
                        <div class="row grey-bg-clr">
                          <h5 class="mb-0">Event Info</h5>
                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="clearfix"></div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Title *</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="title" id="title" maxlength="200" value="@if(isset($event)){{ $event->title }}@else{{ old('title') }}@endif"
                                placeholder="" required>
                              </div>
                            </div>
                          </div>

                          <div class="col-12 mt-30">
                            <h5 class="mb-3">Description</h5>
                            <div class="col-md-12">
                              {{-- blade-formatter-disable-next-line --}}
                              <textarea name="description" id="summernote">@if (isset($event)){{ $event->description }}@else{{ old('description') }}@endif</textarea>
                              <hr />
                            </div>
                            <div class="clearfix"></div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Type</label>
                              <select class="form-control bg-white type" name="type">
                                <option
                                  @if (isset($event)) @selected($event->type === 'Upcoming Event') @else @selected(old('type') === 'Upcoming Event') @endif
                                  value="Upcoming Event">Upcoming Event</option>
                                <option
                                  @if (isset($event)) @selected($event->type === 'Past Event') @else @selected(old('type') === 'Past Event') @endif
                                  value="Past Event">Past Event</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Date</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="date" class="form-control" name="date" id="date" value="@if(isset($event)){{ $event->date->format('Y-m-d') }}@else{{ old('date') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Time</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="time" id="time" maxlength="100" value="@if(isset($event)){{ $event->time }}@else{{ old('time') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Venue</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="venue" id="venue" maxlength="100" value="@if(isset($event)){{ $event->venue }}@else{{ old('venue') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">City</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="city" id="city" maxlength="100" value="@if(isset($event)){{ $event->city }}@else{{ old('city') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-label">Organized By</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="organised_by" id="organised_by" maxlength="100" value="@if(isset($event)){{ $event->organised_by }}@else{{ old('organised_by') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Icon [MAX: 1MB]</label>
                              <input class="form-control" id="formFileSm" name="icon_file" type="file"
                                accept="image/*">
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Banner [MAX: 1MB]</label>
                              <input class="form-control" id="formFileSm" name="banner_file" type="file"
                                accept="image/*">
                            </div>
                          </div>

                          <div
                            class="col-md-12 past-divs @if (isset($event) && $event->type === 'Upcoming Event') d-none @endif @if (old('type') === 'Upcoming Event') d-none @endif @if (!isset($event) && old('type') === null) d-none @endif">
                            <div class="form-group">
                              <label class="form-label">Youtube Video ID</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                {{-- blade-formatter-disable-next-line --}}
                                <input type="text" class="form-control" name="youtube_id" id="youtube_id" maxlength="100" value="@if(isset($event)){{ $event->youtube_id }}@else{{ old('youtube_id') }}@endif"
                                placeholder="">
                              </div>
                            </div>
                          </div>

                          <div
                            class="col-md-12 past-divs @if (isset($event) && $event->type === 'Upcoming Event') d-none @endif @if (old('type') === 'Upcoming Event') d-none @endif @if (!isset($event) && old('type') === null) d-none @endif">
                            <div class="form-group">
                              <label for="formFileSm" class="form-label ">Gallery Images Upto 10 Images</label>
                              <input class="form-control" id="formFileSm" name="gallery_images[]" type="file"
                                accept="image/*" multiple>
                            </div>
                          </div>

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
                </form>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
  </div>
  <script type="text/javascript">
    $('#summernote').summernote({
      placeholder: 'Please enter your event content here.',
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
    document.querySelector(`.type`).addEventListener('change', e => {
      document.querySelectorAll('.past-divs').forEach(div => {
        div.classList.toggle('d-none');
      });
    });
  </script>
@endsection
