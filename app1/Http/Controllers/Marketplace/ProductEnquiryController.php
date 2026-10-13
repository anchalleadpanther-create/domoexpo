<?php
namespace App\Http\Controllers\Marketplace;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\View\View;


class ProductEnquiryController extends Controller{
    
    
    public function index(){
        $products = Product::whereIn('id', session('compareProducts', []))->get();
        return view('marketplace.rfq', compact('products'));
    }
    
}

