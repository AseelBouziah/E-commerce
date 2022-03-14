<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category.index')->with(compact(['categories']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.category.add')->with(compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => ['required',Rule::unique('categories')],
            'image' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'

        ]);
      

        $category = new Category;
        $category->name = $request->name;
        $image=$request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/uploads'),$image_name);
        $category->image_path = $image_name;


        if ($category->save()) {
            return redirect()->route('category')->with(['success' => 'Category added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add category.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        //
        $category = Category::find($id);
        $data['category'] = $category;
        return view('admin.category.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $reques,$id)
    {
        //
        $category = Category::find($id);
        $category->name = $reques->input('name');
        $image=$reques->input('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/uploads'),$image_name);
        $category->image_path = $image_name;

        $category->update();
        return redirect()->route('category')->with(['success' => 'Category successfully updated.']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $reques,$id)
    {
        //
        $category = Category::find($id); 
        $category->delete();
        return redirect()->route('category')->with(['success' => 'Category successfully destroy.']);

    }
}
