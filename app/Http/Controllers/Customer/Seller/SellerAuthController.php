<?php

namespace App\Http\Controllers\Customer\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Extensions\Dropdown;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Http\Requests\Supplier\SetNewPasswordRequest;
use App\Repositories\Supplier\SupplierRepository;
use App\Models\Supplier\Supplier;
use App\Models\Extension\Country;
use App\Mail\Seller\SellerRegistrationEmail;
use Mail;
use Str;
use Hash;
use DB;
use Carbon\Carbon;
use App\Mail\Seller\PasswordResetMailForSeller;

 
class SellerAuthController extends Controller
{

    public function __construct(private SupplierRepository $SupplierRepository)
    { 
        abort('404');
    }


    public function seller(){
        return view('customer.seller.index');
    }

    public function login(Request $request){
        try {

        //  return    Auth::guard('buyer')->user();
          if($request->isMethod('get'))
                return view('customer.seller.seller-login');

            if(Supplier::where('biz_email',$request->biz_email)->exists()){
                if(Supplier::where('biz_email',$request->biz_email)->first()->status == 0){
                    return $this->errorResponse([], 'You have disabled by admin. Please contact to admin.', 401);
                }
            }
            if (Auth::guard('vendor')->attempt($request->only('biz_email', 'password'))) {
                return $this->successResponse(
                    [
                        'url' => redirect()->intended(route('seller.dashboard'))->getTargetUrl(),
                    ],
                    'You have been successfully logged in!',
                );
            }
 
            return $this->errorResponse([], 'Invalid credentials!', 401);
        } catch (\Throwable $th) {
            return $this->errorResponse([], $th->getMessage());
        }
    }

    public function signup()
    {
       $positions =   Dropdown::where('dropdown_name','Positions')->first();
       $positionsValues =   $positions->dropdownValues;
       $businesssType =   Dropdown::where('dropdown_name','Business Type')->first();
       $businesssTypeValues =   $businesssType->dropdownValues;
       $describeSeller =   Dropdown::where('dropdown_name','Describe Seller')->first();
       $describeSellerValues =   $describeSeller->dropdownValues;
       $sellerLikeToSell =   Dropdown::where('dropdown_name','Seller Like To Sell')->first();
       $sellerLikeToSellValues =   $sellerLikeToSell->dropdownValues;
       return view('customer.seller.seller-signup',compact('positionsValues','businesssTypeValues','describeSellerValues','sellerLikeToSellValues'));
    }


    public function store(Request $request)
    { 
        try { 
            // dd($request->all());
            $request->validate([
                'biz_name' => ['required','string','max:255'], 
                'biz_email' => ['required','string', 'email','max:255', 'unique:cpr_suppliers,biz_email'],
                "biz_phonecode" => ['required','string'],
                'biz_phone' => ['required','string','max:20','unique:cpr_suppliers,biz_phone'],
                // 'password' => ['required','string','min:8', 'confirmed'] ,
                'password' => ['required','string','min:8','regex:/[A-Z]/', 'regex:/[0-9]/','regex:/[@$!%*?&]/','confirmed'],
            ],[
                'biz_name.required'         =>  "The name field is required. ",
                'biz_email.required'        =>  "The email field is required. ",
                'biz_phonecode.required'    =>  "The phonecode field is required. ",
                'biz_phone.required'        =>  "The phone field is required. ",
                'password.regex'            =>  "Password must have atleast one uppercase latter,number and special character."
                ]);            
            $suppiler =  $this->SupplierRepository->store($request); 
            Mail::to($suppiler->biz_email)->send(new SellerRegistrationEmail(['seller' => $suppiler]));
        if($suppiler){
            // return $this->successResponse($suppiler, 'Registration successful. You  have been successfully registered! ', 201); 
            return $this->successResponse($suppiler, 'You data have been saved successfully ! ', 201); 
        }else{
            return $this->errorResponse([],"Something wrong.", 500);
        }
                
        } catch (ValidationException $th) {
            // return $this->errorResponse("error", 403);
            return $this->errorResponse($th->validator->errors()->getMessages(), 403);
        } catch (\Exception $th) {
            if(isset($th->validator))
                return $this->errorResponse($th->validator->errors()->first(), 403);
            
            return $this->errorResponse($th->getMessage(), 500);
        }
    }
    public function store_old(Request $request)
    { 
        try {

            // dd($request->all());
        if(empty($request->supplier_id)){
            $suppiler =  Supplier::where('biz_email',$request->biz_email)->where('is_signup_complete',0)->first();
            if(!empty($suppiler))
                return $this->successResponse($suppiler, 'Complete Your registraion process! ', 201); 

            $request->validate([
                'biz_name' => ['required','string','max:255'],
                'biz_email' => ['required','string', 'email','max:255', 'unique:cpr_suppliers,biz_email'],
                "biz_phonecode" => ['required','string'],
                'biz_phone' => ['required','string','max:20','unique:cpr_suppliers,biz_phone'],
                'password' => ['required','string','min:8', 'confirmed'],
            ]);            
            $suppiler =  $this->SupplierRepository->store($request);
        }else{
            $suppiler =  Supplier::where('id',$request->supplier_id)->first();
            if($suppiler)
                $seller =  $this->SupplierRepository->update($request,$request->supplier_id);

            if($seller && $request->is_signup_complete == 1)
                Mail::to($suppiler->biz_email)->send(new SellerRegistrationEmail(['seller' => $suppiler]));
            
        }

        if($suppiler){
            // return $this->successResponse($suppiler, 'Registration successful. You  have been successfully registered! ', 201); 
            return $this->successResponse($suppiler, 'You data have been saved successfully ! ', 201); 
        }else{
            return $this->errorResponse([],"Something wrong.", 500);
        }
                
        } catch (ValidationException $th) {
            return $this->errorResponse($th->validator->errors()->getMessages(), 403);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'biz_email' => ['required', 'email', 'max:100', 'exists:App\Models\Supplier\Supplier'],
        ]);

        $email = Str::lower($request->biz_email);
        $token = Str::random(64);
        $seller = Supplier::where('biz_email', $email)->first();

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::to($email)->send(new PasswordResetMailForSeller(['token' => $token, 'email' => $email, 'seller' => $seller]));
        return back()->with('success', "Password reset link has been sent to this {$email}");
    }

    public function resetPasswordView(Request $request)
    {
        return view('customer.seller.set-new-password', ['request' => $request]);
    }

    public function setNewPassword(SetNewPasswordRequest $request)
    {
       $save = Supplier::where('biz_email', $request->biz_email)->update(['password' => Hash::make($request->password)]);
        // DB::table('password_resets')
        //     ->where(['email' => $request->biz_email])
        //     ->delete();

        return redirect()
            ->route('seller.seller-login')
            ->with('success', 'Password has been successfully updated!');
    }
}
