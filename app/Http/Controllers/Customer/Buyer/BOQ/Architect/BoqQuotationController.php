<?php
namespace App\Http\Controllers\Customer\Buyer\BOQ\Architect;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\BoqMainItem;
use App\Models\BOQ\BoqSubItem;
use App\Models\Buyer\Buyer;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Models\BOQ\BoqMappedWithArchitect;
use App\Http\Requests\Customer\BOQ\BOQRequest;
use App\Repositories\Customer\BOQRepository;
use App\Repositories\Customer\BoqTemplateRepository;
use App\Models\BOQ\QSBoqMainItem;
use App\Models\BOQ\BoqAcceptationByContractor;
use Barryvdh\DomPDF\Facade\Pdf;


class BoqQuotationController extends Controller
{
    
   
   public function __construct(
       private BOQRepository $BOQRepository,
       private BoqTemplateRepository $boqTemplateRepository
   ) {
   }

   protected function architectBoqTemplateData(?BoqQuotation $boq, $user): array
   {
       $boqTemplates = $this->boqTemplateRepository->getTemplatesForUser($user->id);
       $appliedTemplate = null;
       $hasBoqItems = false;

       if ($boq && $boq->id) {
           $boq->load(['getBoqMainItem.getSubItem']);
           $appliedTemplate = $this->boqTemplateRepository->getAppliedTemplateForProject($boq->id, $user->id);
           $hasBoqItems = $boq->getBoqMainItem->count() > 0;
       }

       return compact('boqTemplates', 'appliedTemplate', 'hasBoqItems');
   }
    
    public function index(){
        $user = Auth::guard('buyer')->user();
        $projects = BoqQuotation::query()->where('parent_id',0);
        
        if($user->account_type == 'Developer'){
            $projects = $projects->where('created_by_user_id',$user->id);
        }
        
        if($user->account_type == 'Architect'){
            $projects = $projects->where(function($q) use ($user){
                $q->where('created_by_user_id',$user->id)
                    ->orWhereHas('mappedArchitect',function ($subquery) use ($user){
                        $subquery->where('architect_id',$user->id);
                    });
            });
        }
        
        if($user->account_type == 'Quantity Surveyor'){
            $projects = $projects->whereHas('mappedQuantitySurveyor', function ($q) use ($user) {
                $q->where('quantity_surveyor_id', $user->id);
            })->where('parent_id',0);
        }
        
        $projects = $projects->orderByDesc('id')->get();
        
        
        return view('customer.buyer.boq.architect.index',compact('projects'));
    }
    
    
    public function architectsProposedByDeveloper(Request $request){
        $user = Auth::guard('buyer')->user();
        $boqId = $request->boq_id;
        $mappedArchitects = $this->BOQRepository->getPurposeArchitectsByDeveloper($boqId);
        // dd($architects);
        return view('customer.buyer.boq.architect.purpose-architect-by-developer',compact('mappedArchitects'));
    }
    
    
    public function qsProposedByArchitect(Request $request){
        $user = Auth::guard('buyer')->user();
        $boqId = $request->boq_id;
        $mappedQs = $this->BOQRepository->getProposeQsByArchitect($boqId);
        // dd($mappedQs);
        // dd($architects);
        return view('customer.buyer.boq.architect.purpose-qs-by-architect',compact('mappedQs'));
    }
    
    
    public function show($boq_id){
        $user = Auth::guard('buyer')->user();
        $project = BoqQuotation::find($boq_id);
        return view('customer.buyer.boq.architect.show',compact('project'));
    }
    
    public function create(){
        
        $user = Auth::guard('buyer')->user();
        // $contractors = Buyer::where('account_type','Contractor')->WhereDate('membership_expiry_date','>=',Now()->today())->where('status',1)->get();
        
        $contractors = Buyer::where('account_type', 'Contractor')->whereDate('membership_expiry_date', '>=', now())->where('status', 1)->where('quotation_status', 1)->get();
        $architects  = Buyer::where('account_type','Architect')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        $quantitySurveyors = Buyer::where('account_type','Quantity Surveyor')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        
        $templateData = in_array($user->account_type, ['Architect', 'Developer'])
            ? $this->architectBoqTemplateData(null, $user)
            : ['boqTemplates' => collect(), 'appliedTemplate' => null, 'hasBoqItems' => false];

        return view('customer.buyer.boq.architect.create', array_merge(
            compact('contractors', 'quantitySurveyors', 'architects'),
            $templateData
        ));
    }
  
  
    public function save(BOQRequest $request){
        
        try {
            // dd($request->all());
            
            $boq = $this->BOQRepository->saveBOQ($request);
            return $this->successResponse($boq,"Porject has been saved successfully.");
        } catch (\Throwable $e) {
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    
    public function edit(Request $request){
        $user = Auth::guard('buyer')->user();
        $boq = BoqQuotation::find($request->boq_id);
        $contractors = Buyer::where('account_type', 'Contractor')->whereDate('membership_expiry_date', '>=', now())->where('status', 1)->where('quotation_status', 1)->get();
        $architects  = Buyer::where('account_type','Architect')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        $quantitySurveyors = Buyer::where('account_type','Quantity Surveyor')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        
        $templateData = in_array($user->account_type, ['Architect', 'Developer'])
            ? $this->architectBoqTemplateData($boq, $user)
            : ['boqTemplates' => collect(), 'appliedTemplate' => null, 'hasBoqItems' => false];

        return view('customer.buyer.boq.architect.create', array_merge(
            compact('boq', 'contractors', 'quantitySurveyors', 'architects'),
            $templateData
        ));
    }
    
    public function createRevisedProject(Request $request){
        $user = Auth::guard('buyer')->user();
        $boq = BoqQuotation::find($request->boq_id);
        $contractors = Buyer::where('account_type', 'Contractor')->whereDate('membership_expiry_date', '>=', now())->where('status', 1)->where('quotation_status', 1)->get();
        $architects  = Buyer::where('account_type','Architect')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        $quantitySurveyors = Buyer::where('account_type','Quantity Surveyor')->whereDate('membership_expiry_date', '>=', now())->where('status',1)->where('quotation_status', 1)->get();
        
        $templateData = in_array($user->account_type, ['Architect', 'Developer'])
            ? $this->architectBoqTemplateData($boq, $user)
            : ['boqTemplates' => collect(), 'appliedTemplate' => null, 'hasBoqItems' => false];
        return view('customer.buyer.boq.architect.create-revised-project',compact('boq','contractors','quantitySurveyors','architects'));
    }
    
    public function changeBOQStatus(Request $request){
        $boq = BoqQuotation::find($request->boq_id);
        $boq->status = $request->status;
        $boq->save();
        return back()->with('success','Status has been saved.');
        
    }
    
    
    public function saveIndividualCategoryGroup(Request $request){
        try {
            $boq = $this->BOQRepository->saveIndividualCategoryGroup($request);
            return $this->successResponse([],"Porject has been saved successfully."); 
        } catch (\Throwable $e) {
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    // 
    
    public function contractorQuotations($boqId){
        try {
            $boq = BoqQuotation::find($boqId);
            $contractorAcceptations = BoqAcceptationByContractor::where('boq_id',$boq->id)->orderByDesc('id')->get();
            
            return view('customer.buyer.boq.architect.contractor-quotations',compact('boq','contractorAcceptations'));
        
        } catch (\Throwable $e) {
            return back()->with('success','Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
        }
    }
    
    public function contractorQuotationDetail($boqId,$contractorId){
        try {
            $project = BoqQuotation::find($boqId);
            // dd($project);
            $contractorAcceptations = BoqAcceptationByContractor::where('boq_id',$project->id)->orderByDesc('id')->get();
            return view('customer.buyer.boq.architect.contractor-quotation-detail',compact('project','contractorAcceptations','contractorId'));
        
        } catch (\Throwable $e) {
            return back()->with('success','Line No. ' . $e->getLine() . ' - ' . $e->getMessage());
        }
    }
    
    
   
    
    
    public function contractorQuotationDetailPDF($boqId, $contractorId)
    {
        $project = BoqQuotation::find($boqId);
        $contractorAcceptations = BoqAcceptationByContractor::where('boq_id', $project->id)->orderByDesc('id')->get();
    
        $pdf = Pdf::loadView('customer.buyer.boq.architect.contractor-quotation-detail-pdf', [
            'project' => $project,
            'contractorAcceptations' => $contractorAcceptations,
            'contractorId' => $contractorId
        ])->setPaper('A4', 'portrait');
        
        $fileName = 'DOMO' . currentFinancialYear() . '_ContractorQuotation_' . $project->id . '.pdf';
        
        return $pdf->download($fileName);  // Forces browser download
    }

    
    
    // 
    
    public function qsStatus(Request $request){
        try {
            $user =  Auth()->user();
            $boq = $this->BOQRepository->changeQSBOQStatus($qs,$boqId,$request);
            return $this->successResponse([],"Porject Status has been saved successfully."); 
        
        } catch (\Throwable $e) {
            return back()->with('success',$e->getLine() . ' - ' . $e->getMessage());
            // return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    public function acceptanceStatusByArchitectDeveloper(Request $request){
        try {
            $user =  Auth()->user();
            $boq = $this->BOQRepository->changeArchitectBOQStatus($request);
            return back()->with('success',"Porject Status has been saved successfully."); 
        
        } catch (\Throwable $e) {
            return back()->with('success',$e->getLine() . ' - ' . $e->getMessage());
            // return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    public function acceptanceStatusByQsArchitect(Request $request){
        try {
            $user =  Auth()->user();
            // dd($request->all());
            $boq = $this->BOQRepository->changeQSBOQStatus($request);
            return back()->with('success',"Porject Status has been saved successfully."); 
        
        } catch (\Throwable $e) {
            return back()->with('success',$e->getLine() . ' - ' . $e->getMessage());
            // return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
  
  
    public function  qsProjectQuantity(Request $request){
        try {
            $user =  Auth()->user();
            $qsId = $request->qs_id;
            $boqId = $request->boq_id;
            $getBoqMainItemByQs = QSBoqMainItem::where('qs_id',$qsId)->where('boq_id',$boqId)->get();
            $boq = BoqQuotation::find($boqId);

            return view('customer.buyer.boq.architect.purpose-qs-project-quantity', compact(
                'qsId',
                'boqId',
                'getBoqMainItemByQs',
                'boq'
            ));
        
        } catch (\Throwable $e) {
            return back()->with('success',$e->getLine() . ' - ' . $e->getMessage());
            // return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
    
    public function  approvedQsProjectQuantity($qs_id,$boq_id,Request $request){
        try {
            // dd($request->all(),$boq_id,$qs_id);
            $user =  Auth()->user();
            
            $getBoqMainItemByQs = QSBoqMainItem::where('qs_id',$qs_id)->where('boq_id',$boq_id)->get();
            
            foreach($getBoqMainItemByQs as $qsMainItem){
               $mainItem  = BoqMainItem::create(['boq_id' => $qsMainItem->boq_id,'category_id' => $qsMainItem->category_id]);
               $subItems = [];
               foreach($qsMainItem->getSubItem as $subItem){
                  $subItems[] =  [
                                    "boq_id"        => $mainItem->boq_id,
                                    "main_item_id"  => $mainItem->id,
                                    "sub_category"      => $subItem->sub_category,
                                    "sub_sub_category"  => $subItem->sub_sub_category ?? null,
                                    "description"       => $subItem->description,
                                    "unit"              => $subItem->unit,
                                    "quantity"          => $subItem->quantity,
                                    "rate"              => $subItem->rate,
                                    "amount"            => $subItem->amount,
                                    "reference_file"    => $subItem->reference_file, 
                                ];
               }
               BoqSubItem::insert($subItems);
            }
             BoqQuotation::where('id',$boq_id)->update(['status' => 'Assign to Contractor','is_assign_to_contractor'=>1]);
            return back()->with('success','QS Quantity has been saved successfully.');
        
        } catch (\Throwable $e) {
            return back()->with('success',$e->getLine() . ' - ' . $e->getMessage());
            // return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        }
    }
    
}












