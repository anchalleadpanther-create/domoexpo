<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Contractor Rate Detail - BOQ</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; margin: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; vertical-align: top; }
        th { background-color: #f0f0f0; font-weight: bold; }
        .category-header { background-color: #e8f5e8; font-weight: bold; font-size: 11px; }
        .contractor-rate { background-color: #e3f2fd; }
        .project-detail th { width: 50%; background-color: #f8f9fa; }
        .category-total { background-color: #fff3cd; font-weight: bold; font-size: 11px; }
        .grand-total { background-color: #d4edda; font-weight: bold; font-size: 12px; text-align: center; }
        h2 { margin-bottom: 20px; text-align: center; }
        p { margin: 3px 0; }
        .reference-links a { color: #0066cc; text-decoration: none; }
        .amount-right { text-align: right; }
    </style>
</head>
<body>

<h2>Contractor Rate Detail</h2>

<!-- Grand Total Accumulator -->
@php
    $grandTotalAmount = 0;
    $grandTotalContractorRate = 0;
@endphp

<!-- BOQ Categories Tables -->
@if(isset($project->getBoqMainItem) && count($project->getBoqMainItem) > 0)
    @foreach($project->getBoqMainItem as $mainKey => $mainItem)
        @php
            $categoryTotalAmount = 0;
            $categoryTotalContractorRate = 0;
        @endphp
        
        <table>
            <tr>
                <td colspan="8" class="category-header">
                    Category {{ $mainKey + 1 }}: {{ $mainItem->getCategory?->category_name ?? 'N/A' }}
                </td>
            </tr>
            <tr>
                <th>Sub Category</th>
                <th>Sub Sub Category</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Qty</th>
                <th class="amount-right">Rate</th>
                <th class="amount-right">Amount</th>
                <th class="amount-right">Contractor Rate</th>
            </tr>
            @foreach($mainItem->getSubItem as $subKey => $subItem)
            @php
                $itemAmount = $subItem->amount ?? 0;
                $itemContractorRate = $subItem->getSupplierRate()->where('contractor_id', $contractorId)->where('is_accepted_by_contractor', 1)->where('boq_sub_item_id',$subItem->id)->first()?->total_contractor_rate ?? 0;
                $categoryTotalAmount += $itemAmount;
                $categoryTotalContractorRate += $itemContractorRate;
                $grandTotalAmount += $itemAmount;
                $grandTotalContractorRate += $itemContractorRate;
            @endphp
            <tr>
                <td>{{ $subItem->getSubCategory?->category_name ?? 'N/A' }}</td>
                <td>{{ $subItem->getSubSubCategory?->category_name ?? 'N/A' }}</td>
                <td>{{ $subItem->description ?? '' }}</td>
                <td>{{ $subItem->unit ?? '' }}</td>
                <td>{{ $subItem->quantity ?? '' }}</td>
                <td class="amount-right">{{ number_format($subItem->rate ?? 0, 2) }}</td>
                <td class="amount-right">{{ number_format($itemAmount, 2) }}</td>
                <td class="contractor-rate amount-right">{{ number_format($itemContractorRate, 2) }}</td>
            </tr>
            @endforeach
            
            <!-- Category Total Row -->
            <tr class="category-total">
                <td colspan="6"><strong>Category Total:</strong></td>
                <td class="amount-right"><strong>{{ number_format($categoryTotalAmount, 2) }}</strong></td>
                <td class="amount-right contractor-rate"><strong>{{ number_format($categoryTotalContractorRate, 2) }}</strong></td>
            </tr>
        </table>
    @endforeach
@endif

<!-- Grand Total Table -->
<table class="grand-total" style="margin-top: 20px;">
    <tr>
        <th colspan="6" style="font-size: 12px;">GRAND TOTAL</th>
        <th class="amount-right" style="font-size: 12px;"><strong>{{ number_format($grandTotalAmount, 2) }}</strong></th>
        <th class="amount-right contractor-rate" style="font-size: 12px;"><strong>{{ number_format($grandTotalContractorRate, 2) }}</strong></th>
    </tr>
</table>

<!-- Project Details Table -->
<table class="project-detail">
    <tr>
        <th>Project Details</th>
        <th>Address & References</th>
    </tr>
    <tr>
        <td>
            <p><strong>Project Name:</strong> {{ $project->project_name ?? '' }}</p>
            <p><strong>Client Name:</strong> {{ $project->client_name ?? '' }}</p>
            <p><strong>BOQ Type:</strong> {{ $project->boq_type ?? '' }}</p>
            <p><strong>Deadline:</strong> {{ $project->boq_deadline ?? '' }}</p>
            <p><strong>Validity Till:</strong> {{ $project->validity_date ?? '' }}</p>
        </td>
        <td>
            <p><strong>Project Address:</strong> {{ $project->project_address ?? '' }}</p>
            <p><strong>Project City:</strong> {{ $project->projectCity->name ?? '' }}</p>
            <p><strong>Project Area:</strong> {{ $project->projectArea->name ?? '' }}</p>
            <p><strong>Reference Documents:</strong></p>
            @if(isset($project->attachment_file_one))
                <p class="reference-links"><a href="{{ asset('uploads/rfq/'.$project->attachment_file_one) }}">Reference 1</a></p>
            @endif
            @if(isset($project->attachment_file_two))
                <p class="reference-links"><a href="{{ asset('uploads/rfq/'.$project->attachment_file_two) }}">Reference 2</a></p>
            @endif
            @if(isset($project->attachment_file_three))
                <p class="reference-links"><a href="{{ asset('uploads/rfq/'.$project->attachment_file_three) }}">Reference 3</a></p>
            @endif
            @if(isset($project->attachment_file_four))
                <p class="reference-links"><a href="{{ asset('uploads/rfq/'.$project->attachment_file_four) }}">Reference 4</a></p>
            @endif
        </td>
    </tr>
</table>

</body>
</html>
