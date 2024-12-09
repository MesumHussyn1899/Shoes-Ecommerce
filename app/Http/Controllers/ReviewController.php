<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);
    
        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);
    
        return redirect()->back()->with('success', 'Review added successfully!');
    }
    
    public function index($productId)
    {
        $product = Product::with('reviews.user')->findOrFail($productId);
        return view('reviews.index', ['product' => $product]);
    }



    public function destroy($id)
    {
        // Find the review
        $review = Review::findOrFail($id);

        // Check if the logged-in user is authorized to delete the review
        if ($review->user_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to delete this review.');
        }

        // Delete the review
        $review->delete();

        return back()->with('success', 'Your review has been deleted.');
    }
}






    


