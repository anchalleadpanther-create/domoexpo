@extends('user.header')
@section('userContent')
  

  <div class="content-wrapper" style="min-height: 1019px;">
    <div class="container-full">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <form action="{{ route('admin.buyers.manage-wallet.store', $customer->id) }}" method="post">
            @csrf
            <input type="hidden" value="" name="transaction_type" />
            <div class="col-12">

              <div class="row">

                <div class="col-md-8 ">
                  <div class="box">
                    <div class="box-header">
                      <h4 class="box-title">Manage wallet of "{{ $customer->fullName }}"</h4>
                    </div>

                    <div class="box-body">
                      <div class="inner-user-div4">
                        <div class="row">

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Name</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Name" maxlength="100"
                                  value="{{ $customer->fullName }}" readonly>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">E-Mail</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="email" class="form-control" placeholder="E-Mail" maxlength="150"
                                  value="{{ $customer->email }}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Phone No</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Phone No"
                                  value="{{ $customer->phone }}" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Wallet</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" class="form-control" placeholder="Wallet"
                                  value="{{ $customer->wallet }}" readonly>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Credit Amount <i class="fa fa-plus"></i></label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Credit Amount"
                                  value="{{ old('credit_amount') }}" name="credit_amount">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label text-success ">Debit Amount <i class="fa fa-minus"></i></label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="number" min="0" class="form-control" placeholder="Debit Amount"
                                  value="{{ old('debit_amount') }}" name="debit_amount">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Order ID</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" class="form-control" placeholder="Order ID"
                                  value="{{ old('order_id') }}" name="order_id">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label text-success ">Remark</label>
                              <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-angle-double-right"></i></span>
                                <input type="text" maxlength="200" class="form-control" placeholder="Remark"
                                  value="{{ old('remark') }}" name="remark">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8"></div>

                          <div class="col-md-12 my-3">
                            <button class="btn btn-success save-btn">Save</button>
                          </div>
                        </div>
                        <div class="table-responsive">

                          <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                              <div class="col-sm-12 col-md-6"></div>
                              <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                              <div class="col-sm-12">
                                <table id="example2"
                                  class="table table-lg invoice-archive tr-odd_clr dataTable no-footer" role="grid"
                                  aria-describedby="example2_info">
                                  <thead>
                                    <tr role="row">
                                      <th width="2%" class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Sl#: activate to sort column descending">
                                        Sl#
                                      </th>

                                      <th width="12%" class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="buyer Address">TRANSACTION
                                      </th>

                                      <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Auth Representative">REMARK</th>

                                      <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Auth Representative">TYPE</th>

                                      <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Auth Representative">AMOUNT</th>

                                      <th width="15%" class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-label="Registration">ORDER ID
                                      </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($customer->walletHistory as $key => $history)
                                      <tr role="row" class="odd">
                                        <td align="left" class="sorting_1">
                                          {{ ++$key }}
                                        </td>
                                        <td align="left">
                                          <p> {{ $history->title }}</p>
                                          <p>{{ $history->created_at->format('d M, Y : h:i A') }} </p>
                                          <p>By: {{ $history->user?->name }} - {{ $history->user?->email }} </p>
                                          @if (isset($history->order_id))
                                            <p>Order No: {{ $history->order_id }}</p>
                                          @endif
                                        </td>
                                        <td style="text-align:left">
                                          <p>{{ $history->remark }}</p>
                                        </td>

                                        <td @class([
                                            'text-danger' => $history->type === 'DEBIT',
                                            'text-primary' => $history->type === 'CREDIT',
                                        ])>{{ $history->type }}</td>
                                        <td>
                                          @if ($history->type == 'CREDIT')
                                            <span class="text-primary">{{ getCurrentCurrency()->currency }} +
                                              {{ $history->amount * getCurrentCurrency()->con_ratio }}</span>
                                          @else
                                            <span class="text-danger">{{ getCurrentCurrency()->currency }} -
                                              {{ $history->amount * getCurrentCurrency()->con_ratio }}</span>
                                          @endif
                                        </td>
                                        <td @class([
                                            'text-danger' => $history->type === 'DEBIT',
                                            'text-primary' => $history->type === 'CREDIT',
                                        ])>{{ $history->order_id_supplier }}</td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>

            </div>
            <!-- /.box -->

          </form>
        </div>
        <!-- /.col-->
      </section>

    </div>
    <!-- ./row -->

    <!-- /.content -->
  </div>
  <script type="module" src="{{ asset('allUsers/user/wallet.js') }}"></script>
@endsection
