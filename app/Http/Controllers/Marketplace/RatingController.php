<?php
namespace App\Http\Controllers\Marketplace;
use Illuminate\Http\Request;
use App\Models\Ecommerce\Product;
use App\Models\Supplier\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Customer\Rating;


class RatingController extends Controller{
    
    
    public function saveRating(Request $request)
    {
        // Try to get authenticated user from either 'buyer' or 'vendor' guard
        $user = auth()->guard('buyer')->user() ?? auth()->guard('vendor')->user();
    
        if (!$user) {
            return redirect()->back()->with('success','You must be logged in to submit a rating.');
        }
    
        // Validate input
        $validated = $request->validate([
            'product_id' => 'required',
            'type' => 'required|string|max:255',
            'review' => 'nullable|string',
            'star' => 'required|integer|min:1|max:5',
        ]);
    
        // Merge additional data
        $validated['user_id'] = $user->id;
        $validated['user_type'] = $user->account_type;
    
        // Create rating
        $rating = Rating::create($validated);
    
        // Redirect back or wherever appropriate
        return redirect()->back()->with('success', 'Thank you for your rating!');
    }

    
}

