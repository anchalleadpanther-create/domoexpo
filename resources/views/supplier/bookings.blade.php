@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-12">
            <div class="box">
              <div class="box-header with-border">
                <h4 class="box-title">Expert Package Bookings</h4>
              </div>
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
                              <th width="5%">#</th>
                              <th>Booking Details</th>
                              <th>Package</th>
                              <th>Expert</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($bookings as $key => $booking)
                              <tr role="row" class="odd">
                                <td align="left" class="sorting_1">
                                  {{ ++$key }}
                                </td>

                                <td align="left">
                                  <a href="#">{{ $booking->name }}</a>
                                  <span class="d-block text-muted">{{ $booking->phone }}</span>
                                  <span class="d-block text-muted">{{ $booking->email }}</span>
                                  <span class="d-block text-muted">{{ $booking->type }}</span>
                                  <span class="d-block text-muted">{{ $booking->mode }}</span>
                                  <span class="d-block text-muted">Date:
                                    {{ $booking->date->format('d M, Y') }}</span>
                                  <span class="d-block text-muted">Time:
                                    {{ $booking->time->format('H:i A') }}</span>
                                </td>
                                <td align="left">
                                  <a href="#">{{ $booking->package?->name }}</a>
                                  <span class="d-block text-muted">INR
                                    {{ number_format($booking->package?->price, 2) }}</span>
                                  <span class="d-block text-muted">{{ $booking->package?->duration }}</span>
                                </td>
                                <td align="left">
                                  <a href="#">{{ $booking->expert?->fullName }}</a>
                                  <span class="d-block text-muted">{{ $booking->expert?->email }}</span>
                                  <span class="d-block text-muted">{{ $booking->expert?->phone }}</span>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    {{ $bookings->links() }}
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
@endsection
