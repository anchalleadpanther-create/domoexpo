<?php
namespace App\Http\Controllers\Ecommerce;

use App\Models\Buyer\Buyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Models\BOQ\BoqMappedWithArchitect;
use App\Http\Requests\Customer\BOQ\BOQRequest;
use App\Repositories\Customer\BOQRepository;
use App\Models\BOQ\QSBoqMainItem;
use App\Models\BOQ\BoqAcceptationByContractor;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BOQ\BoqMappedWithContractor;
use Illuminate\Support\Str;
use App\Models\Supplier\Supplier;


class BoqQuotationController extends Controller
{
    

    
    public function index(){
        // $user = Auth::guard('buyer')->user();
        
        $created_by = request()->created_by ?? 'Developer';
        $projects = BoqQuotation::query()->where('parent_id',0);
        
        
        
        // if($user->account_type == 'Developer'){
            $projects = $projects->where('created_by',$created_by);
        // }
        
        // if($user->account_type == 'Architect'){
            // $projects = $projects->where(function($q) use ($user){
            //     $q->where('created_by_user_id',$user->id)
            //         ->orWhereHas('mappedArchitect',function ($subquery) use ($user){
            //             $subquery->where('architect_id',$user->id);
            //         });
            // });
        // }
        
        // if($user->account_type == 'Quantity Surveyor'){
            // $projects = $projects->whereHas('mappedQuantitySurveyor', function ($q) use ($user) {
            //     $q->where('quantity_surveyor_id', $user->id);
            // })->where('parent_id',0);
        // }
        
        $projects = $projects->orderByDesc('id')->paginate(20);
        
        
        return view('ecommerce.boq.projects',compact('projects'));
    }
    
    
    public function destroy($id){
        $project = BoqQuotation::find($id);
        $project->delete();
        return back()->with('success','Project Has been deleted successfully.');
    }
    
    
    public function show($boq_id){
        $project = BoqQuotation::find($boq_id);
        return view('ecommerce.boq.show',compact('project'));
    }
    
    
    public function contractorProjects(){
        
        // $query = BoqQuotation::query()->where('is_form_filled',1);

        // $totalProjects = $query->count();
        
        // $projects = (clone $query)->with('mappedContractor')->orderByDesc('id')->paginate(10);
        
        $query = BoqMappedWithContractor::query()->orderByDesc('id')->whereHas('boq');
        $totalProjects = (clone $query)->count();

        $projects = (clone $query)->with('boq')->paginate(10);
        // dd($projects);
        return view('ecommerce.boq.contractor-projects',compact('projects','totalProjects'));
    }
    
    
    
    public function boqPDF($boq_id){
        $project = BoqQuotation::find($boq_id);
        $fileName = 'DOMO' . currentFinancialYear() . $project->id . '-' . Str::slug($project->title) . '.pdf';
        // Pdf::loadView('ecommerce.orders.invoice', $data)->setPaper('A4', 'portrait')->save(public_path('uploads/invoices/' . $fileName));
        return Pdf::loadView('customer.buyer.boq.architect.project-detail-pdf', compact('project'))->setPaper('A4', 'portrait')->stream();
        
    }
    
    
      public function supplierRateQuotation($boq_id,$contractor_id){
        //   to Contractor
        $project = BoqQuotation::find($boq_id);
        $suppliers = Supplier::where('status',1)->get();
        return view('ecommerce.boq.supplier-quotations-on-boq',compact('project','suppliers','contractor_id'));
    }
    
    
    
    
    
    
    
    
}