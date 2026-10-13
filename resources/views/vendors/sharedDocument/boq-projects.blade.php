@extends('vendors.header')
@section('vendorContent')
<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="me-auto">
                    <h3 class="page-title">BOQ Project Documents</h3>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Projects shared with contractors</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Project</th>
                                    <th>Contractor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projectRows as $row)
                                    <tr>
                                        <td>
                                            <p class="mb-1"><strong>PRO-00{{ $row['boq']->id }}</strong></p>
                                            <p class="mb-0">{{ $row['boq']->project_name }}</p>
                                        </td>
                                        <td>
                                            <p class="mb-1">{{ $row['contractor']->first_name }} {{ $row['contractor']->last_name }}</p>
                                            <p class="mb-0">{{ $row['contractor']->email }}</p>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm"
                                               href="{{ route('vendor.user-shared-document') }}?boq_id={{ $row['boq']->id }}&receiver_id={{ $row['contractor']->id }}&receiver_type=Contractor"
                                               target="_blank">Send Document</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No BOQ projects found.</td>
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
@endsection
