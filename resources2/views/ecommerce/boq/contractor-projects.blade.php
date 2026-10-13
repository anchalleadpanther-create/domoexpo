@extends('user.header')
@section('userContent')
<style>
    /* Ensure the processing background is transparent */
    #example1_processing {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
        color: #000 !important;
    }

    .dataTables_filter {
        display: none;
    }

    #example1_wrapper .dt-search {
        display: none;
    }

    .box {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border: 1px solid #e3e6f0;
        margin-bottom: 20px;
    }

    .box-header {
        padding: 20px;
        border-bottom: 1px solid #e3e6f0;
    }

    .box-title {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .box-body {
        padding: 20px;
    }

    .card-table {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
    }

    .badge-success {
        background-color: #28a745;
        color: white;
    }

    .badge-info {
        background-color: #17a2b8;
        color: white;
    }

    .badge-primary {
        background-color: #007bff;
        color: white;
    }

    .ps-table-action .btn {
        margin: 2px;
        padding: 6px 10px;
        font-size: 12px;
    }

    .slide-content {
        background: #fff1d0;
        border: 1px solid #ffd700;
        border-radius: 6px;
        margin: 10px 0;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Projects Management</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">All Projects</li>
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
                            <h4 class="box-title">All Projects <span class="badge badge-info ms-2">{{ $totalProjects ?? 0 }} Total Records</span></h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- Search Form -->
                            <div class="mb-4 d-none">
                                <form action="{{route('buyer.buyer-rfq')}}" method="get" class="row g-3 align-items-end">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="search" name="search" placeholder="Search Project ID and Description" value="{{ request('search') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary w-100">Search</button>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="{{route('buyer.buyer-rfq')}}" class="btn btn-secondary w-100">Reset</a>
                                    </div>
                                </form>
                            </div>

                            <div class="table-responsive rounded card-table">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <table class="table border-no dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Project ID</th>
                                                <th>Project Detail</th>
                                                <th>Contractor Detail</th>
                                                
                                                <th>Project Address</th>
                                                <th>Project Dates</th>
                                                <th width="18%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($projects as $contractorProjects)
                                            @php
                                                $project = $contractorProjects->boq;
                                                
                                                // Skip this iteration if no project/boq exists
                                                if (empty($contractorProjects->boq)) {
                                                    continue;
                                                }
                                            @endphp
                                            
                                            
                                                <tr>
                                                    <td><strong>PRO-00{{ $project->id ?? '' }}</strong></td>
                                                    <td>
                                                        <p class="mb-1"><strong>Name:</strong> {{ $project->project_name }}</p>
                                                        <p class="mb-1"><strong>Client:</strong> {{ $project->client_name }}</p>
                                                        <p class="mb-1"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                                        <p class="mb-1"><strong>Total Categories:</strong> {{ count($project->getBoqMainItem) ?? 0 }}</p>
                                                        @php
                                                            $totalSubItemAmount = $project->getBoqMainItem->flatMap(function($mainItem) {
                                                                return $mainItem->getSubItem;
                                                            })->sum('amount');
                                                        @endphp
                                                        <p class="mb-0"><strong>Total Amount:</strong> {{ number_format($totalSubItemAmount, 2, '.', ',') }}</p>
                                                    </td>
                                                     <td>
                                                        <p class="mb-1"><strong>Name:</strong> {{ $contractorProjects->contractor->fullName ?? '' }} (ID: {{ $contractorProjects->contractor->id ?? '' }})</p>
                                                        <p class="mb-1"><strong>Phone:</strong> {{  $contractorProjects->contractor->phone ?? '-' }}</p>
                                                        <p class="mb-1"><strong>Email:</strong> {{  $contractorProjects->contractor->email ?? '' }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1"><strong>Address:</strong> {{ $project->project_address }}</p>
                                                        <p class="mb-1"><strong>City:</strong> {{ $project->projectCity?->name ?? '-' }}</p>
                                                        <p class="mb-1"><strong>Area:</strong> {{ $project->projectArea?->name ?? '' }}</p>
                                                    </td>
                                                    <td style="vertical-align: middle;">
                                                        <p class="mb-1"><strong>BOQ Deadline:</strong> {{ $project->boq_deadline }}</p>
                                                        <p class="mb-1"><strong>Valid Until:</strong> {{ $project->validity_date }}</p>
                                                        <p class="mb-1">
                                                            <strong>Status:</strong> 
                                                            <span class="badge badge-{{ $project->getContractorStatus($contractorProjects->contractor_id) == 'Accepted' ? 'success' : 'info' }}">
                                                                {{ $project->getContractorStatus($contractorProjects->contractor_id) }}
                                                            </span>
                                                        </p>
                                                        <p class="mb-0"><strong>Created:</strong> {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                                    </td>
                                                    <td class="ps-table-action text-center" style="vertical-align: middle;">
                                                        <a href="{{ route('admin.boq-projects.show',[$project->id]) }}" class="btn btn-sm btn-info mb-1" title="View Detail">
                                                            <i class="fa fa-eye"></i> Detail
                                                        </a>
                                                        <a class="btn btn-sm btn-success mb-1" href="{{ route('admin.project-detail-pdf', [$project->id]) }}" target="_blank" title="Download PDF">
                                                            <i class="fa fa-download"></i> PDF
                                                        </a>
                                                        
                                                        @if($project->getContractorStatus($contractorProjects->contractor_id) == 'Accepted')
                                                            <a href="{{ route('admin.supplier-rate-quotation',[$project->id,$contractorProjects->contractor_id]) }}" class="btn btn-sm btn-warning mb-1" title="Quotations">
                                                                <i class="fa fa-list"></i> Quotations
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4">
                                                        <div class="text-muted">
                                                            <i class="fa fa-inbox fa-3x mb-3 d-block"></i>
                                                            <h5>No projects found</h5>
                                                            <p>Your projects will appear here.</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    {{ $projects->appends(request()->query())->links('pagination::customer-custom-paginate') }}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</div>

{{-- Project Acceptance Modal --}}
<div class="modal fade" id="projectAcceptanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Project Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('buyer.accept-boq-by-contractor')}}" method="post">
                @csrf
                <input type="hidden" name="boq_id" id="boq_id_for_change_status">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Project Status</label>
                        <select class="form-control form-select" name="status">
                            <option value="Accepted">Accepted</option>
                            <option value="Declined">Declined</option>
                            <option value="Not Sure">Not Sure</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function(){
    // Initialize DataTable
    $('#example1').DataTable({
        "paging": false,
        "searching": false,
        "info": false,
        "responsive": true,
        "language": {
            "emptyTable": "No projects found"
        }
    });

    // Project Status Modal
    function setProjectData(boq_id){
        $('#boq_id_for_change_status').val('');
        $('#boq_id_for_change_status').val(boq_id);
    }
});
</script>
@endsection
