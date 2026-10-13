<?php
namespace App\Http\Controllers\Marketplace;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\View\View;


class ComparisonController extends Controller{
    
    
    public function index(){
        $products = Product::whereIn('id', session('compareProducts', []))->get();
        return view('marketplace.comparison.product-comparison', compact('products'));
    }
    
    public function supplier_comparison(){
        $suppliers = Supplier::whereIn('id', session('compareSuppliers', []))->get();
        return view('marketplace.comparison.supplier-comparison', compact('suppliers'));
    }
    
    public function store(Request $request)
    {
        session(['compareSuppliers' => []]);
        // Get the current compare products from the session, or an empty array if not set
        $compareProducts = session('compareProducts', []);
    
        // Find the product ID in the compareProducts array
        $productIndex = array_search((int)$request->product_id, $compareProducts);
    
        if ($productIndex === false) {
            // Product is not in the comparison list, add it if the list has fewer than 5 items
            if (count($compareProducts) <= 3) {
                $compareProducts[] = (int)$request->product_id;
                $message = "Product has been added to the comparison items.";
            } else {
                // Optionally, return an error if the comparison list is full
                return $this->errorResponse("You can only compare up to 5 products.", 400);
            }
        } else {
            // Product is already in the comparison list, remove it
            unset($compareProducts[$productIndex]);
            $message = "Product has been removed from the comparison items.";
        }
    
        // Reindex the array to avoid gaps in keys after removing an item
        $compareProducts = array_values($compareProducts);
    
        // Update the session with the modified compareProducts array
        session(['compareProducts' => $compareProducts]);
    
        return $this->successResponse([], $message, 200);
    }
    
    public function supplier_store(Request $request)
    {
        session(['compareProducts' => []]);
        // Get the current compare products from the session, or an empty array if not set
        $compareSuppliers = session('compareSuppliers', []);
    
        // Find the product ID in the compareProducts array
        $productIndex = array_search((int)$request->supplier_id, $compareSuppliers);
    
        if ($productIndex === false) {
            // Product is not in the comparison list, add it if the list has fewer than 5 items
            if (count($compareSuppliers) <= 3) {
                $compareSuppliers[] = (int)$request->supplier_id;
                $message = "Supplier has been added to the comparison items.";
            } else {
                // Optionally, return an error if the comparison list is full
                return $this->errorResponse("You can only compare up to 3 Suppliers.", 400);
            }
        } else {
            // Product is already in the comparison list, remove it
            unset($compareSuppliers[$productIndex]);
            $message = "Supplier has been removed from the comparison items.";
        }
    
        // Reindex the array to avoid gaps in keys after removing an item
        $compareSuppliers = array_values($compareSuppliers);
    
        // Update the session with the modified compareProducts array
        session(['compareSuppliers' => $compareSuppliers]);
    
        return $this->successResponse([], $message, 200);
    }

    public function removeComparisonProdcuts(){
        $compareProducts = session(['compareProducts' => []]);
        $compareSuppliers = session(['compareSuppliers' => []]);
      
        return  back();
    }

}

