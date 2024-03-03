<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $user = Auth::user();

        
        $review = new Review();
        $review->user_id = $user->id;
        $review->product_id = $product->id;
        $review->review = $request->input('review');
        $review->save();


        $referralLevel = $user->referral_level ?? 0;
        $user->earnings += 10 + ($referralLevel * 20);
        $user->save();


        $products = Product::query();
        switch ($referralLevel) {
            case 0:
                $maxProductsToShow = 3;
                break;
            case 1:
                $maxProductsToShow = 5;
                break;
            case 2:
                $maxProductsToShow = 7;
                break;
            case 3:
                $maxProductsToShow = 11;
                break;
            default:
                $maxProductsToShow = -1;
        }
        $products = $products->take($maxProductsToShow)->get();

        return redirect()->back()->with('success', 'Review submitted successfully.')->with('products', $products);
    }
}
