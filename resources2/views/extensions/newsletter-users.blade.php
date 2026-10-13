@extends('user.header')
@section('userContent')
  <div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
      <div class="content-header">
        <div class="d-flex align-items-center">
          <div class="me-auto">
            <h3 class="page-title">Newsletter Users</h3>
            <div class="d-inline-block align-items-center">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">CMS</li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="">Newsletter Users</a></li>
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
              <div class="box-body">
                <div class="table-responsive rounded card-table">

                  <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <table class="table border-no dataTable no-footer" id="example1" role="grid"
                      aria-describedby="example1_info">
                      <thead>
                        <tr role="row">
                          <th>#</th>
                          <th>Email</th>
                          <th>Date/Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($newsletters as $key => $newsletter)
                          <tr class="hover-primary odd" role="row">
                            <td> {{ ++$key }} </td>
                            <td>
                              {{ $newsletter->email }}
                            </td>
                            <td>
                              {{ $newsletter->created_at->format('d M, Y H:i A') }}
                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  {{ $newsletters->links() }}
                </div>
              </div>
            </div>

          </div>
      </section>
    </div>
  </div>
@endsection
