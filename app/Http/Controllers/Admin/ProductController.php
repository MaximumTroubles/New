<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'slug' =>'unique:App\Models\Product,slug|required',
            'category_id' => 'required',
            'description' => 'required|min:3',
            'price' => 'required|numeric',
            'img' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->action_price = $request->action_price;
        if($request->recomended == null){
            $request->recomended = false;
            $product->recomended = $request->recomended;
        }
        $product->recomended = $request->recomended;

        $product->img = $request->img;
        $product->save();
        
        return redirect('/admin/product')->with('success', 'Product was added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('name', 'id');
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'slug' =>'unique:App\Models\Product,slug,'.$id.'|required',
            'category_id' => 'required',
            'description' => 'required|min:3',
            'price' => 'required|numeric',
            'img' => 'required',
        ]);
            
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->action_price = $request->action_price;
        if($request->recomended == null){
            $request->recomended = false;
            $product->recomended = $request->recomended;
        }
        $product->recomended = $request->recomended;

        $product->img = $request->img;
        $product->save();


        return redirect('/admin/product')->with('success', 'Product was Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/product')->with('danger', 'Product '.$id.' was Deleted');
    }
}
