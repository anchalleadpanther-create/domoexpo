<?php
namespace App\Http\Controllers\Customer\Buyer\BOQ\QS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\BOQ\BoqQuotation;
use App\Models\BOQ\QSBoqMainItem;
use App\Models\Buyer\Buyer;
use App\Models\BOQ\BoqMappedWithContractorType;
use App\Models\BOQ\BoqMappedWithArchitect;
use App\Http\Requests\Customer\BOQ\BOQRequest;
use App\Repositories\Customer\BOQRepository;


class QSBOQController extends Controller
{
   public function __construct(private BOQRepository $BOQRepository)
   {
   }
    
    // public function index(){
    //     $user = Auth::guard('buyer')->user();
    //     $projects = BoqQuotation::query()->where('parent_id',0);
        
    //     if($user->account_type == 'Developer'){
    //         $projects = $projects->where('created_by_user_id',$user->id);
    //     }
        
    //     if($user->account_type == 'Architect'){
    //         $projects = $projects->where(function($q) use ($user){
    //             $q->where('created_by_user_id',$user->id)
    //                 ->orWhereHas('mappedArchitect',function ($subquery) use ($user){
    //                     $subquery->where('architect_id',$user->id);
    //                 });
    //         });
    //     }
    //     if($user->account_type == 'Quantity Surveyor'){
    //         $projects = $projects->whereHas('mappedQuantitySurveyor', function ($q) use ($user) {
    //             $q->where('quantity_surveyor_id', $user->id);
    //         })->where('parent_id',0);
    //     }
    //     $projects = $projects->orderByDesc('id')->get();
        
    //     return view('customer.buyer.boq.architect.index',compact('projects'));
    // }
    
    
    public function addProjectQuantity(Request $request){
        $user = Auth::guard('buyer')->user();
        $boqId = $request->boq_id;
        $boq = BoqQuotation::find($boqId);
        $getBoqMainItemByQs = QSBoqMainItem::where('qs_id',$user->id)->where('boq_id',$boqId)->get();
        // dd($getBoqMainItemByQs[0]->getSubItem);
        return view('customer.buyer.boq.qs.add-project-quantity',compact('boq','getBoqMainItemByQs'));
    }
    
     public function saveProjectQuantityByQs(Request $request){
         try {
            $boqId = $request->boq_id;
            $boq = BoqQuotation::find($boqId);
             $this->BOQRepository->saveQSBoqItems($request);
            return $this->successResponse($boq,"Porject has been saved successfully.");
        } catch (\Throwable $e) {
            return $this->errorResponse([],'Line No. ' . $e->getLine() . ' - ' . $e->getMessage(),404);
        };
        
    }
    
    

    
}












