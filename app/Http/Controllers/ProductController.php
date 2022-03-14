<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.index')->with(compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::all();
        $categories = Category::all();
        return view('admin.product.add')->with(compact(['categories']));
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
        $input = $request->all();
        $input['category'] = $request->input('category');

        $validated = $request->validate([
            'name' => ['required',Rule::unique('products')],
            'description' => ['nullable', 'string','min:0', 'max:2000'],
            'price' => ['required', 'numeric'],
            'image' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $product = new Product;
        $product->name = $request->name;
        if(!empty($request->input('description'))) {
            $product->description=$request->description;
        } else {
            $product->description="No description";
        }
        $product->price=$request->price;
        $request->file('image')->store('public/images');
        $image=$request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/uploads'),$image_name);
        $product->image_path = $image_name;

        
     //   $categoryParent=$request->parent;//name of select category
     //   $category = Category::find($categoryParent);

        if ($product->save()) {
            $categoryParents = $request->input('parent');
         foreach($categoryParents as $parent){
            $category = Category::find($parent);
            $category = Category::find($category->id);
            $product->categories()->attach($category);
           }
         //   $category = Category::find($category->id);
         //   $product->categories()->attach($category);
            return redirect()->route('product')->with(['success' => 'Category added successfully.']);
        }

        return redirect()->route('create_pro')->with(['fail' => 'Unable to add category.']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        //
        $product = Product::find($id);
        $data['product'] = $product;
        $categories = Category::all();
        $data2['categories'] = $categories;
        return view('admin.product.edit',$data,$data2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $reques,$id)
    {
        //
        $product = Product::find($id);
        $product->name = $reques->input('name');
        $product->description = $reques->input('description');
        $product->price = $reques->input('price');
        $image=$reques->input('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/uploads'),$image_name);
        $product->image_path = $image_name;
       // $reques->file('image')->store('public/images');
       $categoryParents = $reques->input('parent');
       foreach($categoryParents as $parent){
          $category = Category::find($parent);
          $category = Category::find($category->id);
          $product->categories()->sync($category);
         }

        $product->update();
        return redirect()->route('product')->with(['success' => 'Product successfully updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id); 
        $product->delete();
        return redirect()->route('product')->with(['success' => 'Product successfully destroy.']);
    }
}
