@extends('user.header')
@section('userContent')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 630px;">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">Project Preview</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item" aria-current="page">Projects</li>
                                <li class="breadcrumb-item active" aria-current="page">Project Info</li>
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
                            <h4 class="box-title">Project Information - PRO-00{{ $project->id }}</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                            <!-- Step Navigation -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <ul class="list-inline text-center admin-progressbar">
                                        <li class="list-inline-item active">
                                            <a href="#project-info" class="step-link">
                                                <span class="step-number">1</span>
                                                <span class="step-text">Project Info</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#boq-details" class="step-link">
                                                <span class="step-number">2</span>
                                                <span class="step-text">BOQ Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Step 1: Project Info -->
                            <div id="project-info" class="admin-form-step active">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped rounded admin-project-table">
                                                <thead class="bg-white text-white text-center">
                                                    <tr>
                                                        <th width="50%">Project Detail</th>
                                                        <th>Address & Documents</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="p-4">
                                                            <div class="project-details">
                                                                <p class="mb-2"><strong class="text-dark">Project Name:</strong> 
                                                                    <span class="text-muted">{{ $project->project_name ?? '' }}</span>
                                                                </p>
                                                                <p class="mb-2"><strong class="text-dark">Client Name:</strong> 
                                                                    <span class="text-muted">{{ $project->client_name ?? '' }}</span>
                                                                </p>
                                                                <p class="mb-2"><strong class="text-dark">BOQ Type:</strong> 
                                                                    <span class="badge badge-info">{{ $project->boq_type ?? '' }}</span>
                                                                </p>
                                                                <p class="mb-2"><strong class="text-dark">BOQ Deadline:</strong> 
                                                                    <span class="text-danger">{{ $project->boq_deadline ?? '' }}</span>
                                                                </p>
                                                                <p class="mb-0"><strong class="text-dark">Validity Till:</strong> 
                                                                    <span class="text-success">{{ $project->validity_date ?? '' }}</span>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="p-4">
                                                            <div class="address-details">
                                                                <p class="mb-2"><strong class="text-dark">Project Address:</strong></p>
                                                                <p class="text-muted mb-3">{{ $project->project_address ?? '' }}</p>
                                                                <p class="mb-2"><strong class="text-dark">Project City:</strong> 
                                                                    <span class="badge badge-secondary">{{ $project->projectCity?->name ?? '' }}</span>
                                                                </p>
                                                                <p class="mb-3"><strong class="text-dark">Project Area:</strong> 
                                                                    <span class="badge badge-secondary">{{ $project->projectArea?->name ?? '' }}</span>
                                                                </p>
                                                                
                                                                <!-- Reference Documents -->
                                                                <div class="reference-docs">
                                                                    <h6 class="text-primary mb-2"><i class="fa fa-paperclip"></i> Reference Documents:</h6>
                                                                    <div class="doc-links">
                                                                        @if(isset($project->attachment_file_one))
                                                                        <a class="btn btn-sm btn-success mb-1 mr-1" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_one )}}">
                                                                            <i class="fa fa-download"></i> Reference 1
                                                                        </a>
                                                                        @endif
                                                                        
                                                                        @if(isset($project->attachment_file_two))
                                                                        <a class="btn btn-sm btn-success mb-1 mr-1" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_two )}}">
                                                                            <i class="fa fa-download"></i> Reference 2
                                                                        </a>
                                                                        @endif
                                                                        
                                                                        @if(isset($project->attachment_file_three))
                                                                        <a class="btn btn-sm btn-success mb-1 mr-1" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_three )}}">
                                                                            <i class="fa fa-download"></i> Reference 3
                                                                        </a>
                                                                        @endif
                                                                        
                                                                        @if(isset($project->attachment_file_four))
                                                                        <a class="btn btn-sm btn-success mb-1" target="_blank" href="{{asset('uploads/rfq/'.$project->attachment_file_four )}}">
                                                                            <i class="fa fa-download"></i> Reference 4
                                                                        </a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Step 2: BOQ Details -->
                            <div id="boq-details" class="admin-form-step">
                                <div id="category-groups-wrapper" class="category-boq-section">
                                    @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
                                        @foreach($project->getBoqMainItem as $mainKey => $mainItem) 
                                        <div class="category-group mb-4">
                                            <div class="box ">
                                                <div class="box-header with-border">
                                                    <h5 class="box-title">
                                                        <i class="fa fa-list"></i> Category {{ $mainKey + 1 }}: 
                                                        <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span>
                                                    </h5>
                                                </div>
                                                <div class="box-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered table-striped admin-boq-table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th width="15%">Sub Category</th>
                                                                    <th width="17%">Sub Sub Category</th>
                                                                    <th width="30%">Description</th>
                                                                    <th width="8%">Unit</th>
                                                                    <th width="8%">Qty</th>
                                                                    <th width="8%">Rate</th>
                                                                    <th width="10%">Amount</th>
                                                                    <th width="10%">Reference</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($mainItem->getSubItem as $subKey => $subItem) 
                                                                <tr>
                                                                    <td>
                                                                        <span class="badge badge-light">{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</span>
                                                                    </td>
                                                                    <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                                                    <td class="text-truncate" title="{{ $subItem->description ?? '' }}">
                                                                        {{ Str::limit($subItem->description ?? '', 50) }}
                                                                    </td>
                                                                    <td><strong>{{ $subItem->unit ?? '' }}</strong></td>
                                                                    <td class="text-right">{{ number_format($subItem->quantity ?? 0, 2) }}</td>
                                                                    <td class="text-right">{{ number_format($subItem->rate ?? 0, 2) }}</td>
                                                                    <td class="text-success font-weight-bold text-right">
                                                                        {{ number_format($subItem->amount ?? 0, 2) }}
                                                                    </td>
                                                                    <td>
                                                                        @if(isset($subItem->reference_file))
                                                                        <a class="btn btn-xs btn-success" target="_blank" href="{{asset('uploads/rfq/'.$subItem->attachment_file )}}" title="Download Reference">
                                                                            <i class="fa fa-download"></i>
                                                                        </a>
                                                                        @else
                                                                        <span class="text-muted">N/A</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                    <div class="alert alert-warning text-center">
                                        <h4><i class="fa fa-exclamation-triangle"></i> No BOQ Data Available</h4>
                                        <p>Quantity details not available for this project.</p>
                                    </div>
                                    @endif
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

<style>
.admin-progressbar .list-inline-item {
    position: relative;
    margin: 0 20px;
}
.admin-progressbar .step-number {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50%;
    background: #007bff;
    color: white;
    font-weight: bold;
    font-size: 14px;
    transition: all 0.3s ease;
}
.admin-progressbar .step-text {
    display: block;
    margin-top: 5px;
    font-size: 12px;
}
.step-link {
    text-decoration: none;
    color: inherit;
}
.step-link:hover .step-number {
    background: #0056b3;
    transform: scale(1.1);
}
.admin-project-table th,
.admin-boq-table th {
    font-size: 14px;
    font-weight: 600;
}
.text-truncate {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.admin-form-step {
    display: block; /* Always visible */
}
</style>

<script>
$(document).ready(function(){
    // Step navigation - Show both steps, just smooth scroll
    $('.step-link').click(function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top - 100
        }, 800);
        
        // Highlight active step
        $('.step-link').removeClass('active');
        $(this).addClass('active');
    });
    
    // Smooth scroll to top
    $('html, body').animate({scrollTop: 0}, 'slow');
});
</script>
@endsection
