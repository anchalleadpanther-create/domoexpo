@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Event Registrations</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">Event</li>
                  <li class="breadcrumb-item active" aria-current="page"><a
                      href="{{ route('admin.events.registrations') }}">Event Registrations</a></li>
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
              <div class="box-body py-0 px-1">
                <div class="table-responsive rounded card-table">
                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table" id="example1" role="grid" aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th width="3%">#</th>
                          <th width="30%">Event</th>
                          <th width="20%">Visitor Info</th>
                          <th width="10%">Registration Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($registrations as $key => $registration)
                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              <span>Title: {{ @$registration?->event->title }}</span><br />
                              <span>Venue: {{ @$registration?->event->venue }}</span><br />
                              <span>Date: {{ @$registration?->event->date }}</span><br />
                              <span>Time: {{ @$registration?->event->time }}</span>
                            </td>

                            <td>
                              <span>Name: {{ $registration->name }}</span><br />
                              <span>Email: {{ $registration->email }}</span><br />
                              <span>Mobile: {{ $registration->mobile }}</span><br />
                              <span>Address: {{ $registration->address }}</span><br />
                              <span>Country: {{ @$registration?->country?->name }}</span><br />
                              <span>State: {{ @$registration?->state?->name }}</span><br />
                              <span>City: {{ @$registration?->city?->name }}</span><br />
                              <span>Pincode: {{ $registration->pincode }}</span><br />
                            </td>

                            <td>
                              {{ $registration->created_at->format('d M, Y h:i A') }}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                {{ $registrations->links() }}
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
