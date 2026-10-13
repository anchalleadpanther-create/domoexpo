<?php

namespace App\Http\Controllers\Customer\Buyer;

use Error;
use Carbon\Carbon;
use App\Models\Buyer\Buyer;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Customer\PasswordResetMail;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\Buyer\CartRepository;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Buyer\BuyerRegistrationRequest;
use App\Http\Requests\Customer\SetNewPasswordRequest;
use App\Repositories\Customer\Buyer\BuyerAuthRepository;
use App\App\Actions\Customer\Buyer\SendLoginOtp;
use App\Actions\SmsApi\TextLocal;
use App\Models\OTP;
use App\Actions\SmsApi\LoginNSignupOtp;
use App\Repositories\Customer\WishlistRepository;
use Session;

class BuyerAuthController extends Controller
{
    public function __construct(private BuyerAuthRepository $buyerAuthRepository, private CartRepository $cartRepository,WishlistRepository $WishlistRepository)
    {
        $this->WishlistRepository = $WishlistRepository;
    }

    public function register()
    {
        return view('customer.buyer.buyer-signup');
        // return view('customer.buyers.register');
    }


    public function sendRegistrationOtp(BuyerRegistrationRequest $request)
    {
        try {
            $otp = mt_rand(1000, 9999);
            $reciver_number = @$request->phone;
            // LoginNSignupOtp::run($reciver_number, 'loginOtpTemplate', ['otp' => $otp]);
            TextLocal::run($reciver_number, 'loginOtpTemplate', ['otp' => $otp]);
            OTP::create(['otp'=>$otp,'phone'=>$request->phone]);
            
            return $this->successResponse(compact('otp'), 'OTP has been successfully sent!');
        } catch (\Throwable $th) {
            return $this->errorResponse([], $th->getMessage());
        }
    }


    // public function store(BuyerRegistrationRequest $request)
    // {
    //     try {
    //         $buyer = $this->buyerAuthRepository->register($request);
    //         return $this->successResponse([], 'Registration successful. You have been successfully registered!', 201); 
    //     }
    //     catch (\Exception $th) {
    //         return $this->errorResponse($th->getMessage(), 500);
    //     }
    // }

    public function store(BuyerRegistrationRequest $request)
    {
        try {
            // dd('hello');
            $this->buyerAuthRepository->register($request);
            return $this->successResponse([], 'Registration successful. You have been successfully registered!', 201);
        } catch (ValidationException $th) {
            return $this->errorResponse($th->validator->errors()->getMessages(), 403);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage(), 500);
        }
    }

    public function show()
    {
        return view('customer.auth.login');
    }

    public function sendLoginOtpToBuyer(Request $request){
         try {
           
           $buyer =   Buyer::where('phone',$request->phone)->first();
          if($buyer){
            // $otp = rand(1000,9999);
            // $otp = 1234;
            $otp = mt_rand(1000, 9999);
            TextLocal::run($buyer->phone, 'loginOtpTemplate', ['otp' => $otp]);
            //   $otp = OTP::create(['otp' => $randomOtp]);
            $buyer->otp = $otp;
            $buyer->save();
           
           return  $this->successResponse(['is_otp_send'=>true,'otp'=>$otp],'OTP has been send successfully! ');
          }
        //  throw new Error("You have enter a wrong phone.");
         return $this->errorResponse([], "You have enter a wrong phone.");

            } catch (\Throwable $th) {
            return $this->errorResponse([], $th->getMessage());
        }
    }
    
    public function login(Request $request){
        try {

        //  return    Auth::guard('buyer')->user();
          if($request->isMethod('get'))
                return view('customer.buyer.buyer-login');

            if(Buyer::where('email',$request->email)->exists()){
                if(Buyer::where('email',$request->email)->first()->status == 0){
                    return $this->errorResponse([], 'Please wait for admin approval.', 401);
                }
                
                if(Buyer::where('email',$request->email)->first()->status != 1){
                    return $this->errorResponse([], 'You have Disapproved by admin. Please contact to admin.', 401);
                }
              
            }
            if (Auth::guard('buyer')->attempt($request->only('email', 'password'))) {
                return $this->successResponse(
                    [
                        'url' => redirect()->intended(route('buyer.dashboard'))->getTargetUrl(),
                    ],
                    'You have been successfully logged in!',
                );
            }
 
            return $this->errorResponse([], 'Invalid credentials!', 401);
        } catch (\Throwable $th) {
            return $this->errorResponse([], $th->getMessage());
        }
    }

    // public function login(Request $request)
    // {
    //     try {
          
    //         $buyer = Buyer::where('email', '=', Str::lower($request->email))->first();

    //         if (isset($buyer)) {
    //             if ($buyer->is_guest) {
    //                 throw new Error("You've been registered with us a guest. Please use forgot password to reset your password and activate your account");
    //             }
    //         }

    //         if(isset($request->is_otp_login) && $request->is_otp_login == 1  && $request->userWantTo == "send_otp"){
    //             return $this->sendLoginOtpToBuyer($request);
    //         }

    //         if($request->userWantTo == 'otp_sign_in'){
    //             $buyer =  Buyer::where('phone', $request->phone)->where('otp',$request->otp)->first();
    //           if(!empty($buyer)){
    //                 Auth::guard('buyer')->login($buyer);
    //                 $this->cartRepository->updateBuyerIdInCart($buyer->id);

    //                 $response = $this->WishlistRepository->addToWishlist($request);
    //                 return $this->successResponse(
    //                     [
    //                         'logged_in' => true,
    //                         'url' => redirect()
    //                             ->intended(route('buyer.dashboard'))
    //                             ->getTargetUrl(),
    //                     ],
    //                     'You have been successfully logged in!',
    //                 );
    //           }
    //         }

    //         if (Auth::guard('buyer')->attempt($request->only('email', 'password'))) {
    //             $this->cartRepository->updateBuyerIdInCart($buyer->id);
    //             $response = $this->WishlistRepository->addToWishlist($request);
    //             return $this->successResponse(
    //                 [
    //                     'url' => redirect()
    //                         ->intended(route('buyer.dashboard'))
    //                         ->getTargetUrl(),
    //                 ],
    //                 'You have been successfully logged in!',
    //             );
    //         }

    //         return $this->errorResponse([], 'Invalid credentials!', 401);
    //     } catch (\Throwable $th) {
    //         return $this->errorResponse([], $th->getMessage());
    //     }
    // }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:100', 'exists:App\Models\Buyer\Buyer'],
        ]);

        $email = Str::lower($request->email);
        $token = Str::random(64);
        $buyer = Buyer::where('email', $email)->first();

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

         Mail::to($email)->send(new PasswordResetMail(['token' => $token, 'email' => $email, 'buyer' => $buyer]));

        return back()->with('success', "Password reset link has been sent to this {$email}");
    }

    public function resetPasswordView(Request $request)
    {
        return view('customer.auth.set-new-password', ['request' => $request]);
    }

    public function setNewPassword(SetNewPasswordRequest $request)
    {
        
        Buyer::where('email', $request->email)->update(['password' => Hash::make($request->password), 'is_guest' => 0]);

        DB::table('password_resets')
            ->where(['email' => $request->email])
            ->delete();

        return redirect()
            ->back()
            ->with('success', 'Password has been successfully updated!');
    }
    
    
    public function resetPassword(Request $request){
        
        
        $request->validate([
            'email' => ['required', 'email', 'max:100', 'exists:App\Models\Buyer\Buyer'],
            'password' => ['required','min:6','max:50','confirmed'],
        ]);
        $user = Auth::guard('buyer')->user();
        $user->password =  Hash::make($request->password);
        $user->save(); 
        return redirect()->back();
    }

    public function loginViaGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleLoginCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            if (Buyer::where('email', '=', $googleUser->email)->doesntExist()) {
                $request->mergeIfMissing(['email' => $googleUser->email, 'first_name' => $googleUser->user['given_name'], 'last_name' => $googleUser->user['family_name']]);
                $this->buyerAuthRepository->register($request);
            } else {
                $buyer = Buyer::where('email', '=', $googleUser->email)->firstOrFail();
                Auth::guard('buyer')->login($buyer);
                $this->cartRepository->updateBuyerIdInCart($buyer->id);
            }

            return redirect()->route('buyer.dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function loginViaFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLoginCallback(Request $request)
    {
        try {
            $fbUser = Socialite::driver('facebook')->user();

            if (!isset($fbUser->email)) {
                return redirect()
                    ->route('home')
                    ->withErrors('We did not found any email address attached to your facebook account');
            }

            if (Buyer::where('email', '=', $fbUser->email)->doesntExist()) {
                $this->buyerAuthRepository->register($request->mergeIfMissing(['email' => $fbUser->email, 'first_name' => $fbUser->name]));
            } else {
                $buyer = Buyer::where('email', '=', $fbUser->email)->firstOrFail();
                Auth::guard('buyer')->login($buyer);
                $this->cartRepository->updateBuyerIdInCart($buyer->id);
            }

            return redirect()->route('buyer.dashboard');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
