<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index() {
        $products = Product::where('is_live', 'yes')->orderBy('id', 'desc')->paginate(24);
        return view("product.index", ['products' => $products]);
    }
    public function featured() {
        $products = Product::where('is_live', 'yes')->where('is_featured', 'yes')->orderBy('id', 'desc')->paginate(24);
        return view("product.featured", ['products' => $products]);
    }
    public function recent() {
        $products = Product::where('is_live', 'yes')->orderBy('id', 'desc')->paginate(24);
        return view("product.recent", ['products' => $products]);
    }
    public function popular() {
        $products = Product::where('is_live', 'yes')->orderBy('view', 'desc')->paginate(24);
        return view("product.popular", ['products' => $products]);
    }
    public function category($slug) {
        $category = Category::where('slug', $slug)->first();
        if($category){
            $products = Product::where('category_id', $category->id)->where('is_live', 'yes')->orderBy('id', 'desc')->paginate(20);
            $subcategories = Subcategory::where('category_id', $category->id)->inRandomOrder()->get();
            return view("product.category", ['products' => $products, 'subcategories' => $subcategories, 'category' => $category]);
        }
        abort(404);
    }
    public function subcategory($slug, $sub) {
        $category = Category::where('slug', $slug)->first();
        if($category){
            $subcategory = Subcategory::where('slug', $sub)->first();
            if($subcategory){
                $products = Product::where('subcategory_id', $subcategory->id)->where('is_live', 'yes')->orderBy('id', 'desc')->paginate(20);
                return view("product.subcategory", ['products' => $products, 'subcategory' => $subcategory, 'category' => $category]);
            }
            abort(404);
        }
        abort(404);
    }
    public function new(Request $request){
        $main_image = '';
        $image_1 = '';
        $image_2 = '';
        $image_3 = '';
        $image_4 = '';
        $image_5 = '';
        $destinationPath = 'assets/img/products/';
        if($request->file("main_image")){
            $main_image = date('YmdHis').rand(). "." . $request->file("main_image")->getClientOriginalExtension();
            $request->file("main_image")->move($destinationPath, $main_image);
        }
        if($request->file("image_1")){
            $image_1 = date('YmdHis').rand(). "." . $request->file("image_1")->getClientOriginalExtension();
            $request->file("image_1")->move($destinationPath, $image_1);
        }
        if($request->file("image_2")){
            $image_2 = date('YmdHis').rand(). "." . $request->file("image_2")->getClientOriginalExtension();
            $request->file("image_2")->move($destinationPath, $image_2);
        }
        if($request->file("image_3")){
            $image_3 = date('YmdHis').rand(). "." . $request->file("image_3")->getClientOriginalExtension();
            $request->file("image_3")->move($destinationPath, $image_3);
        }
        if($request->file("image_4")){
            $image_4 = date('YmdHis').rand(). "." . $request->file("image_4")->getClientOriginalExtension();
            $request->file("image_4")->move($destinationPath, $image_4);
        }
        if($request->file("image_5")){
            $image_5 = date('YmdHis').rand(). "." . $request->file("image_5")->getClientOriginalExtension();
            $request->file("image_5")->move($destinationPath, $image_5);
        }
        $product = new Product();
        $product->title = $request->title;
        $product->user_id = Auth::id();
        $product->product_id = rand();
        $product->slug = Str::slug($product->title, "-", "en");
        $product->brand = $request->brand;
        $product->year = $request->year;
        $product->model = $request->model;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->sale_price = $request->sale_price;
        $product->main_image = $main_image;
        $product->image_1 = $image_1;
        $product->image_2 = $image_2;
        $product->image_3 = $image_3;
        $product->image_4 = $image_4;
        $product->image_5 = $image_5;
        $product->is_live = "no";
        $product->is_featured = "no";
        $product->status = "";
        $product->save();
        return redirect()->back()->withSuccess("Product created successfully");

    }
    public function edit(Request $request){
        $main_image = '';
        $image_1 = '';
        $image_2 = '';
        $image_3 = '';
        $image_4 = '';
        $image_5 = '';
        $destinationPath = 'assets/img/products/';
        if($request->file("main_image")){
            $main_image = date('YmdHis') . "." . $request->file("main_image")->getClientOriginalExtension();
            $request->file("main_image")->move($destinationPath, $main_image);
        }
        if($request->file("image_1")){
            $image_1 = date('YmdHis') . "." . $request->file("image_1")->getClientOriginalExtension();
            $request->file("image_1")->move($destinationPath, $image_1);
        }
        if($request->file("image_2")){
            $image_2 = date('YmdHis') . "." . $request->file("image_2")->getClientOriginalExtension();
            $request->file("image_2")->move($destinationPath, $image_2);
        }
        if($request->file("image_3")){
            $image_3 = date('YmdHis') . "." . $request->file("image_3")->getClientOriginalExtension();
            $request->file("image_3")->move($destinationPath, $image_3);
        }
        if($request->file("image_4")){
            $image_4 = date('YmdHis') . "." . $request->file("image_4")->getClientOriginalExtension();
            $request->file("image_4")->move($destinationPath, $image_4);
        }
        if($request->file("image_5")){
            $image_5 = date('YmdHis') . "." . $request->file("image_5")->getClientOriginalExtension();
            $request->file("image_5")->move($destinationPath, $image_5);
        }
        $product = Product::findOrFail($request->id);
        $product->title = $request->title;
        $product->brand = $request->brand;
        $product->year = $request->year;
        $product->model = $request->model;
        $product->size = $request->size;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->sale_price = $request->sale_price;
        $product->main_image = $main_image ? $main_image : $product->main_image;
        $product->image_1 = $image_1 ? $image_1 : $product->image_1;
        $product->image_2 = $image_2 ? $image_2 : $product->image_2;
        $product->image_3 = $image_3 ? $image_3 : $product->image_3;
        $product->image_4 = $image_4 ? $image_4 : $product->image_4;
        $product->image_5 = $image_5 ? $image_5 : $product->image_5;
        $product->update();
        return redirect()->back()->withSuccess("Product updated successfully");

    }

    public function single($slug) {
        $product = Product::where('slug', $slug)->first();
        if($product){
            $reviews = Review::where('product_id', $product->id)->paginate(10);
            return view("product.product", ["product" => $product, "reviews" => $reviews]);
        }
        abort(404);
    }
}
