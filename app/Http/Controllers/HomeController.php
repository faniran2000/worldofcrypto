<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $categories = Category::select('name', 'slug')->get();
        $featured = Product::where('is_live', 'yes')->where('is_featured', 'yes')->orderBy('id', 'desc')->take(6)->get();
        $recent = Product::where('is_live', 'yes')->orderBy('id', 'desc')->take(12)->get();
        return view("home", ['categories' => $categories, 'featured' => $featured, 'recent' => $recent]);
    }
    public function about() {
        return view("pages.about");
    }
    public function contact() {
        return view("pages.contact");
    }
    public function faq() {
        return view("pages.faq");
    }
    public function terms_and_conditions() {
        return view("pages.terms-and-conditions");
    }
    public function search() {
        return view("search", ['results' => []]);
    }
    public function vendors() {
        return view("vendors");
    }
    public function vendor($uid) {
        return view("vendor");
    }
    public function get_search(Request $request){
        $results = [];
        $results = Product::where('title', 'LIKE', '%'.$request->get('keyword').'%')->get();
        return view('search',['results' => $results]);
    
    }

}

