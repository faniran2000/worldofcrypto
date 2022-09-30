<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function add($product_id){
        $fcount = Favourite::where(['user_id' => Auth::id(), 'product_id' => $product_id])->first();
        if($fcount){
            $fcount->delete();
        }
        else{
            $favourites = new Favourite();
            $favourites->user_id = Auth::id();
            $favourites->product_id = $product_id;
            $favourites->save();
        }
        return redirect()->back()->withSuccess("Successful");
    }
}
