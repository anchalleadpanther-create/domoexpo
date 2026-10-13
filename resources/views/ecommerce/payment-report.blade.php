@extends('user.header')
@section('userContent')
<div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Invoices</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Products</li>
                            <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Invoices</h4>
                        </div>
                        
                        <div class="box-body">
                            <div class="table-responsive rounded card-table">
                                <table class="table border-no dataTable no-footer" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Info</th>
                                            <th>Transaction Type</th>
                                            <th>Payment Info</th>
                                            <th>Payment Status</th>
                                            <th>Send Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($histories as $key => $history)
                                            <tr class="hover-primary">
                                                <td>{{ ++$key }}</td>
                                                <td>
                                                    @if($history->user_type == 'buyer')
                                                        <div>
                                                            <strong>UID:</strong> {{ $history->getBuyer->id ?? 'N/A' }} <br>
                                                            <strong>Name:</strong> {{ $history->getBuyer->first_name ?? '' }} 
                                                                            {{ $history->getBuyer->last_name ?? '' }} ({{ ucfirst($history->user_type) }})<br>
                                                            <strong>Email:</strong> {{ $history->getBuyer->email ?? 'N/A' }}
                                                        </div>
                                                    @else
                                                        <div>
                                                            <strong>UID:</strong> {{ $history->getSeller->id ?? 'N/A' }}<br>
                                                            <strong>Name:</strong> {{ $history->getSeller->biz_company ?? '' }}  ({{ ucfirst($history->user_type) }}) <br>
                                                            <strong>Email:</strong> {{ $history->getSeller->biz_email ?? 'N/A' }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $history->transaction_for === 'Membership'
                                                        ? 'Subscription Membership'
                                                        : ($history->transaction_for == 'Add Supplier Category'
                                                            ? 'Extra Supplier Category ' . '('.($history->category->category_name ?? '').')'
                                                            : '')
                                                    }}
                                                </td>
                                                <td>
                                                    <div>
                                                        <strong>Amount:</strong> {{ ($history->amount + $history->vat_amt) - $history->coupon_amt ?? '0' }}<br>
                                                        <strong>Date:</strong> {{ $history->created_at ? $history->created_at->format('d-m-Y h:i A') : 'N/A' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $history->payment_status == 'success' ? 'success' : 'warning' }}">
                                                        {{ $history->payment_status ?? 'Pending' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-sm view-email-btn my-1 " data-id="{{ $history->id }}">
                                                        <i class="fa fa-eye"></i>  View 
                                                    </button><br>
                                                    <button class="btn btn-success btn-sm send-email-btn my-1 " data-id="{{ $history->id }}">
                                                        <i class="fa fa-envelope"></i> Send
                                                    </button><br>
                                                    
                                                    <a href="{{ asset('uploads/invoices/'.$history->invoice_pdf) }}" download class="btn btn-primary btn-sm  my-1 " data-id="{{ $history->id }}">
                                                        <i class="fa fa-download"></i> Download
                                                    </a>
                                                   
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No enquiries found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                {{ $histories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>




<!-- Email Preview Modal -->
<div class="modal fade" id="emailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Receipt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="emailContent">
                <!-- Dynamic content loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success send-email-confirm" style="display:none;">
                    <i class="fa fa-paper-plane"></i> Send Email
                </button>
            </div>
        </div>
    </div>
</div>
<!--/home/domoexpo/public_html/public/allUsers/user/payment-report.js-->
<script type="module" src="{{asset('allUsers/user/payment-report.js')}}"></script>
<script>
// document.addEventListener('DOMContentLoaded', function() {
//     // View Email Modal
//     document.querySelectorAll('.view-email-btn').forEach(btn => {
//         btn.addEventListener('click', async () => {
//             const historyId = btn.dataset.id;
//             try {
//                 const response = await axios.get(`/admin/payment-report/${historyId}/email-preview`);
//                 document.getElementById('emailContent').innerHTML = response.data.html;
//                 document.querySelector('.send-email-confirm').dataset.historyId = historyId;
//                 document.querySelector('.send-email-confirm').style.display = 'inline-block';
//                 new bootstrap.Modal(document.getElementById('emailModal')).show();
//             } catch (error) {
//                 handleMessage('error', 'Error!', 'Failed to load email preview');
//             }
//         });
//     });

//     // Send Email (Table + Modal)
//     document.querySelectorAll('.send-email-btn, .send-email-confirm').forEach(btn => {
//         btn.addEventListener('click', async () => {
//             const historyId = btn.dataset.historyId || btn.dataset.id;
//             try {
//                 await axios.post(`/admin/payment-report/${historyId}/send-email`);
//                 handleMessage('success', 'Success!', 'Email sent successfully!');
//                 const modal = bootstrap.Modal.getInstance(document.getElementById('emailModal'));
//                 if (modal) modal.hide();
//             } catch (error) {
//                 handleMessage('error', 'Error!', error.response?.data?.message || 'Failed to send email');
//             }
//         });
//     });
// });

</script>
@endsection
