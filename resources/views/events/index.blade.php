@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Events</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Event</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.events.index') }}">Events</a></li>
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
                    <div class="col-md-12 text-right">
                      <a href="{{ route('admin.events.create') }}"
                        class="waves-effect waves-light btn mb-5 bg-gradient-primary pull-right">
                        Add Event
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body py-0 px-1">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table border-no no-footer table-sm" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>#</th>
                          <th>Title</th>
                          <th>Type</th>
                          <th>Date</th>
                          <th>Venue</th>
                          <th>City</th>
                          <th>Organised By</th>
                          <th>Time</th>
                          <th>Icon</th>
                          <th>Banner</th>
                          <th>Status</th>
                          <th class="text-center" width='10%'>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($events as $key => $event)
                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              {{ $event->title }}
                            </td>

                            <td>
                              {{ $event->type }}
                            </td>

                            <td>
                              {{ $event->date->format('jS F, Y') }}
                            </td>

                            <td>
                              {{ $event->venue }}
                            </td>

                            <td>
                              {{ $event->city }}
                            </td>

                            <td>
                              {{ $event->organised_by }}
                            </td>

                            <td>
                              {{ $event->time }}
                            </td>

                            <td>
                              <img
                                src="{{ isset($event->icon) ? asset('uploads/events') . '/' . $event->icon : asset('allUsers/800X200.png') }}"
                                style="width:150px;height:80px">
                            </td>

                            <td>
                              <img
                                src="{{ isset($event->banner) ? asset('uploads/events') . '/' . $event->banner : asset('allUsers/800X200.png') }}"
                                style="width:150px;height:80px">
                            </td>

                            <td>
                              @if ($event->status)
                                <span class="badge badge-success">Active</span>
                              @else
                                <span class="badge badge-danger">Inactive</span>
                              @endif
                            </td>

                            <td class="text-center">
                              <!-- Button trigger modal -->
                              <a href="{{ route('admin.events.edit', $event->id) }}" title="Edit category" type="button"
                                class="badge badge-pill badge-primary"> <i class="fa fa-pencil"></i></a>
                              <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#modal-delete"
                                title="Delete category" onclick="destroyUrlUpdate(this)"
                                data-destroy-url="{{ route('admin.events.destroy', $event->id) }}" type="button"
                                class="badge badge-pill badge-danger delete" href="JavaScript:void(0);"><i
                                  class="fa fa-trash"></i></a>
                              <a href="{{ route('admin.events.status', [$event->id, $event->status === 1 ? 0 : 1]) }}"
                                title="{{ $event->title === 1 ? 'Tap to Disable' : 'Tap to Enable' }}"
                                class="badge badge-pill badge-success disable" catid="0011-0">
                                @if ($event->status)
                                  <i class="fa fa-toggle-on"></i>
                                @else
                                  <i class="fa fa-toggle-off"></i>
                                @endif
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  {{ $events->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
