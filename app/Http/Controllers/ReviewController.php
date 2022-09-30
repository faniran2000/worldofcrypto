<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add(Request $request){
        $review = new Review();
        $review->name = $request->name;
        $review->star = $request->star;
        $review->body = $request->body;
        $review->user_id = Auth::id() ? Auth::id() : "";
        $review->product_id = $request->product_id;
        $review->save();
        return redirect()->back()->withSuccess("Review added successfully");
    }
}
