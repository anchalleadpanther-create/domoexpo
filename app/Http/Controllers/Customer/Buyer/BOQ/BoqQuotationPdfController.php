<?php
namespace App\Http\Controllers\Customer\Buyer\BOQ;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BOQ\BoqQuotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class BoqQuotationPdfController extends Controller
{
    public function show($boq_id){
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($boq_id);
        $fileName = 'DOMO' . currentFinancialYear() . $project->id . '-' . Str::slug($project->title) . '.pdf';
        // Pdf::loadView('ecommerce.orders.invoice', $data)->setPaper('A4', 'portrait')->save(public_path('uploads/invoices/' . $fileName));
    return Pdf::loadView('customer.buyer.boq.architect.project-detail-pdf', compact('project'))->setPaper('A4', 'portrait')->stream();
        return view('customer.buyer.boq.architect.project-detail-pdf',compact('project'));
    }
    
}












