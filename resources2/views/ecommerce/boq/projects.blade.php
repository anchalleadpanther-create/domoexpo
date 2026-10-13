@extends('user.header')
@section('userContent')
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
                            <h4 class="box-title">All Projects</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive rounded card-table">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6"></div>
                                        <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"></div>
                                    </div>
                                    <table class="table border-no dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Project ID</th>
                                                <th>Project Detail</th>
                                                <th>Other Info</th>
                                                <th>Status</th>
                                                <th width="12%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $project)
                                                <tr style="">
                                                <td><strong>PRO-00{{ $project->id }}</strong></td>
                                                <td>
                                                    <p class="mb-0"><strong>Name:</strong> {{ $project->project_name }}</p>
                                                    <p class="mb-0"><strong>Client:</strong> {{ $project->client_name }}</p>
                                                    <p class="mb-0"><strong>BOQ Type:</strong> {{ $project->boq_type }}</p>
                                                    @if($project->developer_amount > 0)
                                                    <p class="mb-0"><strong>Dev Amount:</strong> {{ number_format($project->developer_amount ?? 0, 2, '.', ',') }}</p>
                                                    @endif
                                                    <p class="mb-0"><strong>Total Categories:</strong> {{ count($project->getBoqMainItem) ?? 0 }}</p>
                                                    @php
                                                        $totalSubItemAmount = $project->getBoqMainItem->flatMap(function($mainItem) {
                                                            return $mainItem->getSubItem;
                                                        })->sum('amount');
                                                    @endphp
                                                    <p class="mb-0"><strong>Total Amount:</strong> {{ number_format($totalSubItemAmount, 2, '.', ',') }}</p>
                                                </td>
                                                <td>
                                                    <p class="mb-0"><strong>Address:</strong> {{ $project->project_address }}</p>
                                                    <p class="mb-0"><strong>City:</strong> {{ $project->projectCity?->name ?? '-' }}</p>
                                                    <p class="mb-0"><strong>Area:</strong> {{ $project->projectArea?->name ?? '' }}</p>
                                                    <p class="mb-0"><strong>Created:</strong> {{ \Carbon\Carbon::parse($project->created_at)->format('d M Y, h:i A') }}</p>
                                                    <p class="mb-0"><strong>By:</strong> {{ $project->boqCreatedBy->fullname ?? '' }} ({{ $project->created_by }})</p>
                                                </td>
                                                <td style="text-align:center; vertical-align: middle;">
                                                    <span class="badge badge-{{ $project->status == 'On Going' ? 'success' : 'primary' }}">{{ $project->status }}</span><br><br>
                                                    
                                                    @if(count($project->mappedQuantitySurveyor) > 0)
                                                    <p class="mb-1"><strong>QS Count:</strong> {{ count($project->mappedQuantitySurveyor) }}</p>
                                                    @endif
                                                    
                                                    @if(count($project->mappedArchitect) > 0)
                                                    <p class="mb-1"><strong>Architects:</strong> {{ count($project->mappedArchitect) }}</p>
                                                    @endif
                                                </td>
                                                <td class="ps-table-action text-center">
                                                    {{-- Admin Action Buttons --}}
                                                    <a href="{{route('admin.boq-projects.show',[$project->id])}}" class="btn btn-sm btn-info mb-1" title="Preview">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                    <!--<a href="" class="btn btn-sm btn-success mb-1" target="_blank" title="PDF">-->
                                                    <!--    <i class="fa fa-download"></i>-->
                                                    <!--</a>-->
                                                    
                                                    @if($project->status == 'Pending')
                                                        <a href="javascript:void(0)" class="btn btn-sm btn-danger delete-project mb-1" data-id="{{ $project->id }}" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    @endif
                                                    
                                                    {{-- Toggle Button for Revised Projects --}}
                                                    @if(count(getRevisedBOQProjects($project->id)) > 0)
                                                    <br>
                                                    <a class="btn btn-sm btn-warning toggle-revised text-white mb-1 py-1 px-2" href="javascript:void(0)" data-id="{{ $project->id }}" title="History">
                                                        <i class="fa fa-plus-circle" style="font-size:12px;"></i> 
                                                        History ({{ count(getRevisedBOQProjects($project->id)) }})
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                                {{-- Hidden Toggle Row for Revised Projects --}}
                                                @if(count(getRevisedBOQProjects($project->id)) > 0)
                                                <tr class="revised-row" id="revised-{{ $project->id }}" style="display: none;">
                                                    <td colspan="5">
                                                        <div class="slide-content  p-3 rounded" >
                                                            <table class="table table-sm table-bordered mb-0">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th width="8%"><strong>Rev ID</strong></th>
                                                                        <th  ><strong>Project Detail</strong></th>
                                                                        <th width="25%"><strong>Address</strong></th>
                                                                        <th width="20%"><strong>Dates</strong></th>
                                                                        <th width="15%"><strong>Status/Action</strong></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach(getRevisedBOQProjects($project->id) as $revProject)
                                                                    <tr>
                                                                        <td><strong>PRO-00{{ $revProject->boq_id_counter }}</strong></td>
                                                                        <td>
                                                                          
                                                                            <p class="mb-0"><strong>Name:</strong> {{ $revProject->project_name }}</p>
                                                                            <p class="mb-0"><strong>Client:</strong> {{ $revProject->client_name }}</p>
                                                                            <p class="mb-0"><strong>BOQ Type:</strong> {{ $revProject->boq_type }}</p>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            
                                                                            <p class="mb-0"><strong>Address:</strong> {{ $revProject->project_address }}</p>
                                                                            <p class="mb-0"><strong>City:</strong> {{ $revProject->projectCity?->name ?? '-' }}</p>
                                                                            <p class="mb-0"><strong>Area:</strong> {{ $revProject->projectArea?->name ?? '' }}</p>
                                                                            <p class="mb-0"><strong>Created:</strong> {{ \Carbon\Carbon::parse($revProject->created_at)->format('d M Y, h:i A') }}</p>
                                                                            <p class="mb-0"><strong>By:</strong> {{ $revProject->boqCreatedBy->fullname ?? '' }} ({{ $revProject->created_by }})</p>
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            <small><strong>Deadline:</strong> {{ $revProject->boq_deadline }}</small><br>
                                                                            <small><strong>Valid:</strong> {{ $revProject->validity_date }}</small>
                                                                        </td>
                                                                        <td>
                                                                            <span class="badge badge-sm badge-{{ $revProject->status == 'On Going' ? 'success' : 'primary' }}">
                                                                                {{ $revProject->status }}
                                                                            </span><br>
                                                                            <a href="{{route('admin.boq-projects.show',[$revProject->id])}}" class="btn btn-xs btn-info mt-1">View</a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {{ $projects->appends(request()->query())->links() }}
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

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this project?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // Toggle Script
    $('.toggle-revised').click(function(){
        var id = $(this).data('id');
        var row = $('#revised-' + id);
        var icon = $(this).find('i');
        
        row.slideToggle(300);
        if(row.is(':visible')){
            icon.removeClass('fa-plus-circle').addClass('fa-minus-circle');
        } else {
            icon.removeClass('fa-minus-circle').addClass('fa-plus-circle');
        }
    });
    
    // Delete Confirmation
    $('.delete-project').click(function(){
        var id = $(this).data('id');
        $('#deleteForm').attr('action', '/admin/boq-projects/' + id);
        $('#deleteModal').modal('show');
    });
});
</script>
@endsection
