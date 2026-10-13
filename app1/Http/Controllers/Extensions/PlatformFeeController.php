<?php
namespace App\Http\Controllers\Extensions;

use Illuminate\Http\Request;
use App\Models\Extensions\PlatformFee;
use App\Http\Controllers\Controller;



class PlatformFeeController extends Controller
{
  public function platformFee()
  {
    $fees = PlatformFee::get();
    return view('extensions.platform-fee', compact('fees'));
  }
  
 
  public function updatePlatformFee(Request $request)
  {
    
    $platformFees = PlatformFee::get();
    $updatedPlatformFeeType = $request->fee_type;
    $updatedPlatformFees = $request->fees;
    $updatedPlatformFeesStatus = $request->status;
    foreach($platformFees as $key =>  $fee){
        $fee->fee_type = $updatedPlatformFeeType[$key];
        $fee->fee = $updatedPlatformFees[$key];
        $fee->status = $updatedPlatformFeesStatus[$key];
        $fee->save();
    }
    return redirect()->back()->with('success', 'Platform Fees has been updated.');
  }
}
