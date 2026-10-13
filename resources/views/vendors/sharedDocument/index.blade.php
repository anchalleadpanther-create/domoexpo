@extends('vendors.header')
@section('vendorContent')
<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Project Document</h3>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="box">
                <div class="box-header with-border d-flex justify-content-between align-items-center flex-wrap">
                    <h4 class="box-title mb-0">Total Records: {{ count($documents) }}</h4>
                    @if(request()->filled('receiver_id') && request()->filled('receiver_type'))
                        <a data-toggle="modal" data-target="#sentDocumentModal" href="javascript:void(0)" class="btn btn-success btn-sm">
                            Sent Document
                        </a>
                    @endif
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>IDs</th>
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($documents as $doc)
                                    <tr>
                                        <td>
                                            <p class="mb-1"><strong>DOC ID:</strong> {{ $doc->id }}</p>
                                            @if(!empty($doc->boq_id))
                                                <p class="mb-0"><strong>BOQ ID:</strong> {{ $doc->boq_id }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            Name: {{ $doc->sender->full_name ?? ($doc->sender->biz_name ?? '') }}
                                            ({{ $doc->sender_type ?? '' }})
                                        </td>
                                        <td>
                                            Name: {{ $doc->receiver->full_name ?? ($doc->receiver->biz_name ?? '') }}
                                            ({{ $doc->receiver_type ?? '' }})
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                               @if(!empty($doc->document)) href="{{ asset('uploads/document_file/'.$doc->document) }}" @else onclick="alert('Document not available.')" @endif
                                               target="_blank">Show</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No documents found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="sentDocumentModal" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vendor.save-user-shared-document') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="boq_id" value="{{ request()->query('boq_id') }}">
                <input type="hidden" name="receiver_id" value="{{ request()->query('receiver_id') }}" id="receiver_id">
                <input type="hidden" name="receiver_type" value="{{ request()->query('receiver_type') }}" id="receiver_type">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Document</label>
                        <input type="file" name="document_file" accept="image/*,.pdf" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
