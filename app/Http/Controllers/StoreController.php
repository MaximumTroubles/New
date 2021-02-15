<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function sale()
    {
        // $products = Product::where('recomended', '=', 1)->where('price', '<' ,5000)->orWhere('category_id', '=' , 5)->orderBy('name')->limit('5')->get();
        $categories = Category::all();
        $products = Product::where('recomended', '=', 1)->paginate(3);
        // $products = Product::where('recomended', '=', 1)->simplepaginate(2);
        // dd($products);
       
        return view('store.sale' ,compact('products','categories'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', '='  ,$slug)->firstOrFail(); //?  если = тогда можно не писать 
        $products = Product::where('category_id', $category->id)->paginate(3);
        // dd($products);
        return view('store.category', compact('category','products')); 

    }
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $category = Category::where('id', $product->category_id)->first();
        $reviews = Review::where('product_id',$product->id)->paginate(4); 
        // dd($reviews);
        return view('store.product', compact('product','category','reviews'));
    }
    public function getProductReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'message' =>'required|min:3|max:255',
        ]);
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->review = $request->message;
        $review->save();
        return back()->with('success', ' Thank you for Review');
    }
}
