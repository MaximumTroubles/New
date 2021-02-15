<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|min:3|max:255',
            'slug' =>'unique:App\Models\Category,slug|required',
        ]);
        //? Обычное сохранение
        // $category = new Category();
        // $category->name = $request->name;
        // $category->slug = $request->slug;
        // $category->description = $request->description;
        // $category->img = $request->img;
        // $category->save();

        //? Это первый способ добовление пути картинки
        // $filename = $request->file('imgUpload');
        // if($filename != null){
        //     $category->img = $filename->store('uploads');
        // }
        
        Category::create($request->all());
        return redirect('/admin/category');
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
        // admin/category/{$id}/edit GET 
        $category = Category::findOrFail($id);
        return view('admin.category.edit' , compact('category'));
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
            'name' => 'required|min:3|max:255',
            'slug' =>'unique:App\Models\Category,slug,'. $id.'|required',
        ]);
        $category = Category::findOrFail($id);
        $category->update( $request->all());

        return redirect('/admin/category')->with('success', 'Category was Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Category::findOrFail($id)->delete();
        return redirect('/admin/category')->with('danger', 'Category '.$id.' was Deleted');
    }
}
