<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(){
      $categories = Category::all();
     // $products = Product::all();

     $products = Product::where('distinctive', 'yes')->get();
      $data = [
        'categories' => $categories,
        'products' => $products,
      ];
      return view('pages.home',$data);
    }

   /* public function index()
    {
     // $categories = Category::all();
     // return view('pages.aa', compact('categories'));

      $categories = Category::all();
      $parents = $categories->unique('parent_category');
      $categories = $categories->skip(0)->take(3); //get next 3 rows
      $products = Product::all();
      $products = $products->skip(0)->take(3); //get next 3 rows
      $data = [
        'categories' => $categories,
        'products' => $products,
        'parents' => $parents,
      ];
      return view('pages.home',$data); 
    }*/
    public function details($id){
      $products = Product::where('distinctive', $id)->get();

      $product = Product::find($id);
      $data['product'] = $product;
      return view('pages.details',$data);
    }

    public function seeAll($id){
     
      $products = Product::all();
      $categories = Category::all();
      $parents = $categories->unique('parent_category');
      $category = Category::where('id', $id)->first();

      $data = [
        'category' => $category,
        'categories' => $categories,
       'products' => $products,
       'parents' => $parents,
      ];
      return view('pages.allProduct',$data);

    }
    public function showAll(){
      $products = Product::all();
      $categories = Category::all();
      $parents = $categories->unique('parent_category'); 
    //  dd($parents);

      $data = [
        'categories' => $categories,
        'products' => $products,
        'parents' => $parents,

      ];
      return view('pages.allProducts',$data);


    }
    public function search(Request $request){
      $products = Product::where("name","LIKE","%{$request->product}%")->get();
      $categories = Category::all();
      $parents = $categories->unique('parent_category'); 
      $data = [
        'categories' => $categories,
        'products' => $products,
        'parents' => $parents,

      ];
      return view('pages.allProducts',$data);


    }
}
