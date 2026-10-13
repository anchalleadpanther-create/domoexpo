<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Project Info PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 13px; margin: 20px; }
        h2 { margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid #999; padding: 8px; vertical-align: top; }
        tr, td{ border: 1px solid #999; padding: 8px; vertical-align: top; }
        th { background-color: #eee; }
        .section { margin-bottom: 40px; }
        .text-center { text-align: center; }
        .text-success { color: green; text-decoration: none; }
        .fw-900 { font-weight: bold; }
        p{
            margin:0px;
        }
    </style>
</head>
<body>

    <div class="section">
        <h2>Project Info</h2>
        <table>
            <thead>
                <tr class="text-center">
                    <th width="50%">Project Detail</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p><strong>Project Id:</strong> PRO-00{{  !empty($project->boq_id_counter) ? $project->boq_id_counter  :  $project->id }}</p>
                        <p><strong>Architect Name:</strong> {{ $project->architect->first_name ?? '' }} {{  $project->architect->last_name ?? '' }}</p>
                        <p><strong>Project Name:</strong> {{ $project->project_name ?? '' }}</p>
                        <p><strong>Client Name:</strong> {{ $project->client_name ?? '' }}</p>
                        <p><strong>BOQ Type:</strong> {{ $project->boq_type ?? '' }}</p>
                        <p><strong>Deadline:</strong> {{ $project->boq_deadline ?? '' }}</p>
                    </td>
                    <td>
                        <p ><strong>Project Address:</strong> {{ $project->project_address ?? '' }}</p>
                        <p><strong>Project City:</strong> {{ $project->projectCity->name ?? '' }}</p>
                        <p><strong>Project Area:</strong> {{ $project->projectArea->name ?? '' }}</p>
                        <p><strong>Validity Till:</strong> {{ $project->validity_date ?? '' }}</p>
                        <p><strong>Total Categories:</strong> {{ count($project->getBoqMainItem) ?? '' }}</p>
                    </td>
                </tr>
               {{-- <tr>
                    <td><strong>Reference Documents:</strong></td>
                    <td>
                        @if(isset($project->attachment_file_one))
                            <a class="text-success" href="{{ asset('uploads/rfq/' . $project->attachment_file_one) }}">Reference 1</a>
                        @endif
                        @if(isset($project->attachment_file_two))
                            | <a class="text-success" href="{{ asset('uploads/rfq/' . $project->attachment_file_two) }}">Reference 2</a>
                        @endif
                        @if(isset($project->attachment_file_three))
                            | <a class="text-success" href="{{ asset('uploads/rfq/' . $project->attachment_file_three) }}">Reference 3</a>
                        @endif
                        @if(isset($project->attachment_file_four))
                            | <a class="text-success" href="{{ asset('uploads/rfq/' . $project->attachment_file_four) }}">Reference 4</a>
                        @endif
                    </td>
                </tr>--}}
            </tbody>
        </table>
    </div>

    @if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
    
        @foreach($project->getBoqMainItem as $mainKey => $mainItem)
            <div class="section">
                <table>
                    <thead>
                        <tr><th colspan="8">Category {{ $mainKey + 1 }}: <span class="text-success">{{ $mainItem->getCategory?->category_name ?? '' }}</span></th></tr>
                        <tr class="fw-900 text-center">
                            <th width="15%">Sub Category</th>
                            <th width="17%">Sub Sub Category</th>
                            <th width="40%">Description</th>
                            <th>Unit</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mainItem->getSubItem as $subKey => $subItem)
                          
                            <tr>
                                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                                <td>{{ $subItem->description ?? '' }}</td>
                                <td>{{ $subItem->unit ?? '' }}</td>
                                <td>{{ $subItem->quantity ?? '' }}</td>
                                <td>{{ $subItem->rate ?? '' }}</td>
                                <td>{{ $subItem->amount ?? '' }}</td>
                              
                            </tr>
                        @endforeach
                        
                        <tr>
                                <td colspan="5"><strong>Sub Total</strong></td>
                                <td colspan="2"><strong>{{ $mainItem->getSubItem()->sum('amount') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
                
                
            </div>
        @endforeach
        <table>
            <thead>
                <tr class="fw-900 text-center">
                    <th>Total</th>
                    <th>
                        @php
                            $totalSubItemAmount = $project->getBoqMainItem->flatMap(function($mainItem) {
                                return $mainItem->getSubItem;
                            })->sum('amount');
                        @endphp
                        
                        {{$totalSubItemAmount}}
                    </th>
                </tr>
            </thead>
        </table>
    @endif

</body>
</html>
