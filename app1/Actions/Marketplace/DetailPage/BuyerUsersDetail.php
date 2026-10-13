<?php

namespace App\Actions\Marketplace\DetailPage;

// /home/domoexpo/public_html/app/Actions/Marketplace/DetailPage/ArchitectDetail.php


use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Buyer\Buyer;
use App\Models\Ecommerce\Product;


class BuyerUsersDetail
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
         
         $user_type = $request->type; 
         $user_id = $request->id;
        //  dd($user_type,$user_id);
         $query = Buyer::query()->where('id',$user_id);
         $user = $query->firstOrFail();
        return view('marketplace.detail-page.buyer-users-detail', compact('user'));

        } catch (\ModelNotFoundException $th) {

            abort(404);
        } catch (\Throwable $th) {
            dd($th->getMessage().' '.$th->getLine());
        }
    }
    
}
